	<div class="container"><!-- ConteÃºdo -->
	    <div>
		    <ul class="nav nav-tabs" id="abasPerfil">
	        <?php 
		    	
		    	if ($this->session->userdata['user_level'] == 1) {
	 				echo '<li class="active"> <a href="#tabAlterarSenha" data-toggle="tab"><i class="fa fa-asterisk"></i> Alterar minha senha</a></li>';
	 			}
			    if ($this->session->userdata['user_level']==2) {

	    			
	    			if ($tab==2) {
	    				echo '<li class=""> <a href="#tabAlterarSenha" data-toggle="tab"><i class="fa fa-asterisk"></i> Alterar minha senha</a></li>';
	    				echo '<li class="active"> <a href="#tabCadastrarNovoUsuario" data-toggle="tab"><i class="fa fa-pencil fa-fw"></i> Cadastrar Novo Usuário</a></li>';
	    			}else{
	    				echo '<li class="active"> <a href="#tabAlterarSenha" data-toggle="tab"><i class="fa fa-asterisk"></i> Alterar minha senha</a></li>';
	    				echo '<li class=""> <a href="#tabCadastrarNovoUsuario" data-toggle="tab"><i class="fa fa-pencil fa-fw"></i> Cadastrar Novo Usuário</a></li>';
	    			}
	    		}
        	?>
		    </ul>
		    <div class="tab-content">
		        <div class="<?php if($this->session->userdata['user_level'] == 1) {echo"tab-pane active";}elseif ($tab ==1) {echo"tab-pane active";}else{echo"tab-pane";}?>" id="tabAlterarSenha">
		            <br>

		            <form class="form-signin text-center well" name="alterasenha" method="post" id="alterasenha" action="Inside/set_password">
		                <h4>Alterar Senha (SIMO)</h4>
		                <input type="password" name="currpassword" class="form-control" placeholder="Senha atual" id="currpassword" required autofocus>
		                <br/>
		                <input type="password" name="newpassword" class="form-control" placeholder="Nova senha" id="newpassword" required value="">
		                <br/>
		                <input type="password" name="newpasswordconf" class="form-control" placeholder="Nova senha (confirmação)" id="newpasswordconf" required value="">
						<br/>
		                <button class="btn btn-primary btn-lg btn-block" id="btnAlterarSenha" type="Submit">Alterar</button>
		                <br>
		                <?php
						    
							if ($message==1) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-success">';
				                echo '<a class="close" data-dismiss="alert" href="settings?tab=1" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Senha Alterada!</div>';
				                echo '</div>';
			            	}	            
			            	if ($message==2) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="settings?tab=1" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Confirmação Inválida!</div>';
				                echo '</div>';
			            	}
			           		if ($message==3) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="settings?tab=1" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Senha Atual Inválida!</div>';
				                echo '</div>';
			            	}
			            	if ($message==4) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="settings?tab=1" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Insira uma senha diferente!</div>';
				                echo '</div>';
			            	}

			            ?> 
		                <div id="alterar-senha-mensagens-carregamento"></div>
		                <div id="alterar-senha-mensagens-erro"></div>

		            </form>
		            <br>
		        </div>
		        <div class="<?php if($this->session->userdata['user_level'] == 2 && $tab==2){echo"tab-pane active";}else{echo"tab-pane";}  ?>" id="tabCadastrarNovoUsuario">
		        	<br>
		            <form class="form-signin text-center well" name="cadastro" method="post" id="formCadastrarNovoUsuario" action="Inside/new_user">
		            	<h4>Cadastrar Novo Usuário</h4>
						<input type="text" class="form-control" name="fullname" value="" placeholder="Nome Completo" id="fullname" required autofocus>
						<br/>
						<input type="text" class="form-control" name="email" value="" placeholder="Email" id="email" required>
						<br/>
						<input type="text" class="form-control" name="username" value="" placeholder="Nome de Usu&aacute;rio" id="username" required>
						<br/>
						<input type="text" class="form-control" name="nomedeguerra" value="" placeholder="Nome de Guerra" id="nomedeguerra" required>
						<br/>
						<input type="radio" name="userlevel" value="2" required=""> Administrador        
						<input type="radio" name="userlevel" value="1">    Usu&aacute;rio<br>
						<br />
						<input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Enviar">
						<br>
		                <?php
						    
							if ($error==1) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Email já utilizado! </div>';
				                echo '</div>';
			            	}	            
			            	if ($error==2) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Usuário já utilizado! </div>';
				                echo '</div>';
			            	}
			           		if ($error==3) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Nome de Guerra já utilizado! </div>';
				                echo '</div>';
			            	}
			            	if ($error==4) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Email inválido! </div>';
				                echo '</div>';
			            	}
			            	if ($error==5) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-danger">';
				                echo '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Contacte o ADM! </div>';
				                echo '</div>';
			            	}
			            	if ($error==6) {
				                echo '<div id="mensagem">';
				                echo '<div class="alert alert-success">';
				                echo '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
				                echo '<i class="fa fa-exclamation-circle"></i> Cadastrado! </div>';
				                echo '</div>';
			            	}
			            ?>
			            <div id="configuracao-de-conta-mensagens-carregamento"></div>
	        			<div id="configuracao-de-conta-mensagens-error"></div>
					</form>
	      		</div>
	      		<br>
	    	</div>
        </div>
	</div>




