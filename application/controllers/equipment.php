<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Equipment extends CI_Controller {
  function index(){
    $this->load->view("equipments/index");
  }
}
