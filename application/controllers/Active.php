<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Active extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_active');
        $this->load->model('m_transport');
        $this->load->library('session');
        if(!isset($_SESSION['userId']) || ($_SESSION['userPosition'] != 'employee' && $_SESSION['userPosition'] != 'admin')){
            show_404();
        }
	}
    
    public function index(){
        $data['schedule'] = $this->m_transport->showTransports()->result();
        $this->load->view('v_header');
        $this->load->view('v_schedule', $data);
        $this->load->view('v_footer');
    }
    
	public function transport($id)
	{
        $data['trans'] = $this->m_active->getActive($id)->result();
        $data['transport'] = $this->m_active->getTransportByTransportId($id)->result();
        
		$this->load->view('v_header');
        $this->load->view('v_active_transport', $data);
        $this->load->view('v_footer');
	}
    
    public function detail($id)
	{
        $data['trans'] = $this->m_active->getActiveDetail($id)->result();
        $data['transport'] = $this->m_active->getTransportByTransportDetailId($id)->result();
        $data['tLocationId'] = $id;
        
		$this->load->view('v_header');
        $this->load->view('v_active_detail', $data);
        $this->load->view('v_footer');
	}
    
    public function register()
	{
		$this->load->view('v_header');
        $this->load->view('v_new_car');
        $this->load->view('v_footer');
	}
    
    public function additem($tLocationId){
        $data['trans'] = $this->m_active->getActiveDetail($tLocationId)->result();
        $data['item'] = $this->m_basic->gets('item')->result();
        $data['tLocationId'] = $tLocationId;
        
        $this->load->view('v_header');
        $this->load->view('v_active_item', $data);
        $this->load->view('v_footer');
    }
    
    public function insertItem(){
        $tLocationId = $this->input->post('tLocationId');
        
        $locationId = $this->input->post('locationId');
        $item = $this->input->post('item');
        $quantity = $this->input->post('quantity');
        $detail = $this->input->post('detail');
        echo $locationId. "aaaaa";
        $where = array('locationId'=>$locationId);
        
        $reci = $this->m_basic->find('location', $where)->result();
        
        foreach($reci as $recis){
            $recipient = $recis->locationPiC;
        }
        
        foreach($item as $key => $items){
            $data = array(
                'tLocationId'=>$tLocationId,
                'recipientId'=>$recipient,
                'itemId'=>$items,
                'itemQuantity'=>$quantity[$key],
                'itemDetail'=>$detail[$key],
                'tDetailStatus'=>'1'
            );
            $this->m_basic->insert('transportdetail', $data);
        }
        
        redirect(base_url('active/detail/').$tLocationId);
    }
    
    public function startLocation($id, $home){
        $where = array('tLocationId'=>$id);
        $data = array('tLocationStatus'=>'2');
        $this->m_basic->update($where, 'transportlocation', $data);
        
        $data = array("tDetailStatus"=>2);
        $this->m_basic->update($where, 'transportDetail', $data);
        
        redirect(base_url('active/transport/'). $home);
    }
    
    public function finishLocation($id, $home){
        $where = array('tLocationId'=>$id);
        $data = array('tLocationStatus'=>'3');
        
        $this->m_basic->update($where, 'transportlocation', $data);
        redirect(base_url('active/transport/'). $home);
    }
    
    public function finishItem($tLocationId, $itemId){
        $user = $_SESSION['userId'];
        $position = $_SESSION['userPosition'];
        $receiver == "";
        $where = array(
            'tLocationId' => $tLocationId,
            'itemId' => $itemId
        );
        
        if($position!='admin'){
            $res = $this->m_basic->find('tLocationId', $where)->result();
            
            foreach($res as $ress){
                $receiver = $ress->recipientId;
            }
        }
        
        
        if($user == $receiver || $position=='admin'){
            $update = array('tLocationStatus' => 3);
            $this->m_basic->update($where, 'transportlocation', $update);
        }
    }
}
