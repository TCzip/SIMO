<div class="container">
	<div class="content">
		<div class="center">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Altere sua senha</h3>
					</div>
					<div class="panel-body">
            <form name="alterasenha" method="post" id="alterasenha">
              <div class="row">
                <div class="col-md-12">
                  <?php
                    if ($message==1) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-success">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Senha Alterada!</div>';
                      echo '</div>';
                    }
                    if ($message==2) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Confirmação Inválida!</div>';
                      echo '</div>';
                    }
                    if ($message==3) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Senha Atual Inválida!</div>';
                      echo '</div>';
                    }
                    if ($message==4) {
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo '<i class="fa fa-exclamation-circle"></i> Insira uma senha diferente!</div>';
                      echo '</div>';
                    }
                  ?>
                </div>
              </div>
							<div class="row">
								<div class="form-group col-md-12">
                  <label for="currpassword">Senha atual</label>
                  <input type="password" name="currpassword" class="form-control" placeholder="Insira sua senha atual" id="currpassword" required autofocus>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="groupSelection">Nova senha</label>
                  <input type="password" name="newpassword" class="form-control" placeholder="Nova senha" id="newpassword" required value="">
								</div>
              </div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="groupSelection">Confirme sua senha</label>
                  <input type="password" name="newpasswordconf" class="form-control" placeholder="Nova senha (confirmação)" id="newpasswordconf" required value="">
								</div>
              </div>
							<div class="row">
								<div class="col-md-12">
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
