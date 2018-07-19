<?php

use \Rain\tpl;
use \SGI\Page;
use \SGI\Model\Financas;
use \SGI\Model\User; 



//-------------Rotas Entradas--------------

$app->get("/financeiro/entrada",function(){
 User::verifyLogin();
 $page = new Page(); 
 $entradas = new Financas();
 $data = $entradas->listaEntradas();
 $page->setTpl("financas-entrada",array('entradas' =>$data));
});

$app->get("/financeiro/entrada/inserir",function(){
 User::verifyLogin();
 $page = new Page(); 
 $page->setTpl("financas-entrada-inserir");
});

$app->post("/financeiro/entrada/inserir", function() {
  User::verifyLogin();
  $Financas = new Financas();
  $Financas->setData($_POST);
  $Financas->inseriEntradas();
  header("Location: /financeiro/entrada");
  exit();
});
$app->get("/financeiro/entrada/delete/:identrada",function($identrada){
 User::verifyLogin();
 $entradas = new Financas();
 $entradas->getEntradas((int)$identrada);
 $entradas->deleteEntradas();
 header("location: /financeiro/entrada");
 exit();
});
$app->get("/financeiro/entrada/editar/:identrada",function($identrada){
  User::verifyLogin();
  $page = new Page();
  $entradas = new Financas();
  $entradas->getEntradas((int)$identrada);
  $page->setTpl("financas-entrada-editar",array("entradas"=>$entradas->getValues()));
});
$app->post("/financeiro/entrada/editar/:identrada",function($identrada){
  User::verifyLogin();
  $Financas = new Financas();
  $Financas->setData($_POST);
  $Financas->editaEntradas($identrada);
  header("Location: /financeiro/entrada");
  exit();
});


//-------------- Rotas Saídas ---------------
$app->get("/financeiro/saida",function(){
 User::verifyLogin();
 $page = new Page(); 
 $saida = new Financas();
 $data = $saida->listaSaidas();
 $page->setTpl("financas-saida",array('saidas' =>$data));
});

$app->get("/financeiro/saida/inserir",function(){
 User::verifyLogin();
 $page = new Page(); 
 $page->setTpl("financas-saida-inserir");
});

$app->post("/financeiro/saida/inserir", function() {
  User::verifyLogin();
  $Financas = new Financas();
  $Financas->setData($_POST);
  $Financas->inseriSaidas($_FILES['desdocumento']);
  header("Location: /financeiro/saida");
  exit();
});

$app->get("/financeiro/saida/delete/:identrada",function($idsaida){
 User::verifyLogin();
 $Financas = new Financas();
 $Financas->getSaidas((int)$idsaida);
 $Financas->deleteSaidas();
 header("location: /financeiro/saida");
 exit();
});

$app->get("/financeiro/saida/editar/:idsaida",function($idsaida){
  User::verifyLogin();
  $page = new Page();
  $Financas = new Financas();
  $Financas->getSaidas((int)$idsaida);
  $page->setTpl("financas-saida-editar",array("saidas"=>$Financas->getValues()));
});

$app->post("/financeiro/saida/editar/:idsaida",function($idsaida){
 User::verifyLogin();
 $Financas = new Financas();
 $Financas->setData($_POST);
 $Financas->editaSaidas($idsaida,$_FILES["desdocumento"]);
 header("location: /financeiro/saida");
 exit();
});

//-------------------Rotas Depósitos------------

$app->get("/financeiro",function(){
 User::verifyLogin();
 $page = new Page(); 
 $page->setTpl("dashboard-financas");
});

$app->get("/financeiro/deposito",function(){
 User::verifyLogin();
 $page = new Page(); 
 $saida = new Financas();
 $data = $saida->listaDepositos();
 $page->setTpl("financas-deposito",array('depositos' =>$data));
});

$app->post("/financeiro/deposito/inserir",function(){
 User::verifyLogin();
 $Financas = new Financas();
 $Financas->setData($_POST);
 $Financas->inseriDepositos($_FILES["descomprovante"]); 
 header("location: /financeiro/deposito");
 exit();
});


$app->get("/financeiro/deposito/inserir",function(){
 User::verifyLogin();
 $page = new Page(); 
 $page->setTpl("financas-deposito-inserir");
});

$app->get("/financeiro/deposito/delete/:iddeposito",function($iddeposito){
 User::verifyLogin();
 $Financas = new Financas();
 $Financas->getDepositos((int)$iddeposito);
 $Financas->deleteDepositos();
 header("location: /financeiro/deposito");
 exit();
});

$app->get("/financeiro/deposito/editar/:iddeposito",function($iddeposito){
 User::verifyLogin();
 $page = new Page();
 $Financas = new Financas();
 $Financas->getDepositos($iddeposito); 
 $page->setTpl("financas-deposito-editar",array("depositos"=>$Financas->getValues()));
});

$app->post("/financeiro/deposito/editar/:iddeposito",function($iddeposito){
 User::verifyLogin();
 $page = new Page();
 $Financas = new Financas();
 $Financas->setData($_POST);
 $Financas->editaDeposito($iddeposito,$_FILES["descomprovante"]);
 header("location: /financeiro/deposito");
 exit();
});


