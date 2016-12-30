<div class="content">
  <div class="form-signin center well">
    <div class="row">
      <select class="form-control" name="year" id="year" onchange="generateViewByMembersTable($(year).val(),$(month).val())">
        <option value="<?= $year = date('Y'); ?>" selected><?= $year = date('Y'); ?></option>
        <option value="<?= $year = date('Y', strtotime(" + 1 year")); ?>"><?= $year = date('Y', strtotime(" + 1 year")); ?></option>
      </select>
    </div>
    <br>
    <div class="row">
      <select class="form-control" name="month" id="month" onchange="generateViewByMembersTable($(year).val(),$(month).val())">
        <option value="0">Selecione o mês...</option>
        <option value="1">Janeiro</option>
        <option value="2">Fevereiro</option>
        <option value="3">Março</option>
        <option value="4">Abril</option>
        <option value="5">Maio</option>
        <option value="6">Junho</option>
        <option value="7">Julho</option>
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
      </select>
    </div>
  </div>
  <br>
</div>
<div class="table-responsive" name="schedule" id="schedule">
</div>
<div class="table-responsive" name="schedule2" id="schedule2">
</div>

<form class="login" method="post">


<div class="form-group row">
  <div class="col-xs-2">
    <label class="col-form-label" for="ownerDate">Data da sua escala:</label>
    <input class="form-control"  name="ownerDate" id="ownerDate" type="date" onchange="resetOwnerSchedule()">
  </div>
  <div class="col-xs-2">
    <label class="col-form-label" for="occupierDate">Data de quem vai trocar:</label>
    <input class="form-control"  name="occupierDate" id="occupierDate" type="date" onchange="resetOccupierSchedule()">
  </div>
</div>
<div class="form-group row">
  <div class="col-xs-2">
    <select class="form-control" name="ownerSchedule" id="ownerSchedule" onchange="getOwnerScheduleMembers($(ownerDate).val(),$(ownerSchedule).val())">
      <option value="0">Selecione a escala...</option>
      <option value="1">07:00 - 13:00</option>
      <option value="2">13:00 - 18:00</option>
      <option value="3">18:00 - 23:00</option>
      <option value="4">23:00 - 07:00</option>
    </select>
  </div>
  <div class="col-xs-2">
    <select class="form-control" name="occupierSchedule" id="occupierSchedule" onchange="getOccupierScheduleMembers($(occupierDate).val(),$(occupierSchedule).val())">
      <option value="0">Selecione a escala...</option>
      <option value="1">07:00 - 13:00</option>
      <option value="2">13:00 - 18:00</option>
      <option value="3">18:00 - 23:00</option>
      <option value="4">23:00 - 07:00</option>
    </select>
  </div>
</div>
<div class="form-group row">
  <div class="col-xs-2">
    <select class="form-control" name="scheduledOwnerUsers" id="scheduledOwnerUsers">
    </select>
  </div>
  <div class="col-xs-2">
    <select class="form-control" name="scheduledOccupierUsers" id="scheduledOccupierUsers">
    </select>
  </div>
</div>
<div class="form-group row">
  <div class="col-xs-2">
    <?php echo form_error('scheduledOwnerUsers'); ?>
  </div>
  <div class="col-xs-2">
    <?php echo form_error('scheduledOccupierUsers'); ?>
  </div>
</div>

<div class="form-group row">
<input class="btn btn-primary" type="submit" name="submit" value="EFETUAR TROCA!">
</div>


</form>
<?php echo $message ?>
<!-- <button class="btn btn-primary" id="btn">Imprimir Escala</button> -->

<!-- <script>
    document.getElementById('btn').onclick = function() {
    var conteudo = document.getElementById('schedule').innerHTML,
    tela_impressao = window.open('CICCR:ESCALA DE SERVIÇO');
    tela_impressao.document.write(conteudo);
    tela_impressao.window.print();
    tela_impressao.window.close();
};
</script> -->
