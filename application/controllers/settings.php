<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('login_database');
		$this->load->model('settings_database');
		$this->load->library('session');
		$this->load->library('form_validation');

	}

	function user_settings(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}

		$data['title'] = 'SIMO - Configurações de Usuários';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '0';
		$data['body'] = 'settings/user_settings';
		$data['cadastros'] = $this->settings_database->get();
		$this->load->view('inside', $data);
	}

	function user_create(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}

		$this->form_validation->set_rules('fullname', 'fullname', 'trim');
  	$this->form_validation->set_rules("email", "email", "valid_email");
  	$this->form_validation->set_rules('username', 'username', 'trim');
  	$this->form_validation->set_rules('nickname', 'nickname', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'SIMO - Cadastrar Novo Usuário';
 		 	$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
 		 	$data['menu'] = '0';
 		 	$data['error'] = $this->input->get('error');
			$data['mode'] = 'Cadastrar Novo Usuário';
 		 	$data['body'] = 'settings/user_create';
			$data['idPermission'] = '0';
 		  $this->load->view('inside', $data);
		}else{
			$this->load->model('settings_database');

			$nickname = strtoupper($this->input->post('nickname'));
	    $data = array(
	      'fullname' => $this->input->post('fullname'),
	      'email' => $this->input->post('email'),
	      'username' => $this->input->post('username'),
	      'nickname' => $nickname,
	      'idPermission' => $this->input->post('userlevel'),
	      'password' => '202cb962ac59075b964b07152d234b70',
	      'registerDate' => date('Y-m-d H:i:s'),
	    );
			//email is a valid email?
	    $email = $this->settings_database->verifica_email($data);
	    if ($email == false) {
				redirect('user_create?error=4');
			}
	    //email already exist?
	    $email = $this->settings_database->check_exist_email($data);
	    //username already exist?
	    $username = $this->settings_database->check_exist_username($data);
	    //nickname already exist?
	    $nickname = $this->settings_database->check_exist_nickname($data);

			if ($email != false) {
				redirect('user_create?error=1');
			}
			if ($username != false){
				redirect('user_create?error=2');
			}
			if ($nickname != false){
				redirect('user_create?error=3');
			}
			//everything right then register
			$result = $this->settings_database->add_user($data);
	    if ($result != false) {
	        redirect('user_create?error=6');
	    }else {
	        redirect('user_create?error=5');
	  	}
		}
	}

	function change_password(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}

  	$this->form_validation->set_rules('currpassword', 'currpassword', 'trim');
		$this->form_validation->set_rules('newpassword', 'newpassword', 'trim');
		$this->form_validation->set_rules('newpasswordconf', 'newpasswordconf', 'trim');

    $curr = $this->input->post('currpassword');
		$new = $this->input->post('newpassword');
    $conf = $this->input->post('newpasswordconf');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'SIMO - Alterar Senha';
			$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
			$data['message'] = $this->input->get('message');
			$data['menu'] = '0';
			$data['body'] = 'settings/change_password';
			$this->load->view('inside',$data);
		}else{
			if ($new != $conf){
				redirect('settings/change_password?message=2');
			}
			if ($curr == $new){
				redirect('settings/change_password?message=4');
			}
			else{
				$this->load->model('settings_database');
		    $data = array(
	        'username' => $this->session->userdata['username'],
	        'currpassword' => $this->input->post('currpassword'),
	        'newpassword' => $this->input->post('newpassword'),
	        'newpasswordconf' => $this->input->post('newpasswordconf'),
	      );
				$result = $this->settings_database->change_password($data);
				if ($result != false) {
					redirect('settings/change_password?message=1');
				}else{
					redirect('settings/change_password?message=3');
				}
			}
		}
	}

	function user_edit($id = null){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}

		if ($id){
			$cadastros = $this->settings_database->get($id);
			if ($cadastros->num_rows() > 0 ) {
				$this->form_validation->set_rules('fullname', 'fullname', 'trim');
		  	$this->form_validation->set_rules("email", "email", "valid_email", array('valid_email' => 'Email inválido!.'));
		  	$this->form_validation->set_rules('username', 'username', 'trim');
		  	$this->form_validation->set_rules('nickname', 'nickname', 'trim');

				$data['title'] = 'SIMO - Editar Usuário';
				$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
				$data['menu'] = '0';
				$data['error'] = $this->input->get('error');
				$data['mode'] = 'Editar Usuário';
				$data['body'] = 'settings/user_edit';
				$data['idUser'] = $cadastros->row()->idUser;
				$data['fullname'] = $cadastros->row()->fullname;
				$data['username'] = $cadastros->row()->username;
				$data['email'] = $cadastros->row()->email;
				$data['nickname'] = $cadastros->row()->nickname;
				$data['idPermission'] = $cadastros->row()->idPermission;

				if ($this->form_validation->run() == FALSE) {

		 		  $this->load->view('inside', $data);
				}else{
					$this->load->model('settings_database');

					$nickname = strtoupper($this->input->post('nickname'));
			    $update = array(
			      'fullname' => $this->input->post('fullname'),
			      'email' => $this->input->post('email'),
			      'username' => $this->input->post('username'),
			      'nickname' => $nickname,
			      'idPermission' => $this->input->post('userlevel'),
			    );

					if ($data['email'] != $update['email']) {
						//email is a valid email?
				    $email = $this->settings_database->verifica_email($update);
				    if ($email == false) {
							redirect('settings/user_edit/'.$data['idUser'].'?error=4');
						}
				    //email already exist?
				    $email = $this->settings_database->check_exist_email($update);
						if ($email != false) {
							redirect('settings/user_edit/'.$data['idUser'].'?error=1');
						}
					}

					if ($data['username'] != $update['username']) {
						//username already exist?
			    	$username = $this->settings_database->check_exist_username($update);
						if ($username != false){
							redirect('settings/user_edit/'.$data['idUser'].'?error=2');
						}
					}

					if ($data['nickname'] != $update['nickname']) {
				    //nickname already exist?
				    $nickname = $this->settings_database->check_exist_nickname($update);
						if ($nickname != false){
							redirect('settings/user_edit/'.$data['idUser'].'?error=3');
						}
					}

					//everything right then update
					$result = $this->settings_database->update_user($data['idUser'],$update);
			    if ($result != false) {
							redirect('settings/user_edit/'.$data['idUser'].'?error=6');
			    }else {
			        $this->load->view('inside', $data);
			  	}
				}
			}else{
				echo 'Usuário não existente';
			}
		}
	}

	function user_delete($id = null) {

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}

		if ($this->settings_database->delete($id)) {

			redirect('user_settings');
		}
	}
}
