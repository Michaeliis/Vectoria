<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_location');
        $this->load->model('m_user');
        $this->load->library('session');
        $this->load->library('pdf');
        if(!isset($_SESSION['userId']) || ($_SESSION['userPosition'] != 'employee' && $_SESSION['userPosition'] != 'admin')){
            show_404();
        }
	}
    
	public function index()
	{
        $data['location'] = $this->m_basic->gets('location')->result();
		$this->load->view('v_header');
        $this->load->view('v_locations', $data);
        $this->load->view('v_footer');
	}
        
    public function register()
	{
        $data['employee'] = $this->m_user->getUserByPosition('employee')->result();
		$this->load->view('v_header');
        $this->load->view('v_new_location', $data);
        $this->load->view('v_footer');
	}
    
    public function insert()
    {
        $name=$this->input->post('name');
		$address=$this->input->post('address');
		$pic=$this->input->post('pic');
		$detail=$this->input->post('detail');
        $latitude=$this->input->post('latitude');
        $longitude=$this->input->post('longitude');

		if($this->m_location->checkName($name)){
            $id = 'LOC'.sprintf("%04d", $this->m_basic->coun('location'));

            $data = array(
                'locationId'=>$id,
                'locationName'=>$name,
                'locationAddress'=>$address,
                'locationPiC'=>$pic,
                'locationDetail'=>$detail,
                'locationLatitude'=>$latitude,
                'locationLongitude'=>$longitude,
                'locationStatus'=>'1',
            );

            $this->m_basic->insert('location', $data);
            
        }

        redirect('location');
    }
    
    public function edit($locationId){
        $where = array('locationId' => $locationId);
        $data['location'] = $this->m_basic->find('location', $where)->result();
        $data['employee'] = $this->m_user->getUserByPosition('employee')->result();
        
		$this->load->view('v_header');
        $this->load->view('v_edit_location', $data);
        $this->load->view('v_footer');
    }
    
    public function update()
    {
        $locationId=$this->input->post('locationId');
        $where = array('locationId' => $locationId);
        
        $name=$this->input->post('name');
		$address=$this->input->post('address');
		$pic=$this->input->post('pic');
		$detail=$this->input->post('detail');
        $latitude=$this->input->post('latitude');
        $longitude=$this->input->post('longitude');

        $data = array(
            'locationName'=>$name,
            'locationAddress'=>$address,
            'locationPiC'=>$pic,
            'locationDetail'=>$detail,
            'locationLatitude'=>$latitude,
            'locationLongitude'=>$longitude,
            'locationStatus'=>'1'
        );

        $this->m_basic->update($where, 'location', $data);
        
        redirect('location');
    }
    
    public function delete($locationId)
    {
        $where = array('locationId' => $locationId);
        
		if($this->m_location->checkName($name)){

            $data = array('locationStatus'=>'0',
            );

            $this->m_basic->update($where, 'location', $data);
            
        }

        redirect('location');
    }
    
    public function printing(){
        $pdf = new FPDF('l','mm','A4');
		//buat halaman baru
		$pdf->AddPage();
        
        $left = 25;
        //Header
        $pdf->SetFont("Arial", "B", 15);
		$pdf->MultiCell(0, 12, 'Vectoria');
		$pdf->Cell(0, 1, " ", "B");
		$pdf->Ln(10);
		$pdf->SetFont("", "B", 12);
		$pdf->SetX($left); $pdf->Cell(0, 10, 'LIST OF LOCATION', 0, 1,'C');
		$pdf->Ln(10);
        
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(30,10,'Location ID',1,0);
		$pdf->Cell(54,10,'Name',1,0);
		$pdf->Cell(180,10,'Address',1,1);
        
        $pdf->SetFont('Arial','',10);
		$isi = $this->m_basic->gets('location')->result();
		foreach ($isi as $row){
            $pdf->Cell(30,10,$row->locationId,1,0);
			$pdf->Cell(54,10,$row->locationName,1,0);
            $address=$row->locationAddress;
			$pdf->Cell(180,10,$address,1,1);
		}
		$pdf->Output();
    }
}
