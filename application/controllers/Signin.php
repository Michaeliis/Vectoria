<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {
    
    function __construct(){
		parent::__construct();
        $this->load->model('m_basic');
        $this->load->library('session');
	}
    
	public function index()
	{
		$this->load->view('v_header_login');
        $this->load->view('v_signin');
        $this->load->view('v_footer');
	}
    
    public function check(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $where = array('userEmail' => $email,
                      'userPassword' => md5($password));
        $user = $this->m_basic->find('user', $where);
        
        if($user->num_rows() > 0){
            $userData = $user->result();
            foreach($userData as $userDatas){
                $_SESSION['userId'] = $userDatas->userId;
                $_SESSION['userPosition'] = $userDatas->userPosition;
                
                $arr = explode(' ',trim($userDatas->userName));
                $_SESSION['userName'] = $arr[0];
            }
            
            redirect(base_url('dashboard'));
        }else{
            $data['failLogin']=true;
            $this->load->view('v_header_login');
            $this->load->view('v_signin.php', $data);
            $this->load->view('v_footer.php');
        }
    }
    
    public function signout(){
        session_destroy();
        redirect('signin');
    }
}
