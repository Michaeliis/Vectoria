<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tester extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
      $dob = "2019-04-01";
    $password = date_format(date_create($dob),"Ymd");
        echo $password;
    }
}
?>