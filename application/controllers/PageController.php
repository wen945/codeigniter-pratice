<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class PageController extends CI_Controller
{
  public function memberpage()
  {
    $this->load->view('templates/header.php');
    $this->load->view('memberpage.php');
    $this->load->view('templates/footer.php');
  }
  

}
