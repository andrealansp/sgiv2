<?php 

namespace SGI\Model;

use \SGI\Model;
use SGI\DB\Sql;

class Financas extends Model {

	public function listaEntradas() {
		$db = new Sql();
		return $db->select("Select * from tb_fin_entradas");
	}

	public function inseriEntradas(){
		$db = new Sql();		
		$parans = array(':dtentrada' =>$this->dtentrada,
			':desdescricao' =>$this->desdescricao,
			':nunvalor' =>$this->nunvalor,
			':destipopag' =>$this->destipopag,
			':destipoentrada' =>$this->destipoentrada);

		$results = $db->select("CALL `bd_iadt`.`sp_inseri_entrada`(:dtentrada, :desdescricao,:nunvalor,:destipopag, :destipoentrada)",$parans);

		$this->setData($results[0]);

	}
}

