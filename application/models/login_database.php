<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Database extends CI_Model {

  function authenticate($data) {

    $data['password'] = md5($data['password']);
    $condition = array('username' => $data['username'] , 'password' => $data['password'] );
    $this->db->where($condition);
    $query = $this->db->get('users');

      if ($query->num_rows() == 1) {
        $result = $query->result();
        $session_data = array(
            'username'        => $result[0]->username,
            'sessionfullname' => $result[0]->fullname,
            'idUser'          => $result[0]->idUser,
            'idPermission'    => $result[0]->idPermission,
            'logged'          => true
            );
        $this->load->library('session');
        $this->session->set_userdata($session_data);
        return true;
      }else{
        return false;
      }
    }

    function last_login_update($data){

        $lastLogin = date('Y-m-d H:i:s');
        $this->db->set('lastLogin', $lastLogin);
        $this->db->where('username', $data['username']);
        $this->db->update('users');
        if ($this->db->affected_rows() == 1) {
            return true;
        }else{
            return false;
        }
    }

    function first_time_check($data){

        $result = $this->db->select('lastLogin')->from('users')->where('username', $data['username'])->limit(1)->get()->row();

        $result = $result->lastLogin;
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
