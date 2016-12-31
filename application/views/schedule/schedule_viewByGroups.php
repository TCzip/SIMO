<div class="content">
  <div class="form-signin center well">
    <div class="row">
      <select class="form-control" name="year" id="year" onchange="generateViewByGroupsTable($(year).val(),$(month).val())">
        <option value="<?= $year = date('Y', strtotime(" - 1 year")); ?>"><?= $year = date('Y', strtotime(" - 1 year")); ?></option>
        <option value="<?= $year = date('Y'); ?>" selected><?= $year = date('Y'); ?></option>
        <option value="<?= $year = date('Y', strtotime(" + 1 year")); ?>"><?= $year = date('Y', strtotime(" + 1 year")); ?></option>
      </select>
    </div>
    <br>
    <div class="row">
      <select class="form-control" name="month" id="month" onchange="generateViewByGroupsTable($(year).val(),$(month).val())">
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
  </div>
  <br>
</div>
<div class="table-responsive" name="schedule" id="schedule">
</div>
<button class="btn btn-primary" id="btn">Imprimir Escala</button>

<script>
    document.getElementById('btn').onclick = function() {
    var conteudo = document.getElementById('schedule').innerHTML,
    tela_impressao = window.open('CICCR:ESCALA DE SERVIÇO');
    tela_impressao.document.write(conteudo);
    tela_impressao.window.print();
    tela_impressao.window.close();
};
</script>
