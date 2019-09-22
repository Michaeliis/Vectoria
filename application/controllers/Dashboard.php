<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_dashboard');
        
        $this->load->library('session');
        $this->load->library('pdf');
        if(!isset($_SESSION['userId'])){
            show_404();
        }
	}
    
	public function index()
	{
        $where = array('YEAR(transportDate)'=>date("Y"));
        $data['month'] = $this->m_dashboard->find('transport')->result();
        $data['curmonths'] = $this->m_dashboard->curmonths('transport')->num_rows();
        $data['curday'] = $this->m_dashboard->curday('transport')->result();
        $data['curcars'] = $this->m_basic->gets('car')->num_rows();
		$this->load->view('v_header');
        $this->load->view('v_dashboard', $data);
        $this->load->view('v_footer');
	}
}
