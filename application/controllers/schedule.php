<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Schedule_database');
  }

  //    Separated by controller functions and javascript php functions
  function create(){

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
      $oldentries = $this->Schedule_database->checkOldEntries($startDate,$endDate);
      if ($oldentries->num_rows()) {
        //if entries between dates than set message
        $data['message'] = '1';
        $this->load->view('inside', $data);
      }else{
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
      }
    }
  }

  function viewByGroups(){

    $data['title'] = 'SIMO - Visualizar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_viewByGroups';
    $this->load->view('inside', $data);
  }

  function newGroup(){
    $data['title'] = 'SIMO - Nova Equipe';
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
    $data['title'] = 'SIMO - Configurar Equipes';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '0';
    $data['body'] = 'schedule/schedule_groups';
    $this->load->model('settings_database');
    $groups = $this->Schedule_database->getGroups();
    $option = "<option value='0'>Escolha a Equipe...</option>";
    foreach($groups->result() as $line){
      $option .= "<option value='$line->idGroup'>$line->groupName</option>";
    }
    $data['groups'] = $option;
    $this->load->view('inside', $data);
  }

  function exchange(){
    $data['title'] = 'SIMO - Trocas de Serviço';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_exchange';

    $this->load->view('inside', $data);
  }


  //php functions to return html via javascript

  function generateViewByGroupsTable(){

    $year = $this->input->post('year');
    $month = $this->input->post('month');
    $result = $this->Schedule_database->getGroupsEntries($year,$month);//orderby date, idschedule
    // print_r($result); die();
    $firstRow = $result->first_row();
    // $startDate = $firstRow->scheduleDate;

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
      $option .= '<td><a name="botao" id="botao" href="#" title="Remover" onclick="removeMember('.$line->idUser.','.$line->idGroup.')" class="btn btn-danger fa fa-times"> </a></td>';
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

      $users_option = "<option value=''></option>";

      foreach($users->result() as $line) {
      $users_option .= "<option value='$line->idUser'>$line->nickname</option>";
      }
      echo $users_option;
    }else{
      echo 'EQUIPE VAZIA';
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
    $result = $this->Schedule_database->getMembersEntries($year,$month);//orderby date, idschedule
    // print_r($result); die();
    $firstRow = $result->first_row();
    // $startDate = $firstRow->scheduleDate;

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
  //end of section for exchange page


  // function check_default($array){
  //   foreach($array as $element){
  //     if($element == '0'){
  //       return FALSE;
  //     }
  //   }
  //   return TRUE;
  // }
}
