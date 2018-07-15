<?php

require "vendor/autoload.php";
session_start();

use \Rain\tpl;
use \SGI\Page;
use \SGI\Model\User;
use \SGI\Model\Menus;
use \SGI\Model\Financas;

$app = new \Slim\Slim();

$app->get("/", function() {
    $page = new Page(['header' => false, 'footer' => false]);
    $page->setTpl("login");
});

$app->get("/login", function() {
    //User::verifyLogin();
    $p = new Page(['header' => false, 'footer' => false]);
    $p->setTpl("login");
});

$app->post("/login", function() {
    User::login($_POST["login"], $_POST["password"]);
    header("location: /home");
    exit();
});

$app->get("/home", function() {
    //User::verifyLogin();
    $p = new Page();
    $p->setTpl("home", [
        "session" => session_id(),
        "user" => $_SESSION[User::SESSION]['iduser']
    ]);
});

$app->get("/logout", function() {
    User::logout();
    header("location: /");
    exit();
});

$app->get("/users", function() {
    //User::verifyLogin();
    $user = new User();
    $data = $user->listAll();
    $p = new Page();
    $p->setTpl("users", ["users" => $data
    ]);
});

$app->get("/users/create", function() {
    //User::verifyLogin();
    $user = new User();
    $data = $user->listAll();
    $p = new Page();
    $p->setTpl("users-create");
});

$app->post("/users/create", function() {
    $user = new User();
    $user->setData($_POST);
    $user->create();
    header("location: /users");
    exit();
});

$app->get("/users/del/:iduser", function($iduser) {
    //User::verifyLogin();
    $user = new User();
    $user->get((int)$iduser);
    $user->delete();
    header("location: /users");
    exit();
});

$app->get("/users/update/:iduser", function($iduser) {
    //User::verifyLogin();
    $user = new User();
    $page = new Page();
    $user->get((int)$iduser);    
    $page->setTpl("users-update",array("user"=>$user->getValues()));
    });

$app->post("/users/:iduser",function($iduser){
  $user = new User();
  $user->get((int)$iduser);
  $user->setData($_POST);
  $user->update();
  header("location: /users");
  exit();
});

$app->get("/registrar", function() {
    $p = new Page(['header' => false, 'footer' => false]);
    $p->setTpl("users-register");
});

$app->post("/registrar", function() {
    $user = new User();
    $user->setData($_POST);
    $user->save();
    header("Location: /");
    exit();
});


//-------------- Rotas Entradas Financeiras---------------

$app->get("/financeiro/entrada",function(){
   //User::verifyLogin();
   $page = new Page(); 
   $entradas = new Financas();
   $data = $entradas->listaEntradas();
   $page->setTpl("financas-entrada",array('entradas' =>$data));
});

$app->get("/financeiro/entrada/inserir",function(){
   //User::verifyLogin();
   $page = new Page(); 
   $page->setTpl("financas-entrada-inserir");
});

$app->post("/financeiro/entrada/inserir", function() {
    $Financas = new Financas();
    $Financas->setData($_POST);
    $Financas->inseriEntradas();
    header("Location: /financeiro/entrada");
    exit();
});



$app->run();
