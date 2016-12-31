<div class="container"><!-- ConteÃºdo -->
  <div class="tab-content">
    <br>
    <form class="form-signin text-center well" name="cadastro" method="post" id="formCadastrarNovoUsuario" action="">
		  <h4><?php echo $mode; ?></h4>
			<input type="text" class="form-control" name="fullname" value="<?= set_value('fullname') ? : (isset($fullname) ? $fullname : '') ?>" placeholder="Nome Completo" id="fullname" required autofocus>
			<br/>
      <span class="erro"><?php echo form_error('email') ?  : ''; ?></span>
			<input type="text" class="form-control" name="email" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" placeholder="Email" id="email" required>
			<br/>
      <span class="erro"><?php echo form_error('username') ?  : ''; ?></span>
			<input type="text" class="form-control" name="username" value="<?= set_value('username') ? : (isset($username) ? $username : '') ?>" placeholder="Nome de Usu&aacute;rio" id="username" required>
			<br/>
      <span class="erro"><?php echo form_error('nickname') ?  : ''; ?></span>
			<input type="text" class="form-control" name="nickname" value="<?= set_value('nickname') ? : (isset($nickname) ? $nickname : '') ?>" placeholder="Nome de Guerra" id="nickname" required>
			<br/>
			<input type="radio" name="userlevel" value="2" <?php if ($idPermission == 2){echo 'checked';} ?> required=""> Administrador
			<input type="radio" name="userlevel" value="1" <?php if ($idPermission == 1){echo 'checked';}?>>    Usu&aacute;rio<br>
			<br />
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-sm btn-primary btn-block" href="<?php echo base_url('user_settings'); ?>"  type="button" name="Submit" value="Cancelar">Voltar</a>
        </div>
        <div class="col-md-6">
          <input class="btn btn-sm btn-primary btn-block" type="submit" name="Submit" value="Salvar">
        </div>
      </div>
			<br>
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
		</form>
	</div>
</div>
