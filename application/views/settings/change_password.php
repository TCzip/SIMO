<div class="container"><!-- ConteÃºdo -->
  <div class="tab-content">
    <br>
    <form class="form-signin text-center well" name="alterasenha" method="post" id="alterasenha">
      <h4>Alterar Senha (SIMO)</h4>
      <input type="password" name="currpassword" class="form-control" placeholder="Senha atual" id="currpassword" required autofocus>
      <br/>
      <input type="password" name="newpassword" class="form-control" placeholder="Nova senha" id="newpassword" required value="">
      <br/>
      <input type="password" name="newpasswordconf" class="form-control" placeholder="Nova senha (confirmação)" id="newpasswordconf" required value="">
      <br/>
      <button class="btn btn-primary btn-lg btn-block" id="btnAlterarSenha" type="Submit">Alterar</button>
      <br>
      <?php
      if ($message==1) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-success">';
        echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Senha Alterada!</div>';
        echo '</div>';
      }
      if ($message==2) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Confirmação Inválida!</div>';
        echo '</div>';
      }
      if ($message==3) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Senha Atual Inválida!</div>';
        echo '</div>';
      }
      if ($message==4) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Insira uma senha diferente!</div>';
        echo '</div>';
      }
      ?>
    </form>
    <br>
  </div>
</div>
