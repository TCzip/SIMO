<div class="container"><!-- ConteÃºdo -->

		<ul class="nav nav-tabs" id="abasPerfil">
			<li class="active"> <a href="#tabCreateSchedule" data-toggle="tab"><i class="fa fa-calendar"></i> Lançar escala</a></li>
			<li class=""> <a href="#tabCreateGroup" data-toggle="tab"><i class="fa fa-pencil fa-fw"></i> Configuração de Equipes</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tabCreateSchedule">
				<br>
				<form class="" method="post">
					<div class="form-group row">
						<div class="col-xs-4">
							<label class="col-form-label" for="jobSelect">Serviço</label>
							<select class="form-control col-xs-3" name="jobSelect" placeholder="Selecione o serviço">
								<option value="selecione">Selecione...</option>
								<option value="atendimento">Atendimento 0800-282-8082</option>
								<option value="monitoramento">Monitoramento Ocorrências</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-xs-4">
							<label class="col-form-label" for="nicknameSelection">Nome do Policial</label>
							<select class="form-control col-xs-3" name="nicknameSelection">
								<option value="Selecione">Selecione o Policial...</option>
								<?php
									foreach ($nickname as $value) {
										echo '<option value="'.$value->nickname.'">'.$value->nickname.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-xs-4">
							<label class="col-form-label" for="scheduleSelection">Escala</label>
							<select class="form-control col-xs-3" name="nicknameSelection">
								<option value="Selecione">Selecione a Escala...</option>
								<option value="Selecione">Escala comum 0800</option>
								<option value="Selecione">Escala de final de ano</option>
								<!-- <?php
								//será implementado posteriormente as escalas dinâmicas
								//	foreach ($nickname as $value) {
								//		echo '<option value="'.$value->nickname.'">'.$value->nickname.'</option>';
								//	}
								?> -->
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-xs-2">
							<label class="col-form-label" for="startDate">Data Inicial</label>
							<input class="form-control"  name="startDate" id="startDate" type="date">
						</div>
						<div class="col-xs-2">
							<label class="col-form-label" for="endDate">Data Final</label>
							<input class="form-control"  name="endDate" id="endDate" type="date">
						</div>
					</div>
					<div class="form-group row">
						<center>
						<div class="col-xs-4">
							<label class="col-form-label">Escala para Data Inicial</label><br>
							<input type="checkbox" name="check1" id="check1"> 07:00 - 13:00 <br>
							<input type="checkbox" name="check2" id="check2"> 13:00 - 18:00 <br>
							<input type="checkbox" name="check3" id="check3"> 18:00 - 23:00 <br>
							<input type="checkbox" name="check4" id="check4"> 23:00 - 07:00 <br>
						</div>
					</center>
					</div>
					<center>
					<div class="form-group row">
						<div class="col-xs-4">
							<input class="btn-primary"type="submit" name="submit" value="CADASTRAR">
						</div>
					</div>
				</center>
				</form>
							<br>
					</div>
			<div class="tab-pane" id="tabCreateGroup">
				<br>
				<form class="form-signin text-center well" name="newGroup" method="post" id="formNewGroup" action="">
asdsad
				</form>
					</div>
					<br>
			</div>

</div>













<script language="javascript">
	document.getElementById("startDate").valueAsDate = new Date();
	document.getElementById("endDate").valueAsDate =
	new Date(new Date().setMonth(new Date().getMonth()+1));
</script>
