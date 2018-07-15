<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Lista de Funções</li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Administração</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/users">Usuários</a></li>
          <li><a href="/menu">Menu</a></li>
          <li><a href="/submenu">Sub-Menu</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Secretaria</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Financeiro</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Entradas Financeiras
      <small>Cadastro / Alteração / Exclusão </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <form action="/financeiro/entrada/inserir" method="post" >
      <div class="row">
        <div class="col-lg-2 col-md-5">
         <div class="form-group">
          <label for="dataEntrada">Data de Entrada</label>
          <input type="date" class="form-control" id="dataEntrada" placeholder="Data de Entrada" name="dtentradas">
        </div>
      </div>
      <div class="col-lg-5 col-md-5">
        <div class="form-group">
          <label for="descricao">Nome do Irmão</label>
          <input type="text" class="form-control" id="descricao" placeholder="Nome do irmão" name="desdescricao">
        </div>    
      </div>
      <div class="col-lg-5 col-md-5">
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="text" class="form-control" id="valor" placeholder="Valor" name="nunvalor">
        </div>    
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="tppag">Tipo de pagamento</label>
          <select name="destipopag" id="tppag" class="form-control">
            <option value="">---------------</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Cheque">Cheque</option>
            <option value="Transferência Bancária">Transferência Bancária</option>
          </select>
        </div>  
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for="tpentrada">Tipo de Entrada</label>
          <select name="destipoentrada" id="tpentrada" class="form-control">
            <option value="">---------------</option>
            <option value="Dízimo">Dízimo</option>
            <option value="Oferta">Oferta</option>
            <option value="Contribuição Específica">Contribuição Específica</option>
          </select>
        </div>     
      </div> 
    </div>       
    <div class="row">
      <div class="col-lg-2 col-md-2">
        <button type="submit" class="btn btn-sucess">Enviar</button>
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

