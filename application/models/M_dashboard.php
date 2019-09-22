<?php
class M_dashboard extends CI_Model{
    
    
    function find($table){
        $this->db->select('MONTH(transport.transportDate) as "month", COUNT(transport.transportId) AS "counter"')
            ->from($table)
            ->where('YEAR(transport.transportDate)', date("Y"))
            ->group_by("month");
        return $this->db->get();
	}
    
    function curDay($table){
        $this->db->select('COUNT(transport.transportId) AS "counter"')
            ->from($table)
            ->where('YEAR(transport.transportDate)', date("Y"))
            ->where('MONTH(transport.transportDate)', date("m"))
            ->where('DAY(transport.transportDate)', date("d"));
        return $this->db->get();
    }
    
    function curmonths($table){
        $this->db->select('COUNT(transport.transportId) AS "counter"')
            ->from($table)
            ->where('YEAR(transport.transportDate)', date("Y"))
            ->where('MONTH(transport.transportDate)', date("m"));
        return $this->db->get();
    }
    
}
?>