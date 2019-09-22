<?php
class M_problem extends CI_Model{
    
    function showProblems(){
        $this->db->select("problem.tLocationid, problem.itemId, problem.difference, problem.broke, problem.problemDetail, problem.problemStatus, transportlocation.transportId, transportlocation.locationId, location.locationName, item.itemName")
            ->from('problem')
            ->join('transportlocation', 'transportlocation.tLocationId = problem.tLocationId')
            ->join('location', 'transportlocation.locationId = location.locationId')
            ->join('item', 'problem.itemId = item.itemId');
        return $this->db->get();
    }
    
}
?>