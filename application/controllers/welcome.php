<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_database');
    }

    function index(){

        $data['title'] = 'SIMO - Bem Vindo';
        $data['activemenu'] = '1';
        $data['body'] = 'welcome';
        $this->load->view('outside',$data);
    }

    function signin(){

        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim');

        $this->load->model('login_database','usuarios');
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );

        if ($this->form_validation->run() == FALSE) {
            if($this->session->userdata['logged']){
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
}
?>
