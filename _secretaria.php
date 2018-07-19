<?php

use \Rain\tpl;
use \SGI\Page;
use \SGI\Model\Secretaria;
use \SGI\Model\User; 



//-------------Rotas Membros--------------

$app->get("/secretaria",function(){
 User::verifyLogin();
 $page = new Page(); 
 $Secretaria = new Secretaria();
 $page->setTpl("dashboard-secretaria");
});

$app->get("/secretaria/membro",function(){
 User::verifyLogin();
 $page = new Page(); 
 $Secretaria = new Secretaria();
 $data = $Secretaria->listarMembros();
 $page->setTpl("secretaria-membro",array('membros' => $data));
});

$app->get("/secretaria/membro/inserir/",function(){
 User::verifyLogin();
 $page = new Page(); 
 $page->setTpl("secretaria-membro-inserir");
});

$app->post("/secretaria/membro/inserir/",function(){
 User::verifyLogin();
 $sec =  new Secretaria();
 $sec->setData($_POST);
 $sec->inseriMembro();
 header("location: /secretaria/membro");
 exit();
 });

$app->get("/secretaria/membro/editar/:idmembro",function($idmembro){
 User::verifyLogin();
 $page = new Page();
 $sec = new Secretaria();
 $sec->getMembro((int)$idmembro); 
 $page->setTpl("secretaria-membro-editar",array('membros' =>$sec->getValues()));
});

$app->post("/secretaria/membro/editar/:idmembro",function($idmembro){
 User::verifyLogin();
 $sec =  new Secretaria();
 $sec->setData($_POST);
 $sec->editaMembro($idmembro);
 header("location: /secretaria/membro");
 exit();
 });

$app->get("/secretaria/membro/delete/:idmembro",function($idmembro){
 User::verifyLogin();
 $page = new Page();
 $sec = new Secretaria();
 $sec->getMembro((int)$idmembro); 
 $sec->deleteMembro();
 header("location: /secretaria/membro");
 exit();
});
