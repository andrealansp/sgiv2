<?php

require "vendor/autoload.php";
session_start();

use \Rain\tpl;
use \SGI\Page;
use \SGI\Model\User; 


$app = new \Slim\Slim();

require "_user.php";
require "_financas.php";
require "_secretaria.php";
require "_relatorios.php";

$app->get("/", function() {
  $page = new Page(['header' => false, 'footer' => false]);
  $page->setTpl("login");
});

$app->get("/login", function() {
    User::verifyLogin();
  $p = new Page(['header' => false, 'footer' => false]);
  $p->setTpl("login");
});

$app->post("/login", function() {
  User::login($_POST["login"], $_POST["password"]);
  header("location: /home");
  exit();
});

$app->get("/home", function() {
  User::verifyLogin();
  $p = new Page();
  $p->setTpl("home", [
    "session" => session_id(),
    "user" => $_SESSION[User::SESSION]['idusuarios']
  ]);
});

$app->get("/logout", function() {
  User::logout();
  header("location: /");
  exit();
});

$app->run();
