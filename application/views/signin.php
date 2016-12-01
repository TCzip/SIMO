<!--<?php  
//session_start();

//include "functions.php";
//include "config.php";



//if(isset($_SESSION['id_user'])){

  //header ("Location:inicio.php");

  //exit(); 
//}

//$message = $_GET['message'];
//$month = $_GET['month'];
//$year = $_GET['year'];

?>-->
<div class="container"><!-- Conteúdo -->
  <?php if(!$this->session->userdata("usuario_logado")) ; ?>
    <h2 style="text-align:center">CICCR</h2>
      <?php
        $atrib = array('style'=>'text-align:center','class'=>'form-signin');
        echo form_open('',$atrib);

        echo form_input(array(
          'name' => 'username',
          'id' => 'username',
          'class' => 'form-control',
          'placeholder'=>'Usuário',
          'required' => 'required',
          'autofocus' => 'autofocus',
          'naxlenth' => '50'
        ));
        echo form_input(array(
          'name' => 'password',
          'id' => 'password',
          'type'=>'password',
          'class' => 'form-control',
          'required' => 'required',
          'placeholder'=>'Senha',
          'naxlenth' => '50'
        )); 
        //echo '<br>';
        echo form_submit(array(
          'class' => 'btn btn-lg btn-primary btn-block',
          'value' => 'LOGIN',
        ));
        echo '<br>';
        echo anchor('', 'Esqueceu sua senha?',  array(
          'onClick' => "javascript:window.open('gerar_nova_senha.php', 'popup');return false"
        )); 

        if ($error == 1) {
          echo '<br>';
          echo '<br>';
          echo '<div id="mensagem">';
          echo '<div class="alert alert-danger">';
          echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">×</a>';
          echo '<i class="fa fa-exclamation-circle"></i> Login ou Senha Inválidos   </div>';
          echo '</div>';
        }
        
        echo form_close();
      
   

      ?>
  
</div>









