<div class="content">
  <div class="form-signin center well">
    <br>
    <select class="form-control" name="groups" id="groups" onchange='getGroupMembers($(this).val())'>
    <?php echo $groups; ?>
    </select>
    <div class="table-responsive" name="members" id="members">
    </div>
      <select class="form-control" name="users" id="users">
        <option value="0">Adicionar Integrante...</option>
      <?php echo $users_option; ?>
      </select>
      <br>
      <button class="btn btn-primary" type="button" name="button" onclick='addMember($(users).val(),$(groups).val())'>Inserir Membro</button>
  </div>
</div>
