<script type="text/javascript">
  window.onload = function(){
    getGroups();
  }
</script>

<div class="container">
  <div class="content">
    <div class="center">
      <div class="col-md-2"></div>
      <!-- Painel de edição de equipes -->
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Gerencie equipes</h3>
          </div>
          <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive" name="groups" id="groups">

                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- Painel de adição de equipes-->
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Adicione equipes</h3>
          </div>
          <div class="panel-body">
            <form class="form_CONTROL" method="post">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="group">Nome</label>
                  <input class="form-control" autofocus="" placeholder="Insira o nome da equipe" type="text" size="5" name="group" id="group" value="" pattern="[A-Z,a-z]{1}" title="Somente uma letra!">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <input class="btn btn-sm btn-primary btn-block" type="submit" name="button" value="ADICIONAR" onclick='addGroup($(group).val())'></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>
