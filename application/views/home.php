    <div class="container"><!-- Conteúdo -->
      <div class="starter-template">
        <center>
        <div class="list-group" style="text-align:left; ">
                      <a href="#"  class="list-group-item"><i class="fa fa-phone fa-3x pull-left"></i>
            <h4 class="list-group-item-heading">Atendimento 0800-282-8062</h4>
            <p class="list-group-item-text">Registro de solicitações </p>
          </a>
                       <a href="#"  class="list-group-item"><i class="fa fa-search fa-3x pull-left"></i>
            <h4 class="list-group-item-heading">Consultas </h4>
            <p class="list-group-item-text">Consulta de solicitações </p>
          </a>
                      <a href="#"  class="list-group-item"><i class="fa fa-desktop fa-3x pull-left"></i>
            <h4 class="list-group-item-heading">Monitoramento </h4>
            <p class="list-group-item-text">Monitoramento de ocorrências em andamento </p>
          </a>
                      <a href="#"  class="list-group-item"><i class="fa fa-bar-chart-o fa-3x pull-left"></i>
            <h4 class="list-group-item-heading">Relatórios </h4>
            <p class="list-group-item-text">Relatórios de solicitações e solicitantes </p>
          </a>
        </div>
      </center>
      <center>
        <div class="list-group" style="text-align:left; ">
          <a href="#" class="list-group-item"><i class="fa fa-info-circle fa-3x pull-left"></i>
            <h4 class="list-group-item-heading">Suporte</h4>
            <p class="list-group-item-text">Reportar algum erro ao suporte</p>
          </a>
        </div>
      </center>
    </div>
  </div><!-- /.container -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <form class="form-signin text-center well" name="alterasenha" method="post" id="alterasenha" action="Inside/first_login">
      <h3>NOVA SENHA</h3>
      <br>
      <input type="password" name="newpassword" class="form-control" placeholder="Nova senha" id="newpassword" required autofocus value="">
      <br/>
      <input type="password" name="newpasswordconf" class="form-control" placeholder="Nova senha (confirmação)" id="newpasswordconf" required value="">
      <br/>

      <div class="form-group"><button type="submit" class="btn btn-primary btn-lg btn-block ">Alterar</button></div>
      <?php

      if ($message==1) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Confirmação Inválida!</div>';
        echo '</div>';
      }
      if ($message==2) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Insira uma senha diferente!</div>';
        echo '</div>';
      }
      if ($message==3) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Contacte o ADM!</div>';
        echo '</div>';
      }
      if ($message==4) {
        echo '<div id="mensagem">';
        echo '<div class="alert alert-success">';
        echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
        echo '<i class="fa fa-exclamation-circle"></i> Alterada!</div>';
        echo '</div>';
      }
      ?>
    </form>
  </div>

  <div class="modal fade " id="myModal2" role="dialog">
    <div class="form-signin text-center well" id="mensagem">
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <i class="fa fa-exclamation-circle"></i> Senha Registrada!</div>
    </div>
  </div>


<?php
if ($x == 'y'){

    echo  '<script type="text/javascript">';
    echo  "window.onload = function(){";
    if ($message==4){
      echo  "$('#myModal2').modal();";
    }else{
      echo  "$('#myModal').modal();";
    }
    echo  "}";
    echo  "</script>";
}
?>
