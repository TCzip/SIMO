<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_Database extends CI_Model {

    function change_password($data) {

        $data['currpassword'] = md5($data['currpassword']);
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['currpassword'] . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();


        if ($query->num_rows() == 1) {
            $this->db->reset_query();
            $newpassword = md5($data['newpassword']);
            $password = array('password' => md5($data['newpassword']) );
            $this->db->set('password', $newpassword);
            $this->db->where('username', $data['username']);
            $this->db->update('usuarios');

            if ($this->db->affected_rows() == 1) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function check_exist_email($data){

        $condition = "email =" . "'" . $data['email'] . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        }else {
            return false;
        }
    }

        function check_exist_username($data){

        $condition = "username =" . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        }else {
            return false;
        }
    }

    function check_exist_nomedeguerra($data){

        $condition = "nomedeguerra =" . "'" . $data['nomedeguerra'] . "'";
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        }else {
            return false;
        }
    }

    function verifica_email($data){

        list($User, $Domain) = explode("@", $data['email']);
        $result = @checkdnsrr($Domain, 'MX');

        return($result);
    }

    function add_user($data){

        $this->db->insert('usuarios', $data);

        if ($this->db->affected_rows() == 1) {
                return true;
        }else{
            return false;
        }

    }
}
?>
