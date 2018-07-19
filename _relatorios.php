<?php

use \Rain\tpl;
use \SGI\PageReport;
use \SGI\Page;
use \SGI\Model\Secretaria;
use \SGI\Model\User; 
use \SGI\Model\Relatorios; 



//-------------Rotas Membros--------------

$app->get("/relatorios",function(){
 User::verifyLogin();
 $page = new Page(); 
 $Secretaria = new Secretaria();
 $page->setTpl("dashboard-relatorios");
});

$app->get("/relatorios/listamembros",function(){
 User::verifyLogin();
 $Membros = new Secretaria();
 $data = $Membros->gerarRelatorio();
 $relatorio = new Relatorios("lista-membros",$data);
 $relatorio->escrever();
 exit();
});
