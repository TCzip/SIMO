<div class="container"><!-- ConteÃºdo -->
	<form class="" method="post">

		<!-- <div class="form-group row">
			<div class="col-xs-4">
				<label class="col-form-label" for="jobSelect">Serviço</label>
				<select class="form-control col-xs-3" name="jobSelect" placeholder="Selecione o serviço">
					<option value="selecione">Selecione...</option>
					<option value="atendimento">Atendimento 0800-282-8082</option>
					<option value="monitoramento">Monitoramento Ocorrências</option>
				</select>
			</div>
		</div> -->
		<div class="form-group row">
			<div class="col-xs-4">
				<label class="col-form-label" for="groupSelection">Equipe</label>
				<select class="form-control col-xs-3" name="groupSelection" required>
					<option value="Selecione"></option>
					<?php
						foreach ($groups->result() as $option) {
							echo '<option value="'.$option->idGroup.'">'.$option->groupName.'</option>';
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<label class="col-form-label" for="scheduleSelection">Escala</label>
				<select class="form-control col-xs-3" name="scheduleSelection">
					<option value="0" selected="selected">Seleccione a Escala...</option>
					<option value="1">Escala comum 0800</option>
					<!-- <option value="Selecione">Escala de final de ano</option> -->
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
				<input type="radio" name="idSchedule" value="1"> 07:00 - 13:00 <br>
				<input type="radio" name="idSchedule" value="2"> 13:00 - 18:00 <br>
				<input type="radio" name="idSchedule" value="3"> 18:00 - 23:00 <br>
				<input type="radio" name="idSchedule" value="5"> Folga <br>
				<input type="radio" name="idSchedule" value="6"> Descanso <br>
				<input type="radio" name="idSchedule" value="7"> Sobreaviso <br>
				<!-- <input type="checkbox" name="check4" id="check4" value="4"> 23:00 - 07:00 <br> -->
			</div>
		</center>
		</div>
		<center>
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="btn btn-sm btn-primary"type="submit" name="submit" value="CADASTRAR">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
		<?php
		if ($message == 1) {

		echo '<div id="mensagem">';
		echo '<div class="alert alert-danger">';
		echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
		echo '<i class="fa fa-exclamation-circle"></i> Entrada entre datas já existente!</div>';
		echo '</div>';
		}
		if ($message == 2) {

		echo '<div id="mensagem">';
		echo '<div class="alert alert-success">';
		echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
		echo '<i class="fa fa-exclamation-circle"></i> Entrada efetuada!</div>';
		echo '</div>';
		}
		?>
			</div>
		</div>
		</center>
	</form>
</div>

<script language="javascript">
	document.getElementById("startDate").valueAsDate = new Date();
	document.getElementById("endDate").valueAsDate =
	new Date(new Date().setMonth(new Date().getMonth()+1));
</script>
