<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Book extends CI_Controller {
  function index(){
    $this->load->view("books/index");
  }
}
