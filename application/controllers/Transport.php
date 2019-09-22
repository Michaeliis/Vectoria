<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class API_Connector {

    var
        $result = array(),
        $http_code = 0,
        $error = ''
    ;

    /**
     * Optimize an itinerary with multiple destinations
     * @param array locations Locations to be routed
     * @return bool Success 
     */
    public function tour($locations) {

        try {

            // Use libcurl to connect and communicate
            $ch = curl_init(); // Initialize a cURL session
            curl_setopt($ch, CURLOPT_URL, 'https://api.routexl.nl/tour'); // Set the URL
            curl_setopt($ch, CURLOPT_HEADER, 0); // No header in the output
            curl_setopt($ch, CURLOPT_POST, 1); // Do a regular HTTP POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'locations=' . json_encode($locations)); // Add the locations
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return the output as a string
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate'); // Compress
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Basic authorization
            curl_setopt($ch, CURLOPT_USERPWD, 'chronasa:michaelis'); // Your credentials

            // Do not use this!
            //if (false) curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Unsafe!

            // Execute the given cURL session
            $output = curl_exec($ch); // Get the output
            $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Last received HTTP code
            $this->error = curl_error($ch); // Get the last error
            curl_close($ch); // Close the connection

            // Decode the output
            if(json_decode($output)) {
                $this->result = json_decode($output);
            }else{
                $this->result = $output;
            }

        } catch(exception $e) {

            $this->error = $e->getMessage();
            return false;

        } 

        if ($this->http_code!=200) return false; 
        else return true;

    }

}

class transport extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('m_basic');
        $this->load->model('m_user');
        $this->load->model('m_transport');
        $this->load->model('m_location');
        $this->load->library('session');
        $this->load->library('pdf');
        if(!isset($_SESSION['userId']) || ($_SESSION['userPosition'] != 'employee' && $_SESSION['userPosition'] != 'admin')){
            show_404();
        }
	}
    
	public function index()
	{
        $data['transport'] = $this->m_transport->showTransports()->result();
		$this->load->view('v_header');
        $this->load->view('v_transports', $data);
        $this->load->view('v_footer');
	}
        
    public function new_transport()
	{
        $data['car'] = $this->m_basic->gets('car')->result();
        $data['location'] = $this->m_basic->gets('location')->result();
        $data['driver'] = $this->m_user->getUserByPosition('driver')->result();
		$this->load->view('v_header');
        $this->load->view('v_new_transport', $data);
        $this->load->view('v_footer');
	}
    
    public function insert()
    {
        $driver = $this->input->post('driver');
		$car = $this->input->post('car');
		$date = $this->input->post('transDate');
        $start = $this->input->post('start');
        $location = $this->input->post('location');
        
        
        $id = 'TRF'.sprintf("%s%04d", date('Ymd', strtotime($date)), $this->m_transport->coun($date));

        $data = array(
            'transportId'=>$id,
            'driverId'=>$driver,
            'carPlate'=>$car,
            'transportDate'=>$date,
            'transportStatus'=>'1'
        );
        $this->m_basic->insert('transport', $data);
        
        $locations = array();
        $loca = array();
        
        //Preparing for API
        
        $startLoc = $this->m_location->getLocationById($start)->result();
        foreach($startLoc as $startLocs){
            $locationIdl= $startLocs->locationId;
            if(!in_array($locationIdl, $loca)){
                $loca[] = $locationIdl;
                $locations[] = array(
                    'name' => $locationIdl,
                    'lat' => $startLocs->locationLatitude,
                    'lng' => $startLocs->locationLongitude
                );
            }
        }
        
        foreach($location as $a){
            $loc = $this->m_location->getLocationById($a)->result();
            foreach($loc as $locs){
                if(!in_array($a, $loca)){
                    $loca[] = $a;
                    $locations[] = array(
                        'name' => $locs->locationId,
                        'lat' => $locs->locationLatitude,
                        'lng' => $locs->locationLongitude
                    );
                }
            }
        }
        echo count($loca). "<br>";
        
        
        //Running API & Insert data
        $tlocid = "";
        $route = new API_Connector();
        if($route->tour($locations)){
            $data = json_encode($route->result);
            echo $data. "<br>";
            $data = json_decode($data, true);
            
            //looping through different locations
            $counter = 0;
            foreach($loca as $key){
                $locId = $data['route'][strval($counter)]['name'];
                $tlocid = 'TLO'.sprintf("%04d", $this->m_basic->coun('transportlocation'));
                $datass = array(
                    'tLocationId'=>$tlocid,
                    'tLocationOrder'=>$counter,
                    'transportId'=>$id,
                    'locationId'=>$locId,
                    'tLocationStatus'=>1
                );
                $this->m_basic->insert('transportlocation', $datass);
                $counter++;
            }
            
        }
        
        //sending email to driver
        $drivd = $this->m_basic->find('user', array("userId"=>$driver))->result();
        $driverEmail = "";
        foreach($drivd as $drivds){
            $driverEmail = $drivds->userEmail;
        }
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
            $this->email->to($driverEmail); // Ganti dengan email tujuan kamu

            // Lampiran email, isi dengan url/path file
            //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

            // Subject email
            $this->email->subject('Pengiriman Barang Baru');

            // Isi email
            $isi = "
            <html>
            <body>
            <h3>Pengiriman barang baru dengan data berupa: </h3>
            <table border='1px solid black'>
              <tr>
                <th>ID</th>
                <td>". $id ."</td>
            </tr>
            <tr>
                <th>Driver</th>
                <td>". $driver ."</td>
            </tr>
            <tr>
                <th>Car Plate</th>
                <td>". $car ."</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>". $date ."</td>
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
        

        redirect('active/transport/'.$id);
    }
    
    public function inProgress($id){
        $where = array('transportId'=>$id);
        $data = array('transportStatus'=>'2');
        $this->m_basic->update($where, 'transport', $data);
        redirect('transport');
    }
    
    public function finished($id){
        $where = array('transportId'=>$id);
        $data = array('transportStatus'=>'3');
        $this->m_basic->update($where, 'transport', $data);
        redirect('transport');
    }
    
    public function cancel($id){
        $where = array('transportId'=>$id);
        $data = array('transportStatus'=>'0');
        $this->m_basic->update($where, 'transport', $data);
        redirect('transport');
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
		$pdf->SetX(25); $pdf->Cell(0, 10, 'LIST OF LOCATION', 0, 1,'C');
		$pdf->Ln(10);
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(56,10,'Transport ID',1,0);
		$pdf->Cell(54,10,'Driver',1,0);
		$pdf->Cell(54,10,'Car',1,0);
		$pdf->Cell(56,10,'Transport Date',1,0);
		$pdf->Cell(56,10,'Status',1,1);
        
        $pdf->SetFont('Arial','',10);
		$isi =  $this->m_transport->showTransports()->result();
		foreach ($isi as $row){
            $stat = "";
            if($row->transportStatus == 0){
                 $stat = "Canceled";
             }else if($row->transportStatus ==1){
                 $stat = "In Schedule";
             }else if($row->transportStatus ==2){
                 $stat = "Delivering";
             }else if($row->transportStatus ==3){
                 $stat = "Deliveried";
             }
            
            $pdf->Cell(56,10,$row->transportId,1,0);
			$pdf->Cell(54,10,$row->userName,1,0);
			$pdf->Cell(54,10,$row->carPlate,1,0);
			$pdf->Cell(56,10,$row->transportDate,1,0);
			$pdf->Cell(56,10,$stat,1,1);
		}
		$pdf->Output();
    }
}
