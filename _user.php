<?php 

use \SGI\Model\User;
use \Rain\tpl;
use \SGI\Page;

$app->get("/administracao/users", function() {
  User::verifyLogin();
  $user = new User();
  $data = $user->listAll();
  $p = new Page();
  $p->setTpl("users", ["users" => $data
]);
});

$app->get("/administracao/users/create", function() {
  User::verifyLogin();
  $user = new User();
  $data = $user->listAll();
  $p = new Page();
  $p->setTpl("users-create");
});

$app->post("/administracao/users/create", function() {
  User::verifyLogin();
  $user = new User();
  $user->setData($_POST);
  $user->create();
  header("location: /administracao/users");
  exit();
});

$app->get("/administracao/users/del/:iduser", function($iduser) {
  User::verifyLogin();
  $user = new User();
  $user->get((int)$iduser);
  $user->delete();
  header("location: /administracao/users");
  exit();
});

$app->get("/administracao/users/update/:iduser", function($iduser) {
  User::verifyLogin();
  $user = new User();
  $page = new Page();
  $user->get((int)$iduser);    
  $page->setTpl("users-update",array("user"=>$user->getValues()));
});

$app->post("/administracao/users/editar/:iduser",function($iduser){
  User::verifyLogin();
  $user = new User();
  $user->get((int)$iduser);
  $user->setData($_POST);
  $user->update();
  header("location: /administracao/users");
  exit();
});