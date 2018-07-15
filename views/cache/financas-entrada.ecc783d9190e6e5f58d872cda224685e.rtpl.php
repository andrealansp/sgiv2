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
    <a href="entrada/inserir" class="btn btn-success">Inserir Entrada</a>
    <table class="table table-hover" id="tb-users">
      <thead>
        <tr>
          <th>Entrada</th>
          <th>Irmão</th>
          <th>Valor</th>
          <th>Tipo de Pagamento</th>
          <th>Tipo de Entrada</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php $counter1=-1;  if( isset($entradas) && ( is_array($entradas) || $entradas instanceof Traversable ) && sizeof($entradas) ) foreach( $entradas as $key1 => $value1 ){ $counter1++; ?>
        <tr>
          <td><?php echo htmlspecialchars( $value1["dtentrada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo utf8_encode($value1["desdescricao"]); ?></td>
          <td><?php echo htmlspecialchars( $value1["nunvalor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $value1["destipopag"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo utf8_encode($value1["destipoentrada"]); ?></td>
          <td><a href="/financeiro/entrada/update/<?php echo htmlspecialchars( $value1["identrada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">Editar</a> / <a href="/financeiro/entrada/delete/<?php echo htmlspecialchars( $value1["identrada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger">Deletar</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

