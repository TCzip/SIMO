<div class="container">
	<div class="content">


	<div class="col-md-11">
		<div class="row">
			<?= anchor('user_create', 'Novo Cadastro', array('class' => 'btn btn-primary')); ?>
		</div>
		<div class="row">
			<h3><?php echo $cadastros->num_rows(); echo ' usuário(s)</h3>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="table-responsive">';
			if ($cadastros->num_rows() > 0){
				echo'<table class="table table-striped">
					<thead>
						<tr>
							<th>Nome Completo</th>
							<th>Email</th>
							<th>Usuário</th>
							<th>Nome de Guerra</th>
							<th>Privilégio</th>
							<th>Ações</th>
						</tr>
					</thead>
				<tbody>';
				}
				$cadastro = $cadastros->result();
				$ind = 0;
				foreach ($cadastro as $value) {
					echo '<tr>';?>
					<?php
					echo '<td>'. $cadastro[$ind]->fullname . '</td>';
					echo '<td>'. $cadastro[$ind]->email . '</td>';
					echo '<td>'. $cadastro[$ind]->username . '</td>';
					echo '<td>'. $cadastro[$ind]->nickname . '</td>';
					if ($cadastro[$ind]->idPermission == 2){
						echo '<td>Administrador</td>';
					}else{
						echo '<td>Usuário</td>';
					}
					$idUser = $cadastro[$ind]->idUser;
					echo '<td><a href="settings/user_edit/'.$idUser.'" class="btn btn-default fa fa-pencil-square-o" title="Editar" aria-hidden="true"> </a>
						| <a href="#" title="Deletar" class="btn btn-danger fa fa-trash-o confirma_exclusao" data-id="'
					.$cadastro[$ind]->idUser .'" data-fullname="' . $cadastro[$ind]->fullname . '" /> </a></td>';
					echo '</tr>';
					$ind = $ind + 1;
				}
				?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<div class="modal fade" id="modal_confirmation">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Confirmação de Exclusão</h4>
	      </div>
	      <div class="modal-body">
	        <p>Deseja realmente excluir: <strong><span id="fullname_exclusao"></span></strong>?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">NÃO!</button>
	        <button type="button" class="btn btn-danger" id="btn_excluir">SIM! EXCLUIR</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>

</div>
