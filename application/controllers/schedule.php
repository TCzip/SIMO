<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Schedule_database');
  }

  function create(){

    $data['title'] = 'SIMO - Criar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['message'] = null;
    $data['body'] = 'schedule/schedule_create';

    // $post = $this->input->post(); //ver
    // $this->form_validation->set_rules('scheduleSelection', 'Group Selection','required|callback_check_default');
    // $this->form_validation->set_message('check_default', 'You need to select something other than the default');
    $this->form_validation->set_rules('groupSelection', 'groupSelection');
    $this->form_validation->set_rules('scheduleSelection', 'Schedule Selection');
    $this->form_validation->set_rules('startDate', 'startDate');//aqui não aceita required
    $this->form_validation->set_rules('endDate', 'endDate');//aqui tbm não, isto não deixava o form validation funcionar.
    $data['groups'] = $this->Schedule_database->getGroups();
    if ($this->form_validation->run() == FALSE){

      $this->load->view('inside', $data);
    }else {
      //verifiry if between start and end dates already have entries.
      $startDate =  $this->input->post('startDate');
      $endDate = $this->input->post('endDate');
      $oldentries = $this->Schedule_database->checkOldEntries($startDate,$endDate);
      if ($oldentries->num_rows()) {
        //se existem dados entre a data de insert então envia message
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

  function check_default($array){
    foreach($array as $element){
      if($element == '0'){
        return FALSE;
      }
    }
    return TRUE;
  }

  function newGroup(){
  $data['title'] = 'SIMO - Nova Equipe';
  $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
  $data['menu'] = '4';
  $data['body'] = 'schedule/schedule_newGroup';

  $this->load->view('inside', $data);
}

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
  $option .= '<td><a name="botao" id="botao" href="#" title="Remover" onclick="removeMember('.$line->idGroup.','.$line->groupName.')" class="btn btn-danger fa fa-times"> </a></td>';
  $option .= '</tr>';
  }
  echo $option;
}else
  echo 'NENHUMA EQUIPE CADASTRADA!';
}

  function viewByGroups(){


    $data['title'] = 'SIMO - Visualizar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['body'] = 'schedule/schedule_viewByGroups';
    $this->load->view('inside', $data);
    // $year = date("Y");


    // echo $year; die();
    // foreach ($result->result() as $entry) {
    //   $matriz[[$line][$day]] = $entry->groupName;
    // }
  }

  function generateViewByGroupsTable(){

    // $year = $this->input->post('year');
    // $month = $this->input->post('month');
    // $result = $this->Schedule_database->getGroupsEntries();//orderby date, idschedule
    echo 'MERDA';
    // print_r($result); die();
    // $firstRow = $result->first_row();
    // $startDate = $firstRow->scheduleDate;

  }

  function viewByMembers(){
    $this->Schedule_database->getMembersEntries();

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

  function getGroupMembers(){

    $users = $this->Schedule_database->getGroupMembers();
    if ($users->num_rows() > 0) {
      # code...

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
      echo 'EQUIPE VAZIA';
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

}
