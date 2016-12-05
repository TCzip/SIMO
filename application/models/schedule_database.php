<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_database extends CI_Model {

  function selectNickname($idPermission){

    $result = $this->db
      ->select('nickname')
      ->where('idPermission', $idPermission)
      ->order_by('nickname', 'asc')
      ->get('users')
      ->result();
    return $result;
  }

  function newEntry($data){
    echo 'teste';
    die();

    $result = $this->db
      ->select('idUser')
      ->where('nickname', $data['nickname'])
      ->get('users')
      ->result();

    $newEntry = array(
      'idUser'     => $result[0]->idUser,
      'idCreator'  => $this->session->userdata['idUser'],
      'startDate'  => $data['startDate'],
      'endDate'  => $data['enddate'],
    );

    echo $newEntry;
    print_r ($newEntry);
    die();
    $result = $this->db
      ->select('nickname')
      ->where('idPermission', $idPermission)
      ->order_by('nickname', 'asc')
      ->get('users')
      ->result();
    return $result;
  }
}