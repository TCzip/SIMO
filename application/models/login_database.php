<?php

Class Login_Database extends CI_Model {

    function authenticate($data) {

        $data['password'] = md5($data['password']);
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        }else{
            return false;
        }
    }

    function last_login_update($data){

        $data_ultimo_login = date('Y-m-d H:i:s');
        $this->db->set('data_ultimo_login', $data_ultimo_login);
        $this->db->where('username', $data['username']);
        $this->db->update('usuarios');
        if ($this->db->affected_rows() == 1) {
            return true;
        }else{
            return false;
        }
    }

    function first_time_check($data){

        $result = $this->db->select('data_ultimo_login')->from('usuarios')->where('username', $data['username'])->limit(1)->get()->row();

        $result = $result->data_ultimo_login;
        $result = str_replace("-", "", $result);
        $result = str_replace(":", "", $result);
        $result = str_replace(" ", "", $result);

        $first = '00000000000000';

        if ($result == $first){
            return true;
        }else{

            return false;
        }

     }

    function read_user_information($username) {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        $result = $query->result();
        if ($query->num_rows() == 1) {
            $session_data = array(
                'username'   => $result[0]->username,
                'fullname'   => $result[0]->fullname,
                'user_id'    => $result[0]->user_id,
                'user_level' => $result[0]->user_level,
                'logged'     => true
                );
            $this->load->library('session');
            $this->session->set_userdata($session_data);
            return true;
        } else {
            return false;
        }
    }

    function verifica_email($EMAIL){

        list($User, $Domain) = explode("@", $EMAIL);
        $result = @checkdnsrr($Domain, 'MX');

        return($result);
    }

    public function isLogged(){
      if($this->session->userdata['logged']){
        return true;
      }
      else{
        return false;
      };
    }


}
?>
