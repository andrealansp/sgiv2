<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar dados dos usuários
            <small>Formulário para edição de dados de Usuários</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <form action="/administracao/users/editar/<?php echo htmlspecialchars( $user["idusuarios"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" >
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" name="desnome" value="<?php echo htmlspecialchars( $user["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" placeholder="Password" name="deslogin " value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>    
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md4">
                    <div class="form-group">
                        <label for="despassword">Senha</label>
                        <input type="password" id="despassword" class="form-control" name="despassword" placeholder="Senha" value="<?php echo htmlspecialchars( $user["despassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md4"><div class="form-group">
                    <label for="ctrpassword">Confirme a Senha</label>
                    <input type="password" id="ctrpassword" name="ctrpassword" class="form-control" placeholder="Confirme a Senha">
                </div>
            </div>  
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="desemail" placeholder="Email" class="form-control" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
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
                    <select name="desperfil" id="profile" class="form-control">
                      <option value="Administrador">Administrador</option>
                      <option value="Secretária">Secretária</option>
                      <option value="Financeiro">Financeiro</option>
                      <option value="Membro">Membro</option>
                  </select>
              </div>
          </div> 
          <div class="col-lg-4">
            <div class="form-group">
                <label for="profile">Função Ecleciástica:</label>
                <select name="desfuncao" id="funcoes" class="form-control">
                   <option value="Pastor Presidente">Pastor Presidente</option>
                   <option value="Vice Presidente">Vice Presidente</option>
                   <option value="1º Tesoureiro">1º Tesoureiro</option>
                   <option value="2º Tesoureiro">2º Tesoureiro</option>
                   <option value="1ª Secretária">1ª Secretária</option>
                   <option value="2ª Secretária">2ª Secretária</option>
                    <option value="Membro">Membro</option>
               </select>
           </div>     
       </div>          

   </div>
   <div class="row">
    <div class="col-lg-2 col-md-2">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>
</form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

