<div class="container">
  <div class="content">
    <div class="center">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Selecione a data da escala</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="form-group col-md-4">
                <label for="year">Ano</label>
                <select class="form-control" name="year" id="year" onchange="generateViewByMembersTable($(year).val(),$(month).val())">
                  <option value="0" disabled="" selected="">Selecione o ano</option>
                  <option value="<?= $year = date('Y', strtotime(" - 1 year")); ?>"><?= $year = date('Y', strtotime(" - 1 year")); ?></option>
                  <option value="<?= $year = date('Y'); ?>"><?= $year = date('Y'); ?></option>
                  <option value="<?= $year = date('Y', strtotime(" + 1 year")); ?>"><?= $year = date('Y', strtotime(" + 1 year")); ?></option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="year">Mês</label>
                <select class="form-control" name="month" id="month" onchange="generateViewByMembersTable($(year).val(),$(month).val())">
                  <option value="0" disabled="" selected="">Selecione o mês</option>
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
              <div class="col-md-4">
                <label for="">&nbsp;</label>
                <button class="btn btn-sm btn-primary btn-block" id="btn"><i class="fa fa-print fa-1x" aria-hidden="true"></i> IMPRIMIR ESCALAS</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>
<div class="table-responsive" name="schedule2" id="schedule2"></div>


<script>
    document.getElementById('btn').onclick = function() {
    var conteudo = document.getElementById('schedule').innerHTML,
    tela_impressao = window.open('CICCR:ESCALA DE SERVIÇO');
    tela_impressao.document.write(conteudo);
    tela_impressao.window.print();
    tela_impressao.window.close();
};
</script>
