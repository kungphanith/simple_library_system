<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authorize extends CI_Controller {
  function index(){
    $this->load->view("login");
  }
  function do_login(){
  	$username= $this->input->post('username');
  	$password = $this->input->post('password');
  	if ($this->user_model->do_login($username, $password)){
  		redirect(base_url()."main");
  	}
  	else{
  		$this->session->set_flashdata('error', "Incorected Username or Password!");
  		redirect(base_url()."authorize");
  	}
  }
  function logout(){
  	$this->user_model->clear_session();
  	redirect(base_url()."authorize");
  }
  
}
