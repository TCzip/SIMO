<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inside extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('date');
		$this->load->model('login_database');
		$this->session->userdata['logged'] = true;//logged false é o certo, ativar depois dos testes
		if(!$this->login_database->isLogged()){
			redirect('signin');
		}
	}

	function home(){

		$data['title'] = 'SIMO - Início';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '1';
		$data['x'] = $this->input->get('x');
		$data['message'] = $this->input->get('message');
		$data['body'] = 'home';

		$this->load->view('inside',$data);
	}

	function schedule(){
		$data['title'] = 'SIMO - Escalas';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '4';
		$data['idPermission'] = $this->session->userdata['idPermission'];
		$data['body'] = 'schedule/index';

		$this->load->view('inside', $data);
	}

	function new_user(){

  	$this->form_validation->set_rules('sessionfullname', 'sessionfullname', 'trim');
  	$this->form_validation->set_rules("email", "email", "valid_email|is_unique[usuarios.email]");
  	$this->form_validation->set_rules('username', 'username', 'trim');
  	$this->form_validation->set_rules('nomedeguerra', 'nomedeguerra', 'trim');

		$this->load->model('settings_database');

		$nomedeguerra = strtoupper($this->input->post('nomedeguerra'));
    $data = array(
      'sessionfullname' => $this->input->post('sessionfullname'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'nomedeguerra' => $nomedeguerra,
      'idPermission' => $this->input->post('userlevel'),
      'password' => '202cb962ac59075b964b07152d234b70',
      'data_cadastro' => date('Y-m-d H:i:s'),
    );
		//email is a valid email?
    $email = $this->settings_database->verifica_email($data);
    if ($email == false) {
			redirect('create?error=4');
		}
    //email already exist?
    $email = $this->settings_database->check_exist_email($data);
    //username already exist?
    $username = $this->settings_database->check_exist_username($data);
    //nomedeguerra already exist?
    $nomedeguerra = $this->settings_database->check_exist_nomedeguerra($data);

		if ($email != false) {
			redirect('settings?tab=2&error=1');
		}
		if ($username != false){
			redirect('create&error=2');
		}
		if ($nomedeguerra != false){
			redirect('create&error=3');
		}
		//everything right then register
		$result = $this->settings_database->add_user($data);
    if ($result != false) {
        redirect('create&error=6');
    }else {
        redirect('create&error=5');
    }
	}

	function first_login(){

		$this->form_validation->set_rules('newpassword', 'newpassword', 'required');
		$this->form_validation->set_rules('newpasswordconf', 'newpasswordconf', 'required');
		$newpassword = $this->input->post('newpassword');
  	$conf = $this->input->post('newpasswordconf');

  	if ($newpassword != $conf){
			redirect('home?x=y&message=1');
		}
		if ($newpassword == 123){
			redirect('home?x=y&message=2');
		}
		$data['username'] = $this->session->userdata['username'];
		$data['currpassword'] = 123;
		$data['newpassword'] = $newpassword;

		$this->load->model('settings_database');

		$data['currpassword'] = 123;
		$result = $this->settings_database->change_password($data);

		if ($result != false) {
			redirect('home?x=y&message=4');
		}else{
			redirect('home?x=y&message=3');
		}
	}

	function signin(){

		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');

		$this->load->model('login_database');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged'])){
				redirect('home');
			}else{
				$data['title'] = 'SIMO - Entrar';
				$data['activemenu'] = '2';
				$data['error'] = '0';
				$data['body'] = 'signin';
				$this->load->view('outside',$data);
			}
		}else{
			$result = $this->login_database->authenticate($data);
			if ($result){
				$first_time_check = $this->login_database->first_time_check($data);
				if($first_time_check) {
					$last_login_update = $this->login_database->last_login_update($data);
					redirect('home?x=y');
				}else{
					redirect('home');
				}
			}else{
				$data['title'] = 'SIMO - Entrar';
				$data['activemenu'] = '2';
				$data['error'] = '1';
				$data['body'] = 'signin';
				$this->load->view('outside',$data);
			}
		}
	}

	function schedule_create(){

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

	function logout(){

		session_destroy();
		redirect('signin');
	}
}
?>
