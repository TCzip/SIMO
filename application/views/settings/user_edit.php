<div class="container">
	<div class="content">
		<div class="center">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Edite o usuário</h3>
					</div>
					<div class="panel-body">
            <form name="alterasenha" method="post" id="alterasenha">
              <div class="row">
                <div class="col-md-12">
                  <?php
                  if ($error==1) {
                    echo '<div id="mensagem">';
                    echo '<div class="alert alert-danger">';
                    echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                    echo '<i class="fa fa-exclamation-circle"></i> Email já utilizado! </div>';
                    echo '</div>';
                  }
                  if ($error==2) {
                    echo '<div id="mensagem">';
                    echo '<div class="alert alert-danger">';
                    echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                    echo '<i class="fa fa-exclamation-circle"></i> Usuário já utilizado! </div>';
                    echo '</div>';
                  }
                  if ($error==3) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Nome de Guerra já utilizado! </div>';
                      echo '</div>';
                  }
                  if ($error==4) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Email inválido! </div>';
                      echo '</div>';
                  }
                  // if ($error==5) {
                  //     echo '<div id="mensagem">';
                  //     echo '<div class="alert alert-danger">';
                  //     echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                  //     echo '<i class="fa fa-exclamation-circle"></i> Contacte o ADM! </div>';
                  //     echo '</div>';
                  // }
                  if ($error==6) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-success">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Alterado! </div>';
                      echo '</div>';
                  }
                  ?>
                </div>
              </div>
							<div class="row">
								<div class="form-group col-md-12">
                  <label for="currpassword">Nome completo</label>
                  <input type="text" class="form-control" name="fullname" value="<?= set_value('fullname') ? : (isset($fullname) ? $fullname : '') ?>" placeholder="Nome Completo" id="fullname" required autofocus>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="groupSelection">E-mail</label>
                	<input type="text" class="form-control" name="email" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" placeholder="Email" id="email" required>
								</div>
              </div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="groupSelection">Usuário</label>
                  <input type="text" class="form-control" name="username" value="<?= set_value('username') ? : (isset($username) ? $username : '') ?>" placeholder="Nome de Usu&aacute;rio" id="username" required>
								</div>
              </div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="groupSelection">Nome de Guerra</label>
                  <input type="text" class="form-control" name="nickname" value="<?= set_value('nickname') ? : (isset($nickname) ? $nickname : '') ?>" placeholder="Nome de Guerra" id="nickname" >
								</div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Escala inicial</label>
                </div>
                  <div class="form-group col-md-12">
                  <div class="radio-inline">
                    <input type="radio" name="userlevel" value="2" <?php if ($idPermission == 2){echo 'checked';} ?> required=""> Administrador
                  </div>
                  <div class="radio-inline">
                    <input type="radio" name="userlevel" value="1" <?php if ($idPermission == 1){echo 'checked';}?>>    Usu&aacute;rio<br>
                  </div>
                </div>
              </div>
							<div class="row">
                <div class="col-md-6">
                  <a class="btn btn-sm btn-danger btn-block" href="<?php echo base_url('user_settings'); ?>"  type="button" name="Submit" value="Cancelar">VOLTAR</a>
                </div>
								<div class="col-md-6">
									<input class="btn btn-sm btn-primary btn-block" id="btnAlterarSenha" type="Submit" name="submit" value="ALTERAR">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>
