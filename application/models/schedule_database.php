<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_database extends CI_Model {

  // function selectNickname($idPermission){
  //
  //   $result = $this->db
  //     ->select('nickname')
  //     ->where('idPermission', $idPermission)
  //     ->order_by('nickname', 'asc')
  //     ->get('users')
  //     ->result();
  //   return $result;
  // }

  // function newEntry($data){
  //
  //   // $result = $this->db
  //   //   ->select('idUser')
  //   //   ->where('nickname', $data['groupSelection'])
  //   //   ->get('users')
  //   //   ->result();
  //
  //   // $newEntry = array(
  //   //   'idUser'     => $result[0]->idUser,
  //   //   'idCreator'  => $this->session->userdata['idUser'],
  //   //   'startDate'  => $data['startDate'],
  //   //   'endDate'  => $data['endDate'],
  //   // );
  //   //
  //   // $result = $this->db
  //   //   ->select('nickname')
  //   //   ->where('idPermission', $idPermission)
  //   //   ->order_by('nickname', 'asc')
  //   //   ->get('users')
  //   //   ->result();
  //   // return $result;
  // }

  function getGroups() {
    $this->db->order_by("groupName", "asc");
    $result = $this->db->get("groups");
    return $result;
  }

  function getGroupMembers() {

    $idGroup = $this->input->post("idGroup");
    $result = $this->db
      ->where("idGroup", $idGroup)
      ->order_by("username", "asc")
      ->get("users");
      return $result;
  }

  function getUsers() {

    $result = $this->db
      ->where("idGroup", null)
      ->order_by("nickname", "asc")
      ->get("users");
      return $result;
  }

  function addMember(){
    $idUser = $this->input->post("idUser");
    $idGroup = $this->input->post("idGroup");
    $result = $this->db
      ->set("idGroup", $idGroup)
      ->where("idUser", $idUser)
      ->update("users");
    return $result;
  }

  function removeMember(){
    $idUser = $this->input->post("idUser");
    $result = $this->db
      ->set("idGroup", null)
      ->where("idUser", $idUser)
      ->update("users");
    return $result;
  }
}
