<div class="content">
  <div class="form-signin center well">
    <div class="row">
      <?= anchor('create', 'Nova Equipe', array('class' => 'btn btn-primary')); ?>
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


<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

<script>
  var base_url = "<?= base_url(); ?>";

  $(function(){
    $('.confirma_exclusao').on('click', function(e) {
        e.preventDefault();

        var nickname = $(this).data('nickname');
        var id = $(this).data('id');

        $('#modal_confirmation').data('nickname', nickname);
        $('#modal_confirmation').data('id', id);
        $('#modal_confirmation').modal('show');
    });

    $('#modal_confirmation').on('show.bs.modal', function () {
      var nickname = $(this).data('nickname');
      $('#nickname_exclusao').text(nickname);
    });

    $('#btn_excluir').click(function(){
      var id = $('#modal_confirmation').data('id');
      document.location.href = base_url + "schedule/user_remove/"+id;
    });
  });
</script>
