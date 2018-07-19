<?php 

namespace SGI\Model;

use \SGI\Model;
use \SGI\DB\Sql;
use \Mpdf\Mpdf;
use \SGI\PageReport;
use \Rain\Tpl;

Class Relatorios
{   
	static private $var;

	public function __construct($tplname, $data = array()){

		$page = new PageReport(['header' => false, 'footer' => false]);
		Relatorios	::$var = $page->setTpl($tplname,array("dados"=>$data),true);
	}

	public function escrever($opts = array())
	{
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		$hoje = date('d/m/Y');
		$wpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-L',"default_font"=>"dejavusans"]);
		$wpdf->SetHTMLHeader('<div class="header"> Extraído do SGT - Tabernáculo </div>');
		$wpdf->SetHTMLFooter("<div class='header'> Gerado em: $hoje </div>");
		$wpdf->WriteHTML(Relatorios::$var);
		$wpdf->Output();

	}
}