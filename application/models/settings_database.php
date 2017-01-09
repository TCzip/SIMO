<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_Database extends CI_Model {

  function change_password($data) {

    $data['currpassword'] = md5($data['currpassword']);
    $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['currpassword'] . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      $this->db->reset_query();
      $newpassword = md5($data['newpassword']);
      $password = array('password' => md5($data['newpassword']) );
      $this->db->set('password', $newpassword);
      $this->db->where('username', $data['username']);
      $this->db->update('users');

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
    $this->db->from('users');
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
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return true;
    }else {
      return false;
    }
  }

  function check_exist_nickname($data){

    $condition = "nickname =" . "'" . $data['nickname'] . "'";
    $this->db->select('*');
    $this->db->from('users');
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

    $this->db->insert('users', $data);
    if ($this->db->affected_rows() == 1) {
      return true;
    }else{
      return false;
    }
  }

  function get($id = null){

    if ($id) {
      $this->db->where('idUser', $id);
    }
    $this->db->order_by("fullname", 'asc');
    return $this->db->get('users');
  }

  function update_user($id,$data){

    $this->db
      ->set('fullname', $data['fullname'])
      ->set('email', $data['email'])
      ->set('username', $data['username'])
      ->set('nickname', $data['nickname'])
      ->where('idUser',$id)
      ->update('users',$data);

    if ($this->db->affected_rows() == 1) {
     return true;
    }else{
     return false;
    }
  }

  function delete($id = null){
    if ($id) {
      return $this->db->where('idUser', $id)->delete('users');
    }
  }
}
?>
