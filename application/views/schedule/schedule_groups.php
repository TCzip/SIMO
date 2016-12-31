<div class="container">
  <div class="content">
    <div class="center">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Gerencie membros da equipe</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="groups">Equipe</label>
                <select class="form-control" name="groups" id="groups" onchange='getGroupMembers($(this).val())'>
                  <option value="0" disabled="" selected="">Selecione uma equipe</option>
                  <?php echo $groups; ?>
                </select>
                <div class="table-responsive" name="members" id="members"></div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="user">Usuário</label>
                <select class="form-control" name="users" id="users">
                  <option value="0" disabled="" selected="">Adicione um integrante</option>
                </select>
              </div>
            </div>
            <button class="btn btn-sm btn-primary btn-block" type="button" name="button" onclick='addMember($(users).val(),$(groups).val())'>INSERIR MEMBRO</button>
  </div>
</div>
