<?php
class M_active extends CI_Model{
    
    function getActive($id){
        $this->db->select("driver.userName as 'driverName', driver.userId as 'driverId', transport.transportId, transport.carPlate, transport.transportDate")
            ->from("transport")
            ->join('user driver', 'transport.driverId = driver.userId')
            ->where('transport.transportId', $id);
        return $this->db->get();
    }
    
    function getTransportByTransportId($id){
        $this->db->select("location.locationName, location.locationAddress, pic.userName as 'picName', location.locationLatitude, location.locationLongitude, transportLocation.tLocationId, transportLocation.tLocationStatus")
            ->from('transportLocation')
            ->join('transport', 'transportLocation.transportId = transport.transportId')
            ->join('location', 'transportLocation.locationId = location.locationId')
            ->join('user pic', 'location.locationPiC = pic.userId')
            ->where('transport.transportId', $id);
        return $this->db->get();
    }
    
    function getActiveDetail($id){
        $this->db->select("driver.userName as 'driverName', pic.userName as 'picName', driver.userId as 'driverId', transport.transportId, transport.carPlate, location.locationName, location.locationAddress, location.locationLatitude, location.locationLongitude, transport.transportId, transport.transportDate, transportlocation.tLocationId, transportlocation.tLocationStatus, location.locationId")
            ->from('transportLocation')
            ->join('transport', 'transportLocation.transportId = transport.transportId')
            ->join('location', 'transportLocation.locationId = location.locationId')
            ->join('user driver', 'transport.driverId = driver.userId')
            ->join('user pic', 'pic.userId = location.locationPic')
            ->where('transportLocation.tLocationId', $id);
        return $this->db->get();
    }
    
    function getTransportByTransportDetailId($id){
        $this->db->select("transportdetail.itemId, transportdetail.itemDetail, pic.userName as 'picName', transportdetail.itemQuantity, transportdetail.tDetailStatus, transportdetail.tLocationId, item.itemName, location.locationId")
            ->from('transportdetail')
            ->join('transportlocation', 'transportLocation.tLocationId = transportdetail.tLocationId')
            ->join('transport', 'transportLocation.transportId = transport.transportId')
            ->join('location', 'transportLocation.locationId = location.locationId')
            ->join('item', 'transportdetail.itemId = item.itemId')
            ->join('user pic', 'transportdetail.recipientId = pic.userId')
            ->where('transportdetail.tLocationId', $id);
        return $this->db->get();
    }
    
}
?>