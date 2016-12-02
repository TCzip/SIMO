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
			$this->session->userdata['logged'] = true;
			if(!$this->login_database->isLogged()){
				redirect('signin');
			}
	}

	function home(){

			$data['title'] = 'SIMO - Início';
			$data['fullname'] = $this->session->userdata['fullname'];
			$data['menu'] = '1';
			$data['x'] = $this->input->get('x');
			$data['message'] = $this->input->get('message');
			$data['body'] = 'home';
			$this->load->view('inside',$data);

	}

	function schedule(){
		$data['title'] = 'SIMO - Escalas';
		$data['fullname'] = $this->session->userdata['fullname'];
		$data['menu'] = '4';
		$data['idPermission'] = $this->session->userdata['idPermission'];
		$data['body'] = 'schedule/index';
		$this->load->view('inside', $data);
	}

	function settings(){

		$data['title'] = 'SIMO - Configurações';
		$data['fullname'] = $this->session->userdata['fullname'];
		$data['tab'] = $this->input->get('tab');
		$data['message'] = $this->input->get('message');
		$data['menu'] = '0';
		$data['error'] = $this->input->get('error');


  	$this->load->view('headerint', $data);
		$this->load->view('settings');
		$this->load->view('footer');
    }



	function set_password(){

    	$curr = $this->input->post('currpassword');
		$new = $this->input->post('newpassword');
    	$conf = $this->input->post('newpasswordconf');

    	if ($new != $conf){

			redirect('settings?tab=1&message=2');

		}
		if ($curr == $new){
			redirect('settings?tab=1&message=4');
		}
		else{
			//caso senhas são iguais confira senha atual no banco
			$this->load->model('settings_database');
	        $data = array(
	        'username' => $this->session->userdata['username'],
	        'currpassword' => $this->input->post('currpassword'),
	        'newpassword' => $this->input->post('newpassword'),
	        'newpasswordconf' => $this->input->post('newpasswordconf'),
	        );
			$result = $this->settings_database->change_password($data);
			if ($result != false) {
				redirect('settings?tab=1&message=1');
			}else{
				redirect('settings?tab=1&message=3');
			}

		}
	}

	function new_user(){

    	$this->form_validation->set_rules('fullname', 'fullname', 'trim');
    	$this->form_validation->set_rules("email", "email", "valid_email|is_unique[usuarios.email]");
    	$this->form_validation->set_rules('username', 'username', 'trim');
    	$this->form_validation->set_rules('nomedeguerra', 'nomedeguerra', 'trim');

		$this->load->model('settings_database');

		$nomedeguerra = strtoupper($this->input->post('nomedeguerra'));
		//$data_cadastro  = date('Y-m-d H:i:s');
		//echo $data_cadastro;
		//die();
        $data = array(
        'fullname' => $this->input->post('fullname'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'nomedeguerra' => $nomedeguerra,
        'idPermission' => $this->input->post('userlevel'),
        'password' => '202cb962ac59075b964b07152d234b70',
        'data_cadastro' => date('Y-m-d H:i:s'),
        );

        //email is valid?
        $email = $this->settings_database->verifica_email($data);
        if ($email == false) {
			redirect('settings?tab=2&error=4');
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
			redirect('settings?tab=2&error=2');
		}
		if ($nomedeguerra != false){
			redirect('settings?tab=2&error=3');
		}

		//everything right then register
		$result = $this->settings_database->add_user($data);

        if ($result != false) {
            redirect('settings?tab=2&error=6');
        }else {
            redirect('settings?tab=2&error=5');
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
