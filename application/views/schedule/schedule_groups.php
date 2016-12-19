<div class="content">
  <div class="form-signin center well">
    <div class="row">
      <?= anchor('schedule_newGroup', 'Nova Equipe', array('class' => 'btn btn-primary')); ?>
    </div>
    <br>
    <select class="form-control" name="groups" id="groups" onchange='getGroupMembers($(this).val())'>
    <?php echo $groups; ?>
    </select>
    </p>
    <div class="table-responsive" name="members" id="members">
    </div>
    <div class="row">
      <select class="form-control" name="users" id="users">
        <option value="0">Escolha o Integrante para adicionar:</option>
      <?php echo $users_option; ?>
      </select>
      <br>
      <button class="btn btn-primary" type="button" name="button" onclick='addMember($(users).val(),$(groups).val())'>Inserir Membro</button>
    </div>
  </div>
</div>
