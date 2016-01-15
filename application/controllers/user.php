<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
  function index(){
    $this->load->view("users/index");
  }
  function is_loged_in(){
  	
  }
}
