<?php

namespace SGI\Model;

use \SGI\Model;
use \SGI\DB\Sql;
use \SGI\Mail;

class User extends Model {

    const SESSION = "User";

    public function listAll() {
        $db = new Sql();
        return $db->select("Select * from tb_usuarios as a right join tb_controle_acesso as b using(idusuarios)");
    }

    public static function verifyLogin() {
        if (!isset($_SESSION[User::SESSION]) || !($_SESSION[User::SESSION]["idusuarios"] > 0)) {
            echo "<script>window.location.replace('/');</script>";
        }
    }

    public static function logout() {
        $_SESSION[User::SESSION] = NULL;
    }

    public function create() {
        $sql = new Sql();
        $parans = array(":desnome" => $this->desnome,
               ":deslogin" => $this->deslogin,
               ":despassword" => password_hash($this->despassword, PASSWORD_DEFAULT),
               ":desemail" => $this->desemail,
               ":desfuncao" => $this->desfuncao,
               ":desperfil" => $this->desperfil);

        $results = $sql->select("CALL `bd_iadt`.`sp_create_usuario`(:desnome,:deslogin,:despassword, :desemail,:desfuncao,:desperfil)",$parans);

        $this->setData($results[0]);

        
        //$mail = new Mail($results[0]["desemail"], $results[0]["desnome"], "SGI-ADM-CRIACAO-USUARIO", "criacao",$results[0]);
        //$mail->send();

    }

    public function update() {
        $sql = new Sql();
        $parans = array(
            ":desnome" => $this->desnome,
            ":deslogin" => $this->deslogin,
            ":despassword" => password_hash($this->despassword, PASSWORD_DEFAULT),
            ":desemail" => $this->desemail,
            ":desfuncao" => $this->desfuncao,
            ":desperfil" => $this->desperfil,
            ":idusuarios"=> $this->idusuarios
        );

        $results = $sql->select("CALL `bd_iadt`.`sp_edita_usuario`(:desnome,:deslogin, :despassword,:desemail,:desfuncao,:desperfil,:idusuarios)", $parans);

        $this->setData($results[0]);

    }

    public static function login($login, $password): User {
        $db = new Sql();

        $results = $db->select("SELECT idusuarios,deslogin,despassword FROM tb_usuarios WHERE deslogin = :deslogin", array(":deslogin" => $login));

        if (count($results) === 0) {
            throw new \Exception("Dados Inconsistentes.");
        }

        $data = $results[0];

        if (password_verify($password, $data["despassword"])) {
            $user = new User();
            $user->setData($data);
            $_SESSION[User::SESSION] = $user->getValues();
            return $user;
        } else {

            throw new \Exception("Não foi possível fazer login.");
        }
    }

    public function get($iduser) {
        $sql = new Sql();
        $results = $sql->select("Select * from tb_usuarios as a right join tb_controle_acesso as b using(idusuarios) where idusuarios = :idusuarios", array(
            ":idusuarios" => $iduser));
        $this->setData($results[0]);
    }

    public function delete() {
        $db = new Sql();
        $db->query("CALL `sp_delete_usuario`(:iduser)", array(':iduser' => $this->idusuarios));
    }
    public function getUserBySession() {
     if (isset($_SESSION[User::SESSION]) || ($_SESSION[User::SESSION]["iduser"] > 0)){
         $this->setData($_SESSION[User::SESSION]);
     }
 }

}
