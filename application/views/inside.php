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
  <link href="<?php echo base_url('assets/css/modelo-padrao.css') ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
  <script type="text/javascript">
  var base_url = '<? echo base_url() ?>';

  function resetOwnerSchedule(){
  document.getElementById("ownerSchedule").selectedIndex = 0;
  }

  function resetOccupierSchedule(){
  document.getElementById("occupierSchedule").selectedIndex = 0;
  }

  function getOwnerScheduleMembers(date,schedule){
    $.post(base_url+"schedule/getScheduleMembers", {date : date, schedule : schedule},function(data){$('#scheduledOwnerUsers').html(data);});
  }

  function getOccupierScheduleMembers(date,schedule){
    $.post(base_url+"schedule/getScheduleMembers", {date : date, schedule : schedule},function(data){$('#scheduledOccupierUsers').html(data);});
  }

  function generateViewByGroupsTable(year,month){
    $.post(base_url+"schedule/generateViewByGroupsTable", {year : year, month : month},function(data){$('#schedule').html(data);});
  }

  function generateViewByMembersTable(year,month){
    // alert(year + month);
    $.post(base_url+"schedule/generateViewByMembersTable", {year : year, month : month},function(data){$('#schedule').html(data);});
    $.post(base_url+"schedule/generateViewExchangeTable", {year : year, month : month},function(data){$('#schedule2').html(data);});
  }

  function addGroup(groupName){
    $.post(base_url+"schedule/addGroup", {groupName : groupName});
    getGroups();
  }

  function getGroups(){
    $.post(base_url+"schedule/getGroups",function(data){$('#groups').html(data);});
  }

  function deleteGroup(idGroup){
    $.post(base_url+"schedule/deleteGroup", {idGroup : idGroup});
    getGroups();
  }

  function getGroupMembers(idGroup){

    $.post(base_url+"schedule/getGroupMembers", {idGroup : idGroup},function(data){$('#members').html(data);});
    getUsers();
    }

  function removeMember(idUser,idGroup){
    $.post(base_url+"schedule/removeMember", {idUser : idUser});
    getGroupMembers(idGroup);


  }

  function getUsers(){
    $.post(base_url+"schedule/getUsers",function(data){$('#users').html(data);});
  }

  function addMember(idUser,idGroup){
    if (idGroup > 0){
      $.post(base_url+"schedule/addMember", {idUser : idUser, idGroup : idGroup});
      getGroupMembers(idGroup);
    }else{
      alert("Escolha uma equipe!");
    }

  }

  </script>
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

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top:0px;" aria-expanded="true">
                <i class="fa fa-user"></i><?php echo "  ". $sessionfullname;?> <b class="caret"></b>
            </a>

              <ul class="dropdown-menu">
                <?php if ($this->session->userdata['idPermission'] == 2) {?>
                <li >
                  <a href="<?php echo base_url('user_settings'); ?>">
                    <i class="fa fa fa-users fa-fw"></i> Usuários                 </a>
                </li>
                <?php } ?>

                <li >
                  <a href="<?php echo base_url('change_password'); ?>">
                    <i class="fa fa-unlock-alt fa-fw"></i> Alterar Senha                  </a>
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
    <br>
    <!-- Rodapé -->
    <div class="row"  style="margin-bottom:0; width:100%;">
      <center>
        <p style="font-size:8pt">&copy; 2016 - CICCR - Centro Integrado de Comando e Controle Regional - Departamento de Tecnologia</p>
      </center>
    </div> <!-- /.Rodapé -->

    <!-- Arquivos JavaScript  -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>


    <script>
      var base_url = "<?= base_url(); ?>";

      $(function(){
        $('.confirma_exclusao').on('click', function(e) {
            e.preventDefault();

            var fullname = $(this).data('fullname');
            var id = $(this).data('id');

            $('#modal_confirmation').data('fullname', fullname);
            $('#modal_confirmation').data('id', id);
            $('#modal_confirmation').modal('show');
        });

        $('#modal_confirmation').on('show.bs.modal', function () {
          var fullname = $(this).data('fullname');
          $('#fullname_exclusao').text(fullname);
        });

        $('#btn_excluir').click(function(){
          var id = $('#modal_confirmation').data('id');
          document.location.href = base_url + "settings/user_delete/"+id;
        });
      });

</script>

  </body>
  </html>
