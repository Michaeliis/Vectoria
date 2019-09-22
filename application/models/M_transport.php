<?php
class M_transport extends CI_Model
{
    
    function coun($date)
    {
        return 
            $this->db->get_where('transport', array('transportDate'=>$date))->num_rows();
    }
    
    function showTransports()
    {
        $this->db->select('transport.transportId, user.userName, car.carPlate, transport.transportDate, transport.transportStatus')
            ->from('transport')
            ->join('user', 'transport.driverId = user.userId')
            ->join('car', 'transport.carPlate = car.carPlate');
        return $this->db->get();
    }
    
    /*function getTransportByDriverId($id){
        $this->db->select("transport.transportId, location.locationName, transportdetail.itemId, transportdetail.itemDetail, pic.userName as 'picName', driver.userName as 'driverName', transport.transportDate, transportdetail.itemQuantity")
            ->from("transportdetail")
            ->join('transportLocation', 'transportdetail.tLocationId = transportLocation.tLocationId')
            ->join('transport', 'transportLocation.transportId = transport.transportId')
            ->join("location", "transportLocation.locationid = location.locationid")
            ->join('user pic', 'transportdetail.recipientId = pic.userId')
            ->join('user driver', 'transport.driverId = driver.userId')
            ->where('transport.driverId', $id);
        return $this->db->get();
    }*/
    
    function getTransportByDriverId($id)
    {
        $this->db->select('transport.transportId, user.userName, car.carPlate, transport.transportDate, transport.transportStatus')
            ->from('transport')
            ->join('user', 'transport.driverId = user.userId')
            ->join('car', 'transport.carPlate = car.carPlate')
            ->where("transport.driverId", $id);
        return $this->db->get();
    }
    
    function getTransportLocationByTransportId($id){
        $this->db->select("location.locationName, location.locationName, pic.userName as 'picName', transportLocation.tLocationStatus, transportLocation.tLocationId, transportLocation.tLocationOrder")
            ->from("transportLocation")
            ->join("transport", "transportLocation.transportId = transport.transportId")
            ->join("location", "transportLocation.locationid = location.locationid")
            ->where("transportLocation.tLocationId", $id)
            ->order_by("tLocationOrder", "ASC");
        return $this->db->get();
    }
    
    function getTransportDetail($id){
        $this->db->select("location.locationName, location.locationAddress, pic.userName as 'picName', transportLocation.tLocationStatus")
            ->from("transportLocation")
            ->join("transport", "transportLocation.transportId = transport.transportId")
            ->join("location", "transportLocation.locationid = location.locationid")
            ->where("transport.transportId", $id);
        return $this->db->get();
    }
    
    function getTransportByLocationId($id){
        $this->db->select('transport.transportId, location.locationName, transportdetail.itemId, transportdetail.itemDetail, pic.userName as "picName", driver.userName as "driverName", transport.transportDate, transportdetail.itemQuantity, item.itemName')
            ->from('transportdetail')
            ->join('transportLocation', 'transportdetail.tLocationId = transportLocation.tLocationId')
            ->join('transport', 'transportLocation.transportId = transport.transportId')
            ->join('location', 'transportLocation.locationId = location.locationId')
            ->join('user pic', 'transportdetail.recipientId = pic.userId')
            ->join('user driver', 'transport.driverId = driver.userId')
            ->join('item', 'transportdetail.itemId = item.itemId')
            ->where('transportLocation.locationId', $id);
        return $this->db->get();
    }
    
    function getTransportByTransportId($id){
        $this->db->select('transport.transportId, location.locationName, transportdetail.itemId, transportdetail.itemDetail, pic.userName, transport.transportDate, transportdetail.itemQuantity, transportdetail.tdetailStatus, location.locationLatitude, location.locationLongitude')
            ->from('transportdetail')
            ->join('transportLocation', 'transportdetail.tLocationId = transportLocation.tLocationId')
            ->join('transport', 'transportLocation.transportId = transport.transportId')
            ->join('location', 'transportLocation.locationId = location.locationId')
            ->join('user pic', 'transportdetail.recipientId = pic.userId')
            ->join('user driver', 'transport.driverId = driver.userId')
            ->where('transport.transportId', $id);
        return $this->db->get();
    }
    
    function getTransportById($id){
        $this->db->select("transport.transportId, driver.userName as 'driverName', transport.carPlate, transport.transportDate, transport.transportStatus")
            ->from('transport')
            ->join('user driver', 'transport.driverId = driver.userId')
            ->where('transport.transportId', $id);
        return $this->db->get();
    }
    
    function getTransportDetailInfo($id){
        $this->db->select("transportdetail.tLocationId, transportdetail.itemId, item.itemName, location.locationName")
            ->from('transportdetail')
            ->join('transportlocation', 'transportlocation.tLocationId = transportdetail.tLocationId')
            ->join('location', 'location.locationId = transportlocation.locationId')
            ->join('item', 'transportdetail.itemId = item.itemId')
            ->where('transportdetail.tLocationId', $id);
        return $this->db->get();
    }
    
}
?>