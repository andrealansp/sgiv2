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

		$results = $db->select("CALL `bd_iadt`.`sp_inseri_entrada` (:dtentrada, :desdescricao, :nunvalor, :destipopag,:destipoentrada)",$parans);

		$this->setData($results[0]);

	}

	public function editaEntradas($identrada){
		$db = new Sql();		
		$parans = array(':dtentrada' =>$this->dtentrada,
			':desdescricao' =>$this->desdescricao,
			':nunvalor' =>$this->nunvalor,
			':destipopag' =>$this->destipopag,
			':destipoentrada' =>$this->destipoentrada,
			':identrada' =>$identrada);

		$results = $db->select("CALL `bd_iadt`.`sp_edita_entrada` (:dtentrada, :desdescricao, :nunvalor, :destipopag,:destipoentrada,:identrada)",$parans);

		$this->setData($results[0]);
	}


	public function deleteEntradas(){
		$db=new Sql();
		$db->query("delete from tb_fin_entradas where identrada=:identrada",array(':identrada' => $this->identrada));

	}

	public function getEntradas($identrada)
	{
		$db=new Sql();
		$results = $db->select("select * from tb_fin_entradas where identrada=:identrada",array(':identrada' => $identrada));

		$this->setData($results[0]);

	}

	public function getSaidas($idsaida){
		$db=new Sql();
		$results = $db->select("select * from tb_fin_saidas where idsaida=:idsaida",array(':idsaida' => $idsaida));

		$this->setData($results[0]);
	}

	public function deleteSaidas(){
		$db=new Sql();
		$db->query("delete from tb_fin_saidas where idsaida=:idsaida",array(':idsaida' => $this->idsaida));

	}

	public function listaSaidas() {
		$db = new Sql();
		return $db->select("Select * from tb_fin_saidas");
	}


	public function inseriSaidas($arquivo){

		if($arquivo["size"]!=0)
		{

			if($arquivo["error"])
			{
				throw new \Exception("Error ". $arquivo["error"]);

			}

			$diruploads = "uploads";

			if(!is_dir($diruploads))
			{
				mkdir($diruploads);
			}

			if(move_uploaded_file($arquivo["tmp_name"], $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"])){
				$desdocumento = $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"]; 

			}else{
				throw new Exception("Não foi possível Realizar o Upload");

			}
			
		}else{
			$desdocumento = null;
		}



		$db = new Sql();		
		$parans = array(':dtsaida' =>$this->dtsaida,
			':numvalor' =>$this->numvalor,
			':numdocumento' =>$this->numdocumento,
			':destipopag' =>$this->destipopag,
			':desgasto' =>$this->desgasto,
			':desdocumento' =>$desdocumento
		);

		$results = $db->select("CALL `bd_iadt`.`sp_inseri_saida` (:dtsaida,:numvalor,:numdocumento,:destipopag,:desgasto,:desdocumento)",$parans);

		$this->setData($results[0]);
	}


	public function editaSaidas($idsaida,$arquivo=null){

		if($arquivo["size"]!=0)
		{

			if($arquivo["error"])
			{
				throw new \Exception("Error ". $arquivo["error"]);

			}

			$diruploads = "uploads";

			if(!is_dir($diruploads))
			{
				mkdir($diruploads);
			}

			if(move_uploaded_file($arquivo["tmp_name"], $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"])){
				$desdocumento = $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"]; 

			}else{
				throw new Exception("Não foi possível Realizar o Upload");

			}
			
		}else{
			$desdocumento = null;
		}

		$db = new Sql();		
		$parans = array(':dtsaida' =>$this->dtsaida,
			':numvalor' =>$this->numvalor,
			':numdocumento' =>$this->numdocumento,
			':destipopag' =>$this->destipopag,
			':desgasto' =>$this->desgasto,
			':desdocumento' =>$desdocumento,
			':idsaida' => $idsaida
		);

		$results = $db->select("CALL `bd_iadt`.`sp_edita_saida` (:dtsaida,:numvalor,:numdocumento,:destipopag,:desgasto,:desdocumento,:idsaida)",$parans);

		$this->setData($results[0]);
	}

	public function getDepositos($iddeposito){
		$db=new Sql();
		$results = $db->select("select * from tb_fin_depositos where iddeposito=:iddeposito",array(':iddeposito' => $iddeposito));
		$this->setData($results[0]);
	}

	public function deleteDepositos(){
		$db=new Sql();
		$db->query("delete from tb_fin_depositos where iddeposito=:iddeposito",array(':iddeposito' => $this->iddeposito));
	}

	public function listaDepositos() {
		$db = new Sql();
		return $db->select("Select * from tb_fin_depositos");
	}


	public function inseriDepositos($arquivo=null){

		if($arquivo["size"]>0)
		{

			if($arquivo["error"])
			{
				throw new \Exception("Error ". $arquivo["error"]);

			}

			$diruploads = "comprovantes";

			if(!is_dir($diruploads))
			{
				mkdir($diruploads);
			}

			if(move_uploaded_file($arquivo["tmp_name"], $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"])){
				$descomprovante = $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"]; 

			}else{
				throw new Exception("Não foi possível Realizar o Upload");

			}
			
		}else{
			$descomprovante = null;
		}



		$db = new Sql();		
		$parans = array(':dtdeposito' =>$this->dtdeposito,
			':numvalor' =>$this->numvalor,
			':destipodeposito' =>$this->destipodeposito,
			':descomprovante' =>$descomprovante
		);
		try {
			$db->query('INSERT INTO `bd_iadt`.`tb_fin_depositos` (`dtdeposito`,`numvalor`,`destipodeposito`,`descomprovante`)VALUES(:dtdeposito,:numvalor,:destipodeposito,:descomprovante)',$parans);
		} catch (\Exception $e) {
			throw new Exception("Error".$e["error"]);	
		}
	}


	public function editaDeposito($iddeposito,$arquivo){

		if($arquivo["size"]>0)
		{

			if($arquivo["error"])
			{
				throw new \Exception("Error ". $arquivo["error"]);

			}

			$diruploads = "comprovantes";

			if(!is_dir($diruploads))
			{
				mkdir($diruploads);
			}

			if(move_uploaded_file($arquivo["tmp_name"], $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"])){
				$descomprovante = $diruploads . DIRECTORY_SEPARATOR . $arquivo["name"]; 

			}else{
				throw new Exception("Não foi possível Realizar o Upload");

			}
			
		}else{
			$descomprovante = null;
		}



		$db = new Sql();		
		$parans = array(':dtdeposito' =>$this->dtdeposito,
			':numvalor' =>$this->numvalor,
			':destipodeposito' =>$this->destipodeposito,
			':descomprovante' =>$descomprovante
		);
		try {
			$db->query("UPDATE `bd_iadt`.`tb_fin_depositos` SET	`dtdeposito` =:dtdeposito,`numvalor` = :numvalor,
				`destipodeposito` = :destipodeposito,`descomprovante` = :descomprovante WHERE `iddeposito` = $iddeposito;
				",$parans);
		} catch (\Exception $e) {
			throw new Exception("Error".$e["error"]);	
		}

	}


}

