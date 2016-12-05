<div class="container"><!-- Conteúdo -->
	<div class="starter-template">
    <?php echo form_open(); ?>
			<div class="form-group row">
				<div class="col-xs-4">
					<label class="col-form-label" for="jobSelect">Serviço</label>
					<select class="form-control col-xs-3" id="jobSelect" placeholder="Selecione o serviço">
						<option value="selecione">Selecione...</option>
						<option value="atendimento">Atendimento 0800-282-8082</option>
						<option value="monitoramento">Monitoramento Ocorrências</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2">
					<label class="col-form-label" for="startDate">Data Inicial</label>
					<input class="form-control"  name="startDate" type="date">
				</div>
				<div class="col-xs-2">
					<label class="col-form-label" for="endDate">Data Final</label>
					<input class="form-control"  name="endDate" type="date">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-4">
					<label class="col-form-label" for="professionalNameSelection">Nome do Policial</label>
					<select class="form-control col-xs-3" name="professionalNameSelection">
						<option value="Selecione">Selecione o Policial...</option>
						<?php
							foreach ($nickname as $value) {
								echo '<option value="'.$value->nickname.'">'.$value->nickname.'</option>';
							}
						?>
					</select>
				</div>







				<div >
					<input type="checkbox" name="check1" id="check1"> 07:00 - 13:00 <br>
					<input type="checkbox" name="check2" id="check2"> 13:00 - 18:00 <br>
					<input type="checkbox" name="check3" id="check3"> 18:00 - 23:00 <br>
					<input type="checkbox" name="check4" id="check4"> 23:00 - 07:00 <br><br>
					<input type="submit" name="submit" value="REGISTRAR">
				</div>
			</form>
		</div>
		</center>
	</div>
</div>
				<script language="javascript">
				document.getElementById("startDate").valueAsDate = new Date();
				document.getElementById("endDate").valueAsDate =
				new Date(new Date().setMonth(new Date().getMonth()+1));

				</script>
