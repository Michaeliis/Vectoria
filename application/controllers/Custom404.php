<?php
class Custom404  extends CI_Controller
{
	public function show_404()
    {
        $CI =& get_instance();
        $CI->load->view('my_notfound_view');
        echo $CI->output->get_output();
        exit;
    }
 
	public function index()
	{
		$this->load->view("err404");
	}
}
?>