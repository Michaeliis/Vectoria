<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
    
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
        $data['item'] = $this->m_basic->gets('item')->result();
		$this->load->view('v_header');
        $this->load->view('v_items', $data);
        $this->load->view('v_footer');
	}
        
    public function register()
	{
		$this->load->view('v_header');
        $this->load->view('v_new_item');
        $this->load->view('v_footer');
	}
    
    public function insert(){
        $itemId = sprintf("ITM%04d", $this->m_basic->coun('item'));
        $name = $this->input->post('name');
        $weight = $this->input->post('weight');
        
        $data = array(
            'itemId' => $itemId,
            'itemName' => $name,
            'itemWeight' => $weight,
            'itemStatus' => '1'
        );
        
        $this->m_basic->insert('item', $data);
        redirect('item');
    }
    
    public function edit($itemId){
        $data['item'] = $this->m_basic->find('item', array('itemId' => $itemId))->result();
        
        $this->load->view('v_header');
        $this->load->view('v_edit_item', $data);
        $this->load->view('v_footer');
    }
    
    public function update(){
        $itemId = $this->input->post('itemId');
        $where = array('itemId' => $itemId);
        
        $name = $this->input->post('name');
        $weight = $this->input->post('weight');
        
        $data = array(
            'itemName' => $name,
            'itemWeight' => $weight,
            'itemStatus' => '1'
        );
        
        $this->m_basic->update($where, 'item', $data);
        redirect('item');
    }
    
    public function delete($itemId){
        $where = array('itemId' => $itemId);
        
        $data = array('itemStatus' => '0'
        );
        
        $this->m_basic->update($where, 'item', $data);
        redirect('item');
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
		$pdf->SetX(25); $pdf->Cell(0, 10, 'LIST OF ITEM', 0, 1,'C');
		$pdf->Ln(10);
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(66,10,'Item ID',1,0);
		$pdf->Cell(64,10,'Name',1,0);
		$pdf->Cell(64,10,'Weight',1,0);
		$pdf->Cell(66,10,'Status',1,1);
        
        $pdf->SetFont('Arial','',10);
		$isi = $this->m_basic->gets('item')->result();
		foreach ($isi as $row){
            $status = "Active";
            if($row->itemStatus == 0){
                $status = "Not Active";
            }
            
            $pdf->Cell(66,10,$row->itemId,1,0);
			$pdf->Cell(64,10,$row->itemName,1,0);
			$pdf->Cell(64,10,$row->itemWeight,1,0);
			$pdf->Cell(66,10,$status,1,1);
		}
		$pdf->Output();
    }
}
