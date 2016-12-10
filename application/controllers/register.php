<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('login_database');
		$this->load->model('settings_database');
		$this->load->library('session');
		$this->load->library('form_validation');
		// if(!$this->login_database->isLogged()){
		// 	redirect('signin');
		// }
	}

	function user_settings(){

		$data['title'] = 'SIMO - Configurações de Usuários';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '0';
		// $data['error'] = $this->input->get('error');
		$data['body'] = 'settings/user_settings';
		$data['cadastros'] = $this->settings_database->get();
		$this->load->view('inside', $data);
	}

	public function create(){

		$this->form_validation->set_rules('fullname', 'fullname', 'trim');
  	$this->form_validation->set_rules("email", "email", "valid_email");
  	$this->form_validation->set_rules('username', 'username', 'trim');
  	$this->form_validation->set_rules('nickname', 'nickname', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'SIMO - Caadastrar Novo Usuário';
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
				redirect('create?error=4');
			}
	    //email already exist?
	    $email = $this->settings_database->check_exist_email($data);
	    //username already exist?
	    $username = $this->settings_database->check_exist_username($data);
	    //nickname already exist?
	    $nickname = $this->settings_database->check_exist_nickname($data);

			if ($email != false) {
				redirect('create?error=1');
			}
			if ($username != false){
				redirect('create?error=2');
			}
			if ($nickname != false){
				redirect('create?error=3');
			}
			//everything right then register
			$result = $this->settings_database->add_user($data);
	    if ($result != false) {
	        redirect('create?error=6');
	    }else {
	        redirect('create?error=5');
	  	}
		}
	}

	function change_password(){

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
				redirect('register/change_password?message=2');
			}
			if ($curr == $new){
				redirect('register/change_password?message=4');
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
					redirect('register/change_password?message=1');
				}else{
					redirect('register/change_password?message=3');
				}
			}
		}
	}

	function edit($id = null){

		if ($id){
			$cadastros = $this->settings_database->get($id);
			if ($cadastros->num_rows() > 0 ) {
				$this->form_validation->set_rules('fullname', 'fullname', 'trim');
		  	$this->form_validation->set_rules("email", "email", "valid_email");
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
			    $porra = array(
			      'fullname' => $this->input->post('fullname'),
			      'email' => $this->input->post('email'),
			      'username' => $this->input->post('username'),
			      'nickname' => $nickname,
			      'idPermission' => $this->input->post('userlevel'),
			    );
					//email is a valid email?
			    $email = $this->settings_database->verifica_email($data);
			    if ($email == false) {
						// $this->load->view('inside', $data);
						redirect('register/edit?error=4');
					}
					//everything right then update
					$result = $this->settings_database->update_user($data['idUser'],$porra);
			    if ($result != false) {
			        // $this->load->view('inside', $data);
							redirect('register/edit/'.$data['idUser'].'?error=6');
			    }else {
			        $this->load->view('inside', $data);
			  	}
				}
			}else{
				echo 'deu bosta! fala com o fonseca';
			}
		}
	}

	function delete($id = null) {
		if ($this->settings_database->delete($id)) {

			redirect('user_settings');
		}
	}
}
