<?php
class M_location extends CI_Model
{
    
    function checkName($name)
    {
        $where = array('locationName' => $name);
        $count = $this->db->get_where('location', $where)->num_rows();
        if($count > 0){
            return false;
        }else{
            return true;
        }
    }
    
    function getLocationById($id)
    {
        $this->db->select("location.locationId, location.locationName, location.locationAddress, location.locationPiC, location.locationDetail, location.locationLatitude, location.locationLongitude, location.locationStatus, user.userName, user.userPhone, user.userEmail")
            ->from('location')
            ->join('user', 'user.userId = location.locationPiC')
            ->where('locationId', $id);
        return $this->db->get();
    }
    
    function getTransportById($id){
        $this->db->select("transport.transportId, location.locationName, location.locationAddress, driver.userName as 'driverName', driver.userId as 'driverId', transport.carPlate, transport.transportDate, transport.transportStatus")
            ->from('transport')
            ->join('transportlocation', 'transportlocation.transportId = transport.transportId')
            ->join('location', 'transportlocation.locationId = location.locationId')
            ->join('user driver', 'transport.driverId = driver.userId')
            ->where('transport.transportId', $id);
        return $this->db->get();
    }
}
?>