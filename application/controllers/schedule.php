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
    $data['menu'] = '0';
    $data['message'] = null;
    $data['body'] = 'schedule/schedule_create';

    $post = $this->input->post(); //ver
    // $this->form_validation->set_rules('scheduleSelection', 'Group Selection','required|callback_check_default');
    // $this->form_validation->set_message('check_default', 'You need to select something other than the default');
    $this->form_validation->set_rules('groupSelection', 'groupSelection', 'trim|required');
    $this->form_validation->set_rules('startDate', 'startDate', 'trim');//aqui não aceita required
    $this->form_validation->set_rules('endDate', 'endDate', 'trim');//aqui tbm não, isto não deixava o form validation funcionar.
    $this->form_validation->set_rules('scheduleSelection', 'Schedule Selection', 'trim|required');

    if ($this->form_validation->run() != FALSE){
      $data['groups'] = $this->Schedule_database->getGroups();
      $this->load->view('inside', $data);
    }else {
      //verifiry if between start and end dates already have entries.
      $startDate = $post = $this->input->post('startDate');
      $endDate = $post = $this->input->post('endDate');
      $oldentries = $this->Schedule_database->checkOldEntries();



      $groupMembers = $this->Schedule_database->getGroupMembers($this->input->post('groupSelection')); //select members to new entry
      foreach ($groupMembers->result() as $groupMember) { //for each member do the entry record
        $entrydata =
        $newentry = $this->Schedule_database->newEntry();
            }


      // $result = $this->Schedule_database->newEntry($post);
      $data['groups'] = $this->Schedule_database->getGroups();
      $data['message'] = TRUE;
      $this->load->view('inside', $data);
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


  function groups($table = null){
    $data['title'] = 'SIMO - Configurar Equipes';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '0';
    // $data['message'] = null;
    $data['body'] = 'schedule/schedule_groups';
    $this->load->model('settings_database');

    $groups = $this->Schedule_database->getGroups();

    $option = "<option value=''></option>";
    foreach($groups->result() as $line) {
    $option .= "<option value='$line->idGroup'>$line->groupName</option>";
    }

    $data['groups'] = $option;
    $data['table'] = $table;


    // $data['cadastros'] = $this->settings_database->get();
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
