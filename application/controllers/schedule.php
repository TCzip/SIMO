<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Schedule_database');
    $this->load->model('login_database');
  }

  //  Separated by controller functions and javascript php functions
  function create(){

    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Criar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['message'] = null;
    $data['body'] = 'schedule/schedule_create';

    $this->form_validation->set_rules('groupSelection', 'groupSelection');
    $this->form_validation->set_rules('scheduleSelection', 'Schedule Selection');
    $this->form_validation->set_rules('startDate', 'startDate');
    $this->form_validation->set_rules('endDate', 'endDate');
    $data['groups'] = $this->Schedule_database->getGroups();
    if ($this->form_validation->run() == FALSE){

      $this->load->view('inside', $data);
    }else {
      //verifiry if between start and end dates already have entries.
      $startDate =  $this->input->post('startDate');
      $endDate = $this->input->post('endDate');
// $oldentries = $this->Schedule_database->checkOldEntries($startDate,$endDate);
// if ($oldentries->num_rows()) {
//   //if entries between dates than set message
//   $data['message'] = '1';
//   $this->load->view('inside', $data);
// }else{
        $scheduleDate = $startDate;
        $idSchedule = $this->input->post('idSchedule');
        $groupEntry['idGroup'] = $this->input->post('groupSelection');
        //register entries for all group
        while ($scheduleDate <= $endDate) {
          switch ($idSchedule) {
            case 1:
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //new entry for second idchedule, same day
              $idSchedule = 4;
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //set next idSchedule
              $idSchedule = 5;
              $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
              break;
            case 2:
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //set next idSchedule
              $idSchedule = 1;
              $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
              break;
            case 3:
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //set next idSchedule
              $idSchedule = 2;
              $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
              break;
            case 5:
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //set next idSchedule
              $idSchedule = 6;
              $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
              break;
            case 6:
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //set next idSchedule
              $idSchedule = 7;
              $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
              break;
            case 7:
              $groupEntry['idSchedule'] = $idSchedule;
              $groupEntry['scheduleDate'] = $scheduleDate;
              $newGroupEntry = $this->Schedule_database->newGroupEntry($groupEntry);
              //set next idSchedule
              $idSchedule = 3;
              $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
              break;
          }
        }

        //for each member do the entry record
        $groupMembers = $this->Schedule_database->getGroupMembers($this->input->post('groupSelection')); //select members to new entry
        $entry['idManager'] = $this->session->userdata['idUser'];
        foreach ($groupMembers->result() as $groupMember) { //for each member do the entry record
          $entry['idUser'] = $groupMember->idUser;
          $scheduleDate = $startDate;
          $idSchedule = $this->input->post('idSchedule');
          while ($scheduleDate <= $endDate) {
            switch ($idSchedule) {
              case 1:
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //new entry for second idchedule, same day
                $idSchedule = 4;
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //set next idSchedule
                $idSchedule = 5;
                $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
                break;
              case 2:
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //set next idSchedule
                $idSchedule = 1;
                $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
                break;
              case 3:
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //set next idSchedule
                $idSchedule = 2;
                $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
                break;
              case 5:
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //set next idSchedule
                $idSchedule = 6;
                $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
                break;
              case 6:
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //set next idSchedule
                $idSchedule = 7;
                $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
                break;
              case 7:
                $entry['idSchedule'] = $idSchedule;
                $entry['scheduleDate'] = $scheduleDate;
                $newEntry = $this->Schedule_database->newEntry($entry);
                //set next idSchedule
                $idSchedule = 3;
                $scheduleDate = date('Y-m-d', strtotime($scheduleDate . " + 1 day"));
                break;
            }
          }
        }
        $data['message'] = '2';
        $this->load->view('inside', $data);
// }
    }
  }

  function viewByGroups(){

    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Visualizar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_viewByGroups';
    $this->load->view('inside', $data);
  }

  function viewByMembers(){

    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Visualizar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_viewByMembers';
    $this->load->view('inside', $data);
  }

  function newGroup(){
    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Gerenciar equipes';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_newGroup';

    $this->form_validation->set_rules('group', 'Group', 'required|is_unique[groups.groupName]');
    $this->form_validation->set_message('is_unique', 'Equipe já existe!');

    if ($this->form_validation->run() == FALSE){
      $this->load->view('inside', $data);
    }else{
      $groupName = strtoupper($this->input->post('group'));

      $result = $this->Schedule_database->addGroup($groupName);
      $this->load->view('inside', $data);
    }
  }

  function groups(){
    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Configurar Equipes';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_groups';
    $this->load->model('settings_database');
    $groups = $this->Schedule_database->getGroups();
    $option = "";
    foreach($groups->result() as $line){
      $option .= "<option value='$line->idGroup'>$line->groupName</option>";
    }
    $data['groups'] = $option;
    $this->load->view('inside', $data);
  }

  function exchange(){
    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Trocas de Serviço';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['message'] = '';
    $data['body'] = 'schedule/schedule_exchange';

    $this->form_validation->set_rules('scheduledOwnerUsers', 'scheduledOwnerUsers', 'required');
    $this->form_validation->set_rules('scheduledOccupierUsers', 'scheduledOccupierUsers', 'required');
    $this->form_validation->set_message('required', 'Selecione um Membros para a troca!');


    if ($this->form_validation->run() == FALSE){
      $this->load->view('inside', $data);
    }else{
      $today = date("Y-m-d");
      $limitdate = date('Y-m-d', strtotime($today . " + 6 day"));
      if ($this->session->userdata['idPermission'] == 1){
        if ($this->input->post('ownerDate') < $today && $this->input->post('occupierDate') < $today){
          $data['message'] = 'Data menor que data atual!';
          $this->load->view('inside', $data);
        }
        if ($this->input->post('ownerDate') <= $limitdate || $this->input->post('occupierDate') <= $limitdate){
          $data['message'] = 'Troca nço permitida! Entre em contato com um administrador para efetuar a troca!';
          $this->load->view('inside', $data);
        }else{
          // if there is no more than 2 schedules in sequence update exchangentries table and generates an exchange record
          //check if owner id is the same as manager
          if ($this->input->post('scheduledOwnerUsers') != $this->session->userdata['idUser']  ){
            $data['message'] = 'Você deve estar na primeira escala selecionada!';
            $this->load->view('inside', $data);
          }

            $exchanges = array(
              'idOwner' => $this->input->post('scheduledOwnerUsers'),
              'idManager' => $this->session->userdata['idUser'],
              'idOccupier' => $this->input->post('scheduledOccupierUsers'),
              'idScheduleOwner' => $this->input->post('ownerSchedule'),
              'idScheduleOccupier' => $this->input->post('occupierSchedule'),
              'scheduleDateOwner' => $this->input->post('ownerDate'),
              'scheduleDateOccupier' => $this->input->post('occupierDate')
            );

          //check if there is not two schedules in sequence
          $result = $this->checkSchedules($exchanges);

          if ($result) {
            $data['message'] = 'Um dos usuários ultrapassou o limite de escalas!';
            $this->load->view('inside', $data);
          }

          $exchange = $this->Schedule_database->newExchange($exchanges);
          $data['message'] = 'Troca efetuada com sucesso!';
          $this->load->view('inside', $data);
        }
      }else{//if adm just change
        //set and update exchangentries table and generates an exchange record
        $exchanges = array(
          'idOwner' => $this->input->post('scheduledOwnerUsers'),
          'idManager' => $this->session->userdata['idUser'],
          'idOccupier' => $this->input->post('scheduledOccupierUsers'),
          'idScheduleOwner' => $this->input->post('ownerSchedule'),
          'idScheduleOccupier' => $this->input->post('occupierSchedule'),
          'scheduleDateOwner' => $this->input->post('ownerDate'),
          'scheduleDateOccupier' => $this->input->post('occupierDate')
        );
        $exchange = $this->Schedule_database->newExchange($exchanges);
        $data['message'] = 'Troca efetuada com sucesso!';
        $this->load->view('inside', $data);
      }
    }
  }

  function exchangeAdjustment(){
    if(!$this->login_database->isLogged()){
      redirect('signin');
    }

    $data['title'] = 'SIMO - Alteração de Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['message'] = '';
    $data['body'] = 'schedule/schedule_exchangeAdjustment';

    $users = $this->Schedule_database->getAllUsers();
    if ($users->num_rows() > 0) {

      $users_option = "<option value='0' disabled selected>Adicionar...</option>";

      foreach($users->result() as $line) {
      $users_option .= "<option value='$line->idUser'>$line->nickname</option>";
      }
      $data['users'] = $users_option;
    }

    $this->form_validation->set_rules('scheduledOwnerUsers', 'scheduledOwnerUsers', 'required');
    $this->form_validation->set_rules('users', 'users', 'required');
    $this->form_validation->set_message('required', 'Selecione um Membro para a troca!');


    if ($this->form_validation->run() == FALSE){
      $this->load->view('inside', $data);
    }else{

      $exchangesAdjustment = array(
        'idOwner' => $this->input->post('scheduledOwnerUsers'),
        'idManager' => $this->session->userdata['idUser'],
        'idOccupier' => $this->input->post('users'),
        'idScheduleOwner' => $this->input->post('ownerSchedule'),
        'idScheduleOccupier' => '0',
        'scheduleDateOwner' => $this->input->post('ownerDate'),
        'scheduleDateOccupier' => '0000-00-00'
      );

      $exchange = $this->Schedule_database->newExchange($exchangesAdjustment);
      $data['message'] = 'Troca efetuada com sucesso!';
      $this->load->view('inside', $data);
    }
  }

  function checkSchedules($exchanges){

    $check = array(
      array(
        'idUser' => $exchanges['idOccupier'],
        'idSchedule' => $exchanges['idScheduleOwner'],
        'scheduledate' => $exchanges['scheduleDateOwner']
      ),
      array(
        'idUser' => $exchanges['idOwner'],
        'idSchedule' => $exchanges['idScheduleOccupier'],
        'scheduledate' => $exchanges['scheduleDateOccupier']
      )
    );

    $validation = FALSE;

    foreach ($check as $data) {
      $idUser = $data['idUser'];
      $idSchedule = $data['idSchedule'];
      $scheduledate = $data['scheduledate'];

      $counter = 0;
      //back
      if ($idSchedule == 1) {
        $idSchedule = 4;
        $scheduledate = date('Y-m-d', strtotime($scheduledate . " - 1 day"));
        $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
        if ($result->num_rows() > 0) {
          $counter = $counter + 1;
        }
      }else {
        $idSchedule = $idSchedule - 1;
        $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
        if ($result->num_rows() > 0) {
          $counter = $counter + 1;
        }
      }

      if ($counter > 1) {
        if ($idSchedule == 1) {
          $idSchedule = 4;
          $scheduledate = date('Y-m-d', strtotime($scheduledate . " - 1 day"));
          $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
          if ($result->num_rows() > 0) {
            $counter = $counter + 1;
          }
        }else {
          $idSchedule = $idSchedule - 1;
          $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
          if ($result->num_rows() > 0) {
            $counter = $counter + 1;
          }
        }
      }

      //forward
      if ($idSchedule == 4) {
        $idSchedule = 1;
        $scheduledate = date('Y-m-d', strtotime($scheduledate . " + 1 day"));
        $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
        if ($result->num_rows() > 0) {
          $counter = $counter + 1;
        }
      }else {
        $idSchedule = $idSchedule + 1;
        $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
        if ($result->num_rows() > 0) {
          $counter = $counter + 1;
        }
      }

      if ($counter > 1) {
        if ($idSchedule == 4) {
          $idSchedule = 1;
          $scheduledate = date('Y-m-d', strtotime($scheduledate . " + 1 day"));
          $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
          if ($result->num_rows() > 0) {
            $counter = $counter + 1;
          }
        }else {
          $idSchedule = $idSchedule + 1;
          $result = $this->Schedule_database->checkSchedules($idUser,$idSchedule,$scheduledate);
          if ($result->num_rows() > 0) {
            $counter = $counter + 1;
          }
        }
      }
      if ($counter > 1) {
        $validation = TRUE;
      }
    }
    return $validation;
  }


  //php functions to return html via javascript

  function generateViewByGroupsTable(){

    $year = $this->input->post('year');
    $month = $this->input->post('month');
    $result = $this->Schedule_database->getGroupsEntries($year,$month);//orderby date, idschedule

    if ($month > 0) {
      $monthdays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

      $line =1;
      while ($line != 8) {
        for ($i=1; $i < $monthdays; $i++) {
          $internalMatriz[$i][$line] = '';
        }
      $line++;
      }

      if ($result->num_rows() > 0) {
        //fill matriz[31x7] with records -> month and year
        foreach ($result->result() as $row){
          // get day into date from table
          $day = date_format(date_create($row->scheduleDate), 'd');

          $internalMatriz[intval($day)][$row->idSchedule] = $row->groupName;
        }
        //write table header
        $table ='<table border="1" class="table table-bordered table-striped table-highlight"><tr width="40" >';
        $table .= '<th style="text-align:center; " width="40">'.'ESCALA'.'</th>';
        for ($i=1; $i < $monthdays + 1; $i++) {
        $table .= '<th  style="text-align:center; " width="40" >'.$i.'</th>';
        }
        //starts body
    		$table .= '<tbody>';
    		//set first line and starts it
    		$line = 1;
    		$table .= '<tr height="40">';

    		//first collumn
    		while ( $line != 8) {
    			switch ($line) {
    				case 1:
    				$table .= '<td style="text-align:center; ">'."07:00 - 13:00".'</td>';
    				break;
    				case 2:
    				$table .= '<td style="text-align:center; ">'."13:00 - 18:00".'</td>';
    				break;
    				case 3:
    				$table .= '<td style="text-align:center; ">'."18:00 - 23:00".'</td>';
    				break;
    				case 4:
    				$table .= '<td style="text-align:center; ">'."23:00 - 07:00".'</td>';
    				break;
            case 5:
            $table .= '<td style="text-align:center; ">'."FOLGA".'</td>';
            break;
            case 6:
            $table .= '<td style="text-align:center; ">'."DESCANSO".'</td>';
            break;
            case 7:
            $table .= '<td style="text-align:center; ">'."SOBREAVISO".'</td>';
            break;
    			}

          //using internal matriz, fill all days and schedules
    			for ($i=1; $i < $monthdays; $i++) {

    				$table .= '<td style="text-align:center; padding-bottom:3px; font-size:20px;" name="11" >'
            . $internalMatriz[$i][$line] .'</td>';
    			}
    			$line++;
    			$table .='<th>'.'<tr height="40">';
    		}
    		//closing table
    		$table .= '</tbody></table>';
        $table .= '<br>';

        //write groups table
        $table .='<table border="1" class="table table-bordered table-striped table-highlight"><tr width="40" >';
        $table .= '<th style="text-align:center; " width="40">'.'EQUIPE'.'</th>';
        $table .= '<th style="text-align:center; " width="40">'.'MEMBROS DA EQUIPE'.'</th>';

        //starts body
        $table .= '<tbody>';

        $groups = $this->Schedule_database->getGroups();
        foreach ($groups->result() as $group) {
          $table .= '<td style="text-align:center; ">'.$group->groupName.'</td>';
          $members = $this->Schedule_database->getGroupMembers($group->idGroup);
          if ($members->num_rows() > 0){
            // echo $group->groupName;
            // echo $members->num_rows(); die();
            $table .= '<td style="text-align:center; ">';
            foreach ($members->result() as $member) {
              $table .= $member->nickname.';';
            }
            $table .= '</td>';
            $table .= '</tr>';
          }else{
            $table .= '<td style="text-align:center; "> EQUIPE VAZIA </td>';
            $table .= '</tr>';
          }
        }
        $table .= '<tr height="40">';
        $table .= '</tbody></table>';
    		echo $table;//generating table to return via javascript
      }else{
        echo '<label style="text-align:center; "> NENHUMA EQUIPE CADASTRADA PARA ESTA DATA!</lable>';
      }
    }
  }

  //section for group page
  function getGroups(){
    $groups = $this->Schedule_database->getGroups();
    if ($groups->num_rows() > 0) {

    $option = '<table class="table table-striped">
            <thead>
              <tr>
                <th>Nome do Grupo</th>
                <th>Ações</th>
              </tr>
            </thead>
          <tbody>';

    foreach($groups->result() as $line) {
    $option .= '<tr>';
    $option .= '<td>'.$line->groupName.'</td>';
    $option .= '<td><a name="botao" id="botao" title="Remover"
     onclick="deleteGroup('.$line->idGroup.')" class="btn btn-danger fa fa-times"></a></td>';
    $option .= '</tr>';
    }
    echo $option;
  }else
    echo 'NENHUMA EQUIPE CADASTRADA!';
  }

  function deleteGroup(){
    $idGroup = $this->input->post('idGroup');
    $groupMembers = $this->Schedule_database->getGroupMembers($idGroup);
    foreach ($groupMembers->result() as $groupMember) {
      $idUser = $groupMember->idUser;
      $this->Schedule_database->removeMember($idUser);
    }
    $result = $this->Schedule_database->deleteGroup($idGroup);
  }
  //end of section for group page
  // section for add members page
  function getGroupMembers(){

    $users = $this->Schedule_database->getGroupMembers();
    if ($users->num_rows() > 0) {

      $option = '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome de Guerra</th>
                  <th>Ações</th>
                </tr>
              </thead>
            <tbody>';

      foreach($users->result() as $line) {
      $option .= '<tr>';
      $option .= '<td>'.$line->nickname.'</td>';
      $option .= '<td><a name="botao" id="botao" href="#" title="Remover" onclick="removeMember('.
      $line->idUser.','.$line->idGroup.')" class="btn btn-danger fa fa-times"> </a></td>';
      $option .= '</tr>';
      }
      echo $option;
    }else{
      $option = '<table class="table table-striped">
              <thead>
                <tr>
                  <th>EQUIPE VAZIA</th>
                </tr>
              </thead>';
      echo $option;
    }
  }

  function getUsers(){

    $users = $this->Schedule_database->getUsers();
    if ($users->num_rows() > 0) {

      $users_option = "<option value='0' disabled selected>Adicionar Integrante...</option>";

      foreach($users->result() as $line) {
      $users_option .= "<option value='$line->idUser'>$line->nickname</option>";
      }
      echo $users_option;
    }else{
      $users_option = "<option value='0' disabled selected>Todos Cadastrados</option>";
      echo $users_option;
    }
  }

  function addMember() {
    $this->Schedule_database->addMember();
  }

  function removeMember() {
    $this->Schedule_database->removeMember();
  }
  //end of section for add members page
  //section for exchange page
  function generateViewByMembersTable(){

    $year = $this->input->post('year');
    $month = $this->input->post('month');
    if ($month > 0) {
      //generates first table for manager original entries
      $result = $this->Schedule_database->getMembersEntries($year,$month);//orderby date, idschedule

      $monthdays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
      $line =1;
      while ($line != 5) {
        for ($i=1; $i < $monthdays + 1; $i++) {
          $internalMatriz[$i][$line] = '';
        }
      $line++;
      }

      $line =1;
      while ($line != 5) {
        for ($i=1; $i < $monthdays + 1; $i++) {
          $hint[$i][$line] = '';
        }
      $line++;
      }

      if ($result->num_rows() > 0) {
        //fill matriz[31x7] with records -> month and year
        foreach ($result->result() as $row){
          // get day into date from table
          $day = date_format(date_create($row->scheduleDate), 'd');

          $nickname = substr($row->nickname, 0, 2);
          if ($row->idSchedule < 5) {
            if ($internalMatriz[intval($day)][$row->idSchedule] != "") {
              // echo intval($day); echo $row->idSchedule; die();

              $internalMatriz[intval($day)][$row->idSchedule] = $internalMatriz[intval($day)][$row->idSchedule].'<br>'.$nickname;
    				  $hint[intval($day)][$row->idSchedule] = $hint[intval($day)][$row->idSchedule].';'.$row->nickname;
            }else{
              $internalMatriz[intval($day)][$row->idSchedule] = $nickname;
              $hint[intval($day)][$row->idSchedule] = $row->nickname;
            }
          }
        }
        //write table header
        $table ='<table border="1" class="table table-bordered table-striped table-highlight"><tr width="30" >';
        $table .= '<th style="text-align:center; font-size:12px" width="30">ESCALA</th>';
        for ($i=1; $i < $monthdays + 1; $i++) {
        $table .= '<th  style="text-align:center; " width="30" >'.$i.'</th>';
        }
        //starts body
        $table .= '<tbody>';
        //set first line and starts it
        $line = 1;
        $table .= '<tr weight="10">';

        //first collumn
        while ( $line != 5) {
          switch ($line) {
            case 1:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px">'."07:00<br>13:00".'</td>';
            break;
            case 2:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px">'."13:00<br>18:00".'</td>';
            break;
            case 3:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px">'."18:00<br>23:00".'</td>';
            break;
            case 4:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px">'."23:00<br>07:00".'</td>';
            break;
          }

          //using internal matriz, fill all days and schedules
          for ($i=1; $i < $monthdays; $i++) {

            $table .= '<td style="text-align:center; padding-bottom:3px; font-size:12px;" title="'.$hint[$i][$line].'" >'
            . $internalMatriz[$i][$line] .'</td>';
          }
          $line++;
          $table .='<th>'.'<tr height="40">';
        }
        //closing table
        $table .= '</tbody></table>';
        $table .= '<br>';

        echo $table;//generating table to return via javascript
      }else{
        echo '<label style="text-align:center; "> NENHUMA EQUIPE CADASTRADA PARA ESTA DATA!</lable>';
      }
    }
  }

  function generateViewExchangeTable(){

    $year = $this->input->post('year');
    $month = $this->input->post('month');
    if ($month > 0) {
      //generates first table for manager original entries
      $result = $this->Schedule_database->getExchangeEntries($year,$month);//orderby date, idschedule

      $monthdays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
      $line = 1;
      while ($line != 5) {
        for ($i=1; $i <= $monthdays; $i++) {
          $internalMatriz[$i][$line] = '';
        }
      $line++;
      }

      $line = 1;
      while ($line != 5) {
        for ($i=1; $i <= $monthdays; $i++) {
          $hint[$i][$line] = '';
        }
      $line++;
      }

      if ($result->num_rows() > 0) {
        //fill matriz[31x7] with records -> month and year
        foreach ($result->result() as $row){
          // get day into date from table
          $day = date_format(date_create($row->scheduleDate), 'd');

          $nickname = substr($row->nickname, 0, 2);
          if ($row->idSchedule < 5) {
            if ($internalMatriz[intval($day)][$row->idSchedule] != "") {
              // echo intval($day); echo $row->idSchedule; die();

              $internalMatriz[intval($day)][$row->idSchedule] = $internalMatriz[intval($day)][$row->idSchedule].'<br>'.$nickname;
              $hint[intval($day)][$row->idSchedule] = $hint[intval($day)][$row->idSchedule].';'.$row->nickname;
            }else{
              $internalMatriz[intval($day)][$row->idSchedule] = $nickname;
              $hint[intval($day)][$row->idSchedule] = $row->nickname;
            }
          }
        }
        //write table header
        $table ='<table border="1" class="table table-bordered table-striped table-highlight"><tr width="40" >';
        $table .= '<th style="text-align:center;font-size:12px; " width="30">ESCALA</th>';
        for ($i=1; $i <= $monthdays; $i++) {
        $table .= '<th  style="text-align:center; text-size:12px; " width="30" >'.$i.'</th>';
        }
        //starts body
        $table .= '<tbody>';
        //set first line and starts it
        $line = 1;
        $table .= '<tr height="30">';

        //first collumn
        while ( $line != 5) {
          switch ($line) {
            case 1:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px ">'."07:00<br>13:00".'</td>';
            break;
            case 2:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px ">'."13:00<br>18:00".'</td>';
            break;
            case 3:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px ">'."18:00<br>23:00".'</td>';
            break;
            case 4:
            $table .= '<td style="text-align:center;font-weight:bold; font-size:12px ">'."23:00<br>07:00".'</td>';
            break;
          }

          //using internal matriz, fill all days and schedules
          for ($i=1; $i <= $monthdays; $i++) {

            $table .= '<td style="text-align:center; padding-bottom:3px; font-size:12px;" title="'.$hint[$i][$line].'" >'
            . $internalMatriz[$i][$line] .'</td>';
          }
          $line++;
          $table .='<tr height="40">';
        }
        //closing table
        $table .= '</tbody></table>';
        $table .= '<br>';

        echo $table;//generating table to return via javascript
      }
    }
  }

  function getScheduleMembers(){

    $members = $this->Schedule_database->getScheduleMembers();
    if ($members->num_rows() > 0) {

      $members_option = "<option value='0'>Selecione o Membro...</option>";

      foreach($members->result() as $member) {
      $members_option .= "<option value='$member->idUser'>$member->nickname</option>";
      }
      echo $members_option;
    }else{
      $members_option = "<option value='0'>Escala sem membros.</option>";
      echo $members_option;
    }
  }


  //end of section for exchange page
}
