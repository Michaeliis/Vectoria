<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_user');
        $this->load->library('session');
        $this->load->library('pdf');
        if(!isset($_SESSION['userId'])){
            show_404();
        }
	}

	public function index()
	{
        $data['user'] = $this->m_basic->gets('user')->result();
		$this->load->view('v_header');
        $this->load->view('v_users', $data);
        $this->load->view('v_footer');
	}
        
    public function register()
	{
		$this->load->view('v_header');
        $this->load->view('v_new_user');
        $this->load->view('v_footer');
	}
    
    public function insert(){
        $dob = $this->input->post('dob');
        $password = date_format(date_create($dob),"Ymd");
        
        $id="";
		$pass=md5($password);
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$position=$this->input->post('position');
		$status=$this->input->post('status');

		if($this->m_user->checkEmail($email)){
            if($position == "employee"){
                $id = 'EMP'.sprintf("%04d", $this->m_user->countUser('employee'));
            }else if($position == "admin"){
                $id = 'ADM'.sprintf("%04d", $this->m_user->countUser('admin'));
            }else if($position == "driver"){
                $id = 'DRI'.sprintf("%04d", $this->m_user->countUser('driver'));
            }
            

            $data = array(
                'userId'=>$id,
                'userName'=>$name,
                'userPassword'=>$pass,
                'userAddress'=>$address,
                'userDob'=>$dob,
                'userPhone'=>$phone,
                'userEmail'=>$email,
                'userPosition'=>$position,
                'userStatus'=>'1',
            );

            $this->m_basic->insert('user', $data);
            
            // Konfigurasi email
            $config = [
                   'mailtype'  => 'html',
                   'charset'   => 'utf-8',
                   'protocol'  => 'smtp',
                   'smtp_host' => 'ssl://smtp.gmail.com',
                   'smtp_user' => 'vector.vectoriaa@gmail.com',    // Ganti dengan email gmail kamu
                   'smtp_pass' => 'repertoirre',      // Password gmail kamu
                   'smtp_port' => 465,
                   'crlf'      => "\r\n",
                   'newline'   => "\r\n"
               ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('vector.vectoriaa@gmail.com', 'Vectoria TMS');

            // Email penerima
            $this->email->to($email); // Ganti dengan email tujuan kamu

            // Lampiran email, isi dengan url/path file
            //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

            // Subject email
            $this->email->subject('Pembuatan Akun Vectoria');

            // Isi email
            $isi = "
            <html>
            <body>
            <h3>Akun Vektoria anda berhasil dibuat dengan data berupa: </h3>
            <table border='1px solid black'>
              <tr>
                <th>ID</th>
                <td>". $id ."</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>". $name ."</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>". $password ."</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>". $address ."</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>". $dob ."</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>". $phone ."</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>$email</td>
            </tr>
            <tr>
                <th>Position</th>
                <td>$position</td>
            </tr>
            </table>

            </body>
            </html>
            ";
            $this->email->message($isi);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                echo 'Sukses! email berhasil dikirim.';
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }

        redirect('user');
    }
    
    public function edit($userId){
        $where = array('userId'=>$userId);
        $data['user'] = $this->m_basic->find('user', $where)->result();
        
        $this->load->view('v_header');
        $this->load->view('v_edit_user', $data);
        $this->load->view('v_footer');
    }
    
    public function update(){
        $userId =$this->input->post('userId');
        $where = array('userId'=>$userId);
        $password=$this->input->post('password');
        
		$pass=md5($password);
		$name=$this->input->post('name');
        $dob=$this->input->post('dob');
		$address=$this->input->post('address');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$position=$this->input->post('position');
		$status=$this->input->post('status');

        $data = array(
            'userName'=>$name,
            'userPassword'=>$pass,
            'userAddress'=>$address,
            'userDob'=>$dob,
            'userPhone'=>$phone,
            'userEmail'=>$email,
            'userPosition'=>$position,
            'userStatus'=>'1',
        );

        $this->m_basic->update($where, 'user', $data);
        
        redirect('user');
    }
    
    public function delete($userId){
        $where = array('userId'=>$userId);
        $data = array('userStatus'=>'0');
        $this->m_basic->update($where, 'user', $data);
        redirect('user');
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
		$pdf->SetX(25); $pdf->Cell(0, 10, 'LIST OF USER', 0, 1,'C');
		$pdf->Ln(10);
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(30,10,'User ID',1,0);
		$pdf->Cell(30,10,'Position',1,0);
		$pdf->Cell(54,10,'Name',1,0);
		$pdf->Cell(56,10,'Phone',1,0);
        $pdf->Cell(56,10,'Email',1,0);
		$pdf->Cell(56,10,'Status',1,1);
        
        $pdf->SetFont('Arial','',10);
		$isi = $this->m_basic->gets('user')->result();
		foreach ($isi as $row){
            $status = "Active";
            if($row->userStatus == 0){
                $status = "Not Active";
            }
            
            $pdf->Cell(30,10,$row->userId,1,0);
			$pdf->Cell(30,10,$row->userPosition,1,0);
			$pdf->Cell(54,10,$row->userName,1,0);
			$pdf->Cell(56,10,$row->userPhone,1,0);
            $pdf->Cell(56,10,$row->userEmail,1,0);
			$pdf->Cell(56,10,$status,1,1);
		}
		$pdf->Output();
    }
}
