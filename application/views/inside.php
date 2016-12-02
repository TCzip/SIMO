<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
-->
  <title><?php echo $title ?></title>

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
            <li class="<?php if ($menu == 1){echo'active';};  ?>">
              <a href="<?php echo base_url('home'); ?>">
                <i class="fa fa-home"></i> Início              </a>
            </li>

            <li class="<?php if ($menu == 2){echo'active';};  ?>">
              <a href="#">
                <i class="fa fa-phone"></i> Atendimento              </a>
            </li>

            <li class="<?php if ($menu == 3){echo'active';};  ?>">
              <a href="#">
                <i class="fa fa-desktop"></i> Monitoramento              </a>
            </li>

            <li class="<?php if ($menu == 4){echo'active';};  ?>">
              <a href="<?php echo base_url('schedule'); ?>">
                <i class="fa fa-calendar-o"></i> Escalas              </a>
            </li>
          </ul>


          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top:0px;">
                <!-- <img src="" style="height:18px;width:18px;margin-top:-2px;" class="img-circle"> -->
                <i class="fa fa-user"></i><?php echo "  ". $fullname;?> <b class="caret"></b>
            </a>

              <ul class="dropdown-menu">
                <li >
                  <a href="<?php echo base_url('settings?tab=1&error=0'); ?>">
                    <i class="fa fa-edit fa-fw"></i> Perfil                  </a>
                </li>

                <li >
                  <a href="<?php echo base_url('logout'); ?>">
                    <i class="fa fa-power-off fa-fw"></i> Sair                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.navbar-header -->
    </div><!--/.navbar -->
    <?php $this->load->view($body); ?>
    <!-- Rodapé -->
    <div style="margin-bottom:0;">
      <center>
        <p style="font-size:8pt">&copy; 2016 - CICCR - Centro Integrado de Comando e Controle Regional - Departamento de Tecnologia</p>
      </center>
    </div> <!-- /.Rodapé -->

    <!-- Arquivos JavaScript  -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

  </body>
  </html>
