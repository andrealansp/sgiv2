<?php

require "vendor/autoload.php";
session_start();

use \Rain\tpl;
use \SGI\Page;
use \SGI\Model\User;
use \SGI\Model\Menus;

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

$app->get("/menu",function(){
   //User::verifyLogin();
   $menu = new Menus();
   $p = new Page();
   $data=$menu->listAll();
   $p->setTpl("menu",array("menu"=>$data));
});

$app->get("/menu/create",function(){
   //User::verifyLogin();
   $p = new Page();
   $p->setTpl("menu-create");
});
$app->post("/menu/create",function(){
   $m = new Menus();
   $m->setData($_POST);
   $m->save();
   header("Location: /menu");
   exit();
});
$app->get("/menu/update/:idmenu",function($idmenu){
   //User::verifyLogin();
   $p = new Page();
   $m = new Menus();
   $m->get((int)$idmenu);
   $p->setTpl("menu-update",array("menu"=>$m->getValues()));
});
$app->post("/menu/update/:idmenu",function($idmenu){
   //User::verifyLogin();
   $p = new Page();
   $m = new Menus();
   $m->get((int)$idmenu);
   $m->setData($_POST);
   $m->update();
   header("Location: /menu");
   exit();
});
$app->get("/menu/del/:idmenu",function($idmenu){
   //User::verifyLogin();
   $m = new Menus();
   $m->get((int)$idmenu);
   $m->delete();
   header("Location: /menu");
   exit();  
});

$app->run();
