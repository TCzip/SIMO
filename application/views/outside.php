<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
-->
  <title><?= $title ?></title>

  <!-- Favicon e App Icon-->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico') ?>">
  <link rel="icon" sizes="144x144" href="<?php echo base_url('assets/img/ciccr.png') ?>">

  <!-- CSS do Bootstrap -->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">

  <!-- CSS Bootstrap outro tema -->
  <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet">

  <!-- CSS Font-awesome (Ícones) -->
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

  <!-- Arquivos CSS específicos do controller -->

  <!-- CSS Bootstrap especifico login-->
  <link href="<?php echo base_url('assets/css/modelo-login.css') ?>" rel="stylesheet">



  <!-- Chrome Extention -->
  <!--<link type="text/css" rel="stylesheet" href="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/style.css">-->
  <!--<script type="text/javascript" charset="utf-8" src="chrome-    extension://cpngackimfmofbokmjmljamhdncknpmg/page_context.js"></script>-->
</head>
<body>
  <!-- Menu de navegação -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>" style="margin-top:-3px; height:16px;"><img src="<?php echo base_url('assets/img/ciccr.png') ?>" onerror="this.onerror=null; this.src=\'img/ciccr.png\'"></a>
      </div>

      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="<?php if ($activemenu == 1) echo 'active' ?>">
            <a href="<?php echo base_url(); ?>">
            <i class="fa fa-info"></i> Bem-vindo</a>
          </li>

          <li class="<?php if ($activemenu == 2) echo 'active' ?>">
            <a href="<?= base_url('signin'); ?>">
            <i class="fa fa-sign-in"></i> Entrar</a>
          </li>
        </ul> <!-- /.nav navbar-nav -->
      </div><!--/.nav-collapse -->
    </div><!--/.navbar-header -->
  </div><!--/.navbar -->
  <?php $this->load->view($body); ?>
  <!-- Rodapé -->
  <div style="margin-bottom:0;">
    <center>
      <p style="font-size:8pt">© 2016 - CICCR Centro Integrado de Comando e Controle Departamento de Tecnologia</p>
    </center>
  </div> <!-- /.Rodapé -->

  <!-- Arquivos JavaScript  -->
  <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>
</html>
