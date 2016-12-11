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

    $result = $this->db
      ->select('nickname')
      ->where('idPermission', $idPermission)
      ->order_by('nickname', 'asc')
      ->get('users')
      ->result();
    return $result;
  }

  function includeUser($id, $idGroup){
    ->set('idGroup', $idGroup)
    ->where('idUser', $id)
    ->update('users');
  }

  function removeUser($id){
    ->set('idGroup', null)
    ->where('idUser', $id)
    ->update('users');
  }
}
