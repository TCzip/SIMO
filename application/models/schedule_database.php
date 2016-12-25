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

  function checkOldEntries($startDate,$endDate){
    $result = $this->db
      ->where("`entryDate` between '". $startDate ."' and '". $endDate."'")
      // ->where('date <=' ,$endDate)
      ->get("memberentries");
      // echo $this->db->last_query(); die;
      return $result;
  }

  function newGroupEntry($entry){
    $result = $this->db
      ->insert('groupentries', $entry);
    return $result;
  }

  function getGroupsEntries($year,$month){
    $result = $this->db
      ->select('groups.groupName, groupentries.IdGroup, groupentries.idSchedule, groupentries.scheduleDate')
      ->from('groups')
      ->where('month(scheduleDate)', $month)
      ->where('year(scheduleDate)', $year)
      ->join('groupentries','groups.idGroup = groupentries.IdGroup')
      ->order_by('groupentries.scheduleDate', 'groupentries.idSchedule')
      ->get();
      //  echo $this->db->last_query(); die;
    return $result;
  }

  function getMembersEntries($year,$month){
    $result = $this->db
      ->select('users.username, users.idUser, memberentries.idSchedule, memberentries.scheduleDate')
      ->from('memberentries')
      ->where('month(scheduleDate)', $month)
      ->where('year(scheduleDate)', $year)
      ->join('users','users.idUser = memberentries.IdUser')
      ->order_by('scheduleDate')
      ->order_by('idSchedule')
      ->get();
      echo $this->db->last_query(); die;
    return $result;
  }

  function newEntry($entry){
    $result = $this->db
      ->insert('memberentries', $entry);
    return $result;
  }
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

  function addGroup($groupName){
    $result = $this->db
      ->insert('groups', array('groupName' => $groupName));
    return $result;

  }

  function checkGroup($groupName){
    $result = $this->db
      ->where('groupName' , $groupName)
      ->select('groups');
    return $result;
  }

  function deleteGroup($idGroup) {
    $result = $this->db
      ->where('idGroup', $idGroup)
      ->delete('groups');
    return $result;
  }

  function getGroupMembers($idGroup = null) {
    // echo "porra"; die();
    //if it comes from js function then get the value from post
    if ($idGroup == null) {
        $idGroup = $this->input->post("idGroup");
    }

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

  function removeMember($idUser = null){
    //if it comes from js function then get the value from post
    if ($idUser == null) {
      $idUser = $this->input->post("idUser");
    }

    $result = $this->db
      ->set("idGroup", null)
      ->where("idUser", $idUser)
      ->update("users");
    return $result;
  }
}
