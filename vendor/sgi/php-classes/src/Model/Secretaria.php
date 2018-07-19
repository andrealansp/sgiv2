<?php 

namespace SGI\Model;

use \SGI\Model;
use SGI\DB\Sql;

class Secretaria extends Model {

	public function listarMembros() {
		$db = new Sql();
		$resultado= $db->select("Select idmembro,desnome,concat_ws(', ',deslogradouro,desnumero,descomplemento,desbairro,descidade) as endereco,destelmovel,dtnascimento,dtcadastro from tb_membros");

			return $resultado;	

	}

	public function inseriMembro(){
		$db = new Sql();		
		$parans = array(
	    ":desnome"=>$this->desnome,
		":deslogradouro"=>$this->deslogradouro,
		":desnumero"=>$this->desnumero,
		":descomplemento" =>$this->descomplemento,
		":desbairro"=>$this->desbairro,
		":descidade"=>$this->descidade,
		":desuf"=>$this->desuf,
		":descep"=>$this->descep,
		":desconjuge"=>$this->desconjuge,
		":desclasificacao"=>$this->desclasificacao,
		":desemail"=>$this->desemail,
		":destelfixo"=>$this->destelfixo,
		":destelmovel"=>$this->destelmovel,
		":dtnascimento"=>$this->dtnascimento );

		$results = $db->select("CALL `bd_iadt`.`sp_inseri_membro`(:desnome, :deslogradouro,:desnumero,:descomplemento, :desbairro,:descidade,:desuf,:descep,:desconjuge,:desclasificacao,:desemail,:destelfixo,:destelmovel,:dtnascimento)"
			,$parans);
	}

	public function editaMembro($idmembro){
		$db = new Sql();		
		$parans = array(
	    ":desnome"=>$this->desnome,
		":deslogradouro"=>$this->deslogradouro,
		":desnumero"=>$this->desnumero,
		":descomplemento" =>$this->descomplemento,
		":desbairro"=>$this->desbairro,
		":descidade"=>$this->descidade,
		":desuf"=>$this->desuf,
		":descep"=>$this->descep,
		":desconjuge"=>$this->desconjuge,
		":desclasificacao"=>$this->desclasificacao,
		":desemail"=>$this->desemail,
		":destelfixo"=>$this->destelfixo,
		":destelmovel"=>$this->destelmovel,
		":dtnascimento"=>$this->dtnascimento,
		":id"=>$idmembro);

		$results = $db->select("CALL `bd_iadt`.`sp_edita_membro`(:desnome, :deslogradouro,:desnumero,:descomplemento, :desbairro,:descidade,:desuf,:descep,:desconjuge,:desclasificacao,:desemail,:destelfixo,:destelmovel,:dtnascimento,:id)"
			,$parans);
	}


	public function deleteMembro(){
		$db=new Sql();
		$db->query("delete from tb_membros where idmembro=:idmembro",array(':idmembro' => $this->idmembro));

	}

	public function getMembro($idmembro)
	{
		$db=new Sql();
		$results = $db->select("select * from tb_membros where idmembro=:idmembro",array(':idmembro' => $idmembro));

		$this->setData($results[0]);

	}

	public function gerarRelatorio()
	{
		$db = new Sql();
		$resultado= $db->select("Select idmembro,desnome,concat_ws(', ',deslogradouro,desnumero,descomplemento,desbairro,descidade) as endereco,desemail,concat_ws('/',destelfixo,destelmovel) as telefones,dtnascimento,dtcadastro from tb_membros");

			return $resultado;	
	}
}

