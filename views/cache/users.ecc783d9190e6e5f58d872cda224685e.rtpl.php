<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cadastro de Usuários
      <small>Cadastro / Alteração / Exclusão </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <a href="/administracao/users/create" class="btn btn-success">Criar Usuário</a>
    <table class="table table-hover" id="tb-users">
      <thead>
        <tr>
          <th>id</th>
          <th>Nome</th>
          <th>Login</th>
          <th>Profile</th>
          <th>Função</th>
          <th>Dt Registro</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>

        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
        <tr>
          <td><?php echo htmlspecialchars( $value1["idusuarios"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $value1["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td id="td-profile"><?php echo htmlspecialchars( $value1["desperfil"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td id="td-funcao"><?php echo htmlspecialchars( $value1["desfuncao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $value1["dtcriacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><a href="/administracao/users/update/<?php echo htmlspecialchars( $value1["idusuarios"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">Editar</a> / <a href="/administracao/users/del/<?php echo htmlspecialchars( $value1["idusuarios"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger">Deletar</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

