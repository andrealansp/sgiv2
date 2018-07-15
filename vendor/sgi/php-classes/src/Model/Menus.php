<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SGI\Model;

use \SGI\Model;
use SGI\DB\Sql;

/**
 * Description of Menus
 *
 * @author andre
 */
class Menus extends Model {

    public function listAll() {
        $db = new Sql();
        return $db->select("Select * from tb_menu");
    }

    public function save() {
        $db = new Sql();
        $parans = array(
            ":desmenu" => $this->desmenu,
            ":desorder" => $this->desorder,
            ":desicon" => $this->iconCheck($this->desicon),
            ":desprofile" => $this->desprofile);

        $db->query("CALL `idat_gestao`.`sp_menu_save`(:desmenu, :desorder, :desicon, :desprofile)", $parans);
    }

    private function iconCheck($icon) {
        $icon = str_replace(" ", "-", $icon);
        $icon = strtolower($icon);
        $desicon = "fa fa" . $icon;
        return $desicon;
    }

    public function delete() {
        $db = new Sql();
        $db->query("delete from tb_menu where idmenu = :idmenu", array(":idmenu" => $this->idmenu));
    }

    public function get($idmenu) {
        $sql = new Sql();
        $results = $sql->select("Select * from tb_menu where idmenu=:idmenu", array(
            ":idmenu" => $idmenu
        ));
        $this->setData($results[0]);
    }

    public function update() {
        $db = new Sql();
        $parans = array(
            ":idmenu"=>$this->idmenu,
            ":desmenu" => $this->desmenu,
            ":desorder" => $this->desorder,
            ":desicon" => $this->iconCheck($this->desicon),
            ":desprofile" => $this->desprofile);

        $db->query("update tb_menu set `desmenu`=:desmenu,`desorder`=:desorder,`desicon`=:desicon,`desprofile`=:desprofile where idmenu=:idmenu", $parans);
    }

}
