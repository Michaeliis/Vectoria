<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->library('session');
        $this->load->library('pdf');
        if(!isset($_SESSION['userId']) || ($_SESSION['userPosition'] != 'employee' && $_SESSION['userPosition'] != 'admin')){
            show_404();
        }
	}

	public function index()
	{
        $data['car'] = $this->m_basic->gets('car')->result();
		$this->load->view('v_header');
        $this->load->view('v_cars', $data);
        $this->load->view('v_footer');
	}
        
    public function register()
	{
		$this->load->view('v_header');
        $this->load->view('v_new_car');
        $this->load->view('v_footer');
	}
    
    public function insert(){
        $name = $this->input->post('name');
        $plate = $this->input->post('plate');
        $load  = $this->input->post('load');
        $weight = $this->input->post('weight');
        $length = $this->input->post('length');
        $width = $this->input->post('width');
        $gas = $this->input->post('gas');
        $last = $this->input->post('last');
        
        $data = array(
            'carName' => $name,
            'carPlate' => $plate,
            'carLoad' => $load,
            'carWeight' => $weight,
            'carLength' => $length,
            'carWidth' => $width,
            'carGas' => $gas,
            'carRegLast' => $last,
            'carStatus' => '1'
        );
        
        $this->m_basic->insert('car', $data);
        redirect('car');
    }
    
    public function edit($carPlate){
        $data['car'] = $this->m_basic->find('car', array("carPlate"=>$carPlate))->result();
        
        $this->load->view('v_header');
        $this->load->view('v_edit_car', $data);
        $this->load->view('v_footer');
    }
    
    public function update($carPlate){
        $where = array('carPlate' => $carPlate);
        
        $name = $this->input->post('name');
        $plate = $this->input->post('plate');
        $load  = $this->input->post('load');
        $weight = $this->input->post('weight');
        $length = $this->input->post('length');
        $width = $this->input->post('width');
        $gas = $this->input->post('gas');
        $last = $this->input->post('last');
        
        $data = array(
            'carName' => $name,
            'carLoad' => $load,
            'carWeight' => $weight,
            'carLength' => $length,
            'carWidth' => $width,
            'carGas' => $gas,
            'carRegLast' => $last,
            'carStatus' => '1'
        );
        
        $this->m_basic->update($where, 'car', $data);
        redirect('car');
    }
    
    public function delete($carPlate){
        $where = array('carPlate' => $carPlate);
        
        $data = array('carStatus' => '0'
        );
        
        $this->m_basic->update($where, 'car', $data);
        redirect('car');
    }
    
    public function printing(){
        $pdf = new FPDF('l','mm','A4');
		//buat halaman baru
		$pdf->AddPage();
		//Header
        $pdf->SetFont("Arial", "B", 15);
		$pdf->MultiCell(0, 12, 'Vectoria');
		$pdf->Cell(0, 1, " ", "B");
		$pdf->Ln(10);
		$pdf->SetFont("Arial", "B", 16);
		$pdf->SetX(25); $pdf->Cell(0, 10, 'LIST OF CAR', 0, 1,'C');
		$pdf->Ln(10);
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(56,10,'Car Plate',1,0);
		$pdf->Cell(54,10,'Name',1,0);
		$pdf->Cell(54,10,'Max Load',1,0);
		$pdf->Cell(56,10,'Last Renew',1,0);
		$pdf->Cell(56,10,'Status',1,1);
        
        $pdf->SetFont('Arial','',10);
		$isi = $this->m_basic->gets('car')->result();
		foreach ($isi as $row){
            $status = "Active";
            if($row->carStatus == 0){
                $status = "Not Active";
            }
            $pdf->Cell(56,10,$row->carPlate,1,0);
			$pdf->Cell(54,10,$row->carName,1,0);
			$pdf->Cell(54,10,$row->carLoad,1,0);
			$pdf->Cell(56,10,$row->carRegLast,1,0);
			$pdf->Cell(56,10,$status,1,1);
		}
		$pdf->Output();
    }
}
