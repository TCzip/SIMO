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

	}

	function home(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}
		$data['title'] = 'SIMO - Início';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '1';
		$data['x'] = $this->input->get('x');
		$data['message'] = $this->input->get('message');
		$data['body'] = 'home';

		$this->load->view('inside',$data);
	}

	function schedule(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}
		$data['title'] = 'SIMO - Escalas';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '4';
		$data['idPermission'] = $this->session->userdata['idPermission'];
		$data['body'] = 'schedule/schedule_menu';

		$this->load->view('inside', $data);
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

	function logout(){

		session_destroy();
		redirect('signin');
	}
}
?>
