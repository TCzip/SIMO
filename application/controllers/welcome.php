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

        $this->load->view('headerext',$data);
        $this->load->view('welcome');
        $this->load->view('footer');
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
            if(isset($this->session->userdata['logged'])){
                redirect('home');
            }else{
                $data['title'] = 'SIMO - Entrar';
                $data['activemenu'] = '2';
                $data['error'] = '0';
                $this->load->view('headerext',$data);
                $this->load->view('signin');
                $this->load->view('footerext');
            }
        }else{
            $result = $this->login_database->authenticate($data);

            if ($result != false) {

                $result = $this->login_database->read_user_information($data['username']);
                //tratar erro
                $first_time_check = $this->login_database->first_time_check($data);
                if ($first_time_check != false) {
                    $last_login_update = $this->login_database->last_login_update($data);
                    //tratar erro
                    
                    redirect('home?x=y');
                }
                redirect('home');    
            }else{
                $data['title'] = 'SIMO - Entrar';
                $data['activemenu'] = '2';
                $data['error'] = '1';
                $this->load->view('headerext',$data);
                $this->load->view('signin');
                $this->load->view('footerext');
            }
        }
    }
}    
?>
