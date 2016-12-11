<br>
<div class="col-md-4">
  <div class="row">
    <?= anchor('create', 'Nova Equipe', array('class' => 'btn btn-primary')); ?>
  </div>
  <div class="row">
    <?php
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="table-responsive">';
    if ($cadastros->num_rows() > 0){
      echo'<table class="table table-striped">
        <thead>
          <tr>
            <th>Nome de Guerra</th>
            <th>Ações</th>
          </tr>
        </thead>
      <tbody>';
      }
      $cadastro = $cadastros->result();
      $ind = 0;
      foreach ($cadastro as $value) {
        echo '<tr>';?>
        <?php

        echo '<td>'. $cadastro[$ind]->nickname . '</td>';

        $idUser = $cadastro[$ind]->idUser;
        echo '<td><a href="#" title="Remover" class="btn btn-danger fa fa-times confirma_exclusao" data-id="'
        .$cadastro[$ind]->idUser .'" data-nickname="' . $cadastro[$ind]->nickname . '" /> </a></td>';
        echo '</tr>';
        $ind = $ind + 1;
      }
      ?>
      </tbody>
    </table>
  </div>
  </div>
</div>
<div class="modal fade" id="modal_confirmation">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Deseja remover <strong><span id="nickname_exclusao"></span></strong> da equipe?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NÃO!</button>
        <button type="button" class="btn btn-danger" id="btn_excluir">SIM! EXCLUIR</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
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
