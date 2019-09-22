<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_problem');
        $this->load->model('m_transport');
        $this->load->library('session');
        $this->load->library('pdf');
        if(!isset($_SESSION['userId'])){
            show_404();
        }
	}
    
    public function index(){
        $data['problem'] = $this->m_problem->showProblems()->result();
        $this->load->view('v_header');
        $this->load->view('v_problems', $data);
        $this->load->view('v_footer');
    }
    
    public function problem($id){
        $data['tDetail'] = $this->m_transport->getTransportDetailInfo($id)->result();
        $this->load->view('v_header');
        $this->load->view('v_problem', $data);
        $this->load->view('v_footer');
    }
    
    public function viewProblem($tLocationId, $itemId){
        $where = array(
            'tLocationId'=>$tLocationId,
            'itemId'=>$itemId
        );
        $data['problem'] = $this->m_basic->find('problem', $where)->result();
        $this->load->view('v_header');
        $this->load->view('v_problems', $data);
        $this->load->view('v_footer');
    }
    
    public function newproblem(){
        $tLocationId=$this->input->post('tLocationId');
        $itemName=$this->input->post('itemId');
        $kuBi=$this->input->post('kuBi');
        $juRang=$this->input->post('juRang');
        $rusak=$this->input->post('rusak');
        $detail=$this->input->post('detail');
        
        $difference = $juRang;
        
        if($kuBi == "kurang"){
            $difference = $juRang * -1;
        }
        
        $data = array(
            'tLocationId'=>$tLocationId,
            'itemName'=>$itemName,
            'difference'=>$difference,
            'broke'=>$rusak,
            'problemDetail'=>$detail,
            'problemStatus'=>'1'
        );
        redirect('problem');
    }
    
    public function acceptProblem(){
        $where = array(
            'tLocationId'=>$tLocationId,
            'itemId'=>$itemId
        );
        $data = array('problemStatus'=>'2');
        $this->m_basic->update($where, 'problem', $data);
        redirect('problem');
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
		$pdf->SetX(25); $pdf->Cell(0, 10, 'LIST OF PROBLEM REPORT', 0, 1,'C');
		$pdf->Ln(10);
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(56,10,'Transport Id',1,0);
		$pdf->Cell(54,10,'Location',1,0);
		$pdf->Cell(54,10,'Kurang / Lebih',1,0);
        $pdf->Cell(54,10,'Jumlah Kurang / Lebih',1,0);
        $pdf->Cell(54,10,'Jumlah Rusak',1,0);
		$pdf->Cell(56,10,'Status',1,1);
        
        $pdf->SetFont('Arial','',10);
		$isi = $this->m_problem->showProblems()->result();
		foreach ($isi as $row){
            if($problems->difference > 0){
                $kuBi = "Kelebihan";
            }else if($problems->difference < 0){
                $kuBi = "Kekurangan";
            }
            
            $pdf->Cell(56,10,$row->transportId,1,0);
			$pdf->Cell(54,10,$row->locationName,1,0);
			$pdf->Cell(54,10,$kuBi,1,0);
            $pdf->Cell(54,10,abs($row->difference),1,0);
            $pdf->Cell(54,10,$row->broke,1,0);
			$pdf->Cell(56,10,$row->status,1,1);
		}
		$pdf->Output();
    }
}