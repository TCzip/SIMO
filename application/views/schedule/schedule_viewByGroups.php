<div class="container-fluid" ><!-- ConteÃºdo -->
  <center>
  <div class="row">
    <select class="form-control" name="year">
      <option value="<?= $year = date('Y', strtotime(" - 1 year")); ?>"><?= $year = date('Y', strtotime(" - 1 year")); ?></option>
      <option value="<?= $year = date('Y'); ?>" selected><?= $year = date('Y'); ?></option>
      <option value="<?= $year = date('Y', strtotime(" + 1 year")); ?>"><?= $year = date('Y', strtotime(" + 1 year")); ?></option>
    </select>
  </div>
  <div class="row">
    <select class="form-control" name="month" onchange="generateViewByGroupsTable($(year).val(),$(month).val())">
      <option value="1">Selecione o mês...</option>
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
  <div class="table-responsive" name="teste" id="teste">
  </div>
  <div class="table-responsive" name="schedule" id="schedule">
    <!-- <table border="1" class="table table-bordered table-striped table-highlight"><tr width="40" >
      <th style="text-align:center; " width="40">'.'ESCALA'.'</th> -->
  </div>
</div>
