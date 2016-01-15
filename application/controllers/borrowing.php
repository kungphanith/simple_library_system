<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Borrowing extends CI_Controller {
  function index(){
    $this->load->view("Borrowings/index");
  }
}
