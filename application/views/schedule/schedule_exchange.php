<div class="container">
  <div class="content">
    <div class="center">
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Consulte uma escala</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="year">Ano</label>
                <select class="form-control" name="year" id="year" onchange="generateViewByMembersTable($(year).val(),$(month).val())">
                  <option value="0" disabled="" selected="">Selecione o ano</option>
                  <option value="<?= $year = date('Y', strtotime(" - 1 year")); ?>"><?= $year = date('Y', strtotime(" - 1 year")); ?></option>
                  <option value="<?= $year = date('Y'); ?>"><?= $year = date('Y'); ?></option>
                  <option value="<?= $year = date('Y', strtotime(" + 1 year")); ?>"><?= $year = date('Y', strtotime(" + 1 year")); ?></option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
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
            </div>
          </div>
        </div>
      </div>

      <form class="login" method="post">
        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>1 </strong>Selecione sua escala</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <?php
                    if (form_error('scheduledOwnerUsers')) {
                      $error = form_error('scheduledOwnerUsers');
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo $error.'</div>';
                      echo '</div>';
                    };
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="ownerDate">Data da troca</label>
                  <input class="form-control"  name="ownerDate" id="ownerDate" type="date" onchange="resetOwnerSchedule()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="ownerDate">Escala</label>
                  <select class="form-control" name="ownerSchedule" id="ownerSchedule" onchange="getOwnerScheduleMembers($(ownerDate).val(),$(ownerSchedule).val())">
                    <option value="0" disabled="" selected="">Selecione a escala</option>
                    <option value="1">07:00 - 13:00</option>
                    <option value="2">13:00 - 18:00</option>
                    <option value="3">18:00 - 23:00</option>
                    <option value="4">23:00 - 07:00</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="scheduledOwnerUsers">Usuário</label>
                  <select class="form-control" name="scheduledOwnerUsers" id="scheduledOwnerUsers"></select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>2 </strong>Selecione a troca</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <?php
                    if (form_error('scheduledOccupierUsers')) {
                      $error = form_error('scheduledOccupierUsers');
                      echo '<div id="mensagem">';
                      echo '<div class="alert alert-danger">';
                      echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
                      echo $error.'</div>';
                      echo '</div>';
                    };
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="occupierDate">Data da troca</label>
                  <input class="form-control"  name="occupierDate" id="occupierDate" type="date" onchange="resetOccupierSchedule()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="ownerDate">Escala</label>
                  <select class="form-control" name="occupierSchedule" id="occupierSchedule" onchange="getOccupierScheduleMembers($(occupierDate).val(),$(occupierSchedule).val())">
                    <option value="0">Selecione a escala...</option>
                    <option value="1">07:00 - 13:00</option>
                    <option value="2">13:00 - 18:00</option>
                    <option value="3">18:00 - 23:00</option>
                    <option value="4">23:00 - 07:00</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="scheduledOccupierUsers">Usuário</label>
                  <select class="form-control" name="scheduledOccupierUsers" id="scheduledOccupierUsers">
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>3 </strong>Confirmar troca</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="form-group col-md-12">
                  <input class="btn btn-sm btn-primary btn-block" type="submit" name="submit" value="EFETUAR TROCA!">
                </div>
              </div>
              <div class="row">
                <?php echo $message ?>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<div class="table-responsive" name="schedule" id="schedule"></div>
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
