<?php
class M_user extends CI_Model{
    
    function countUser($position)
    {
        $where = array('userPosition' => $position);
        return $this->db->get_where('user', $where)->num_rows();
    }
    
    function checkEmail($email)
    {
        $where = array('userEmail' => $email);
        $count = $this->db->get_where('user', $where)->num_rows();
        if($count > 0){
            return false;
        }else{
            return true;
        }
    }
    
    function getUserByPosition($position){
        $where = array('userPosition' => $position);
        return $this->db->get_where('user', $where);
    }  
    
    function getUserById($id){
        $where = array('userId' => $id);
        return $this->db->get_where('user', $where);
    }  
}
?>