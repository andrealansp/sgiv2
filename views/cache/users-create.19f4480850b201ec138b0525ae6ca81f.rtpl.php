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
      Criar Usuários
      <small>Formulário para Criação de Usuários</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <form action="/users/create" method="post" >
      <div class="row">
        <div class="col-lg-5 col-md-5">
         <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome" name="desnome">
        </div>
      </div>
      <div class="col-lg-5 col-md-5">
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="Password" name="deslogin">
        </div>    
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md4">
        <div class="form-group">
          <label for="despassword">Senha</label>
          <input type="password" id="despassword" class="form-control" name="despassword" placeholder="Senha">
        </div>
      </div>
      <div class="col-lg-4 col-md4"><div class="form-group">
        <label for="ctrpassword">Confirme a Senha</label>
        <input type="password" id="ctrpassword" name="ctrpassword" class="form-control" placeholder="Confirme a Senha">
      </div></div>
      <div class="col-lg-4 col-md4">
       <div class="form-group">
        <label for="cel">Celular</label>
        <input type="text" id="cel" name="nrcel" class="form-control" placeholder="Celular">
      </div></div>  
    </div>

    <div class="row">
      <div class="col-lg-5 col-md-5">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="desemail" placeholder="Email" class="form-control" >
        </div>
      </div>
      <div class="col-lg-5 col-md-5">
        <div class="form-group ">
          <label for="ctremail">Confirme o e-mail</label>
          <input type="email" id="ctremail" name="ctremail" placeholder="Confirme o Email" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="profile">Perfil de Usuário no Sistema:</label>
          <select name="desprofile" id="profile" class="form-control">
            <option value=""></option>
            </select>
            </div>  
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label for="profile">Função Ecleciástica:</label>
              <select name="desfuncao" id="funcoes" class="form-control">
                <option value="-1"></option>
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

