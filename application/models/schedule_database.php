<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_database extends CI_Model {

  function selectProfessional(){

    return $this->db
      ->where('idPermission', '1')
      ->get('users')
      ->result();


    // 
    // $condition = array('idPermission' => '1');
    // $this->db->select('nickname');
    // $this->db->where($condition);
    // $query = $this->db->get('users');
    //
    //     foreach ($query->result() as $row){
    //     $results[] = array(
    //       'nickname' => $row->nickname
    //
    //     );
    //
    //   }
    //       return $results;

  }
}
