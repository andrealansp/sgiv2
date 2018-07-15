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
            Adicionar Menus
            <small>Cadastro / Alteração / Exclusão </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
       <form action="/menu/update/<?php echo htmlspecialchars( $menu["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" >
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" class="form-control" id="menu" placeholder="Menu" name="desmenu" value=<?php echo htmlspecialchars( $menu["desmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                        <label for="desorder">Ordem</label>
                        <input type="text" class="form-control" id="desorder" placeholder="Ordem" name="desorder" value=<?php echo htmlspecialchars( $menu["desorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="desicon">Ícone</label>
                            <input type="text" class="form-control" id="desicon" placeholder="Ícone" name="desicon" value=<?php echo htmlspecialchars( $menu["desicon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>>
                        </div>    
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Lista de Ícones
                        </button>
                    </div>  
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                        <label for="profile">Perfil de Usuário no Sistema:</label>
                        <select name="desprofile" id="profile" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4"> 
                            <ul id="icons1">

                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul id="icons2">

                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul id="icons3">

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
