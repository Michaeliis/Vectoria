<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_user');
        $this->load->model('m_transport');
        $this->load->model('m_location');
        $this->load->library('session');
        /*if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }*/
	}
    
	public function index()
	{
		$this->load->view('v_header');
        $this->load->view('v_report');
        $this->load->view('v_footer');
	}
        
    public function driver($id)
	{
        $data['driver'] = $this->m_user->getUserById($id)->result();
        $data['tDetail'] = $this->m_transport->getTransportByDriverId($id)->result();
		$this->load->view('v_header');
        $this->load->view('v_report_driver', $data);
        $this->load->view('v_footer');
	}
    
    public function location($id)
	{
        $data['location'] = $this->m_location->getLocationById($id)->result();
        $data['tDetail'] = $this->m_transport->getTransportByLocationId($id)->result();
		$this->load->view('v_header');
        $this->load->view('v_report_location', $data);
        $this->load->view('v_footer');
	}
    
    public function transport($id)
	{
        $data['trans'] = $this->m_location->getTransportById($id)->result();
        $data['tDetail'] = $this->m_transport->getTransportByTransportId($id)->result();
		$this->load->view('v_header');
        $this->load->view('v_report_transport', $data);
        $this->load->view('v_footer');
	}
}
