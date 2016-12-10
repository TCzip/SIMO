<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  function index()
  {

  }

  function create(){

    $data['title'] = 'SIMO - Criar Escala';
    $data['sessionfullname'] = $this->session->userdata['sessionfullname'];
    $data['menu'] = '4';
    $data['message'] = null;
    $data['body'] = 'schedule/create';
    $this->load->model('Schedule_database');

    $post = $this->input->post();
    $this->form_validation->set_rules('jobSelect', 'jobSelect', 'trim|required');
    $this->form_validation->set_rules('startDate', 'startDate', 'trim');//aqui não aceita required
    $this->form_validation->set_rules('endDate', 'endDate', 'trim');//aqui tbm não, isto não deixava o form validation funcionar.
    $this->form_validation->set_rules('nicknameSelection', 'nicknameSelection', 'trim|required');

    if ($this->form_validation->run() == FALSE){
      $data['nickname'] = $this->Schedule_database->selectNickname('1');
      $this->load->view('inside', $data);
    }else {
      $result = $this->Schedule_database->newEntry($post);
      $data['message'] = 'Cadastrado!';
      $this->load->view('inside', $data);
    }
  }

}
