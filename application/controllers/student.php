<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student extends CI_Controller {
  function index(){
    $this->user_model->authorize();
    $this->load->model('student_model');
    $data["students"] = $this->student_model->all();
    $this->load->view("students/index", $data);
  }
  function create(){ /*ajax responder*/
    $this->user_model->authorize();
  	$data = array(
      'name_khmer' => $this->input->post('name_khmer') , 
  		'latin_name' => $this->input->post('latin_name') , 
  		'gender' => $this->input->post('gender') , 
  		'phone' => $this->input->post('phone') , 
  		'email' => $this->input->post('email') , 
  		'dob' => $this->input->post('dob') ,
  		'school_name' => $this->input->post('school_name') , 
  		'other' => $this->input->post('other'),
      'created_at' => $this->date->get_date_now(),
      'updated_at' => $this->date->get_date_now(),
      'is_deleted' => false


  		);
  	$this->load->model('student_model');
  	$data = $this->student_model->create($data);
    echo json_encode($data);
  }
  function update(){ /*ajax responder*/
    $this->user_model->authorize();
    $id= $this->input->post('id');
    $data = array(
      'name_khmer' => $this->input->post('name_khmer') , 
      'latin_name' => $this->input->post('latin_name') , 
      'gender' => $this->input->post('gender') , 
      'phone' => $this->input->post('phone') , 
      'email' => $this->input->post('email') , 
      'dob' => $this->input->post('dob') ,
      'school_name' => $this->input->post('school_name') , 
      'other' => $this->input->post('other'),      
      'updated_at' => $this->date->get_date_now()
      );
    $this->load->model('student_model');
    $data = $this->student_model->update($id,$data);
    echo json_encode($data);
  }
  function delete(){ /*ajax Rsponder*/
    $this->user_model->authorize();
    $this->load->model('student_model');
    if ($this->student_model->delete($this->input->post('id'))){
      echo 1;  
    }
    else{
      echo 0;
    }
  }

  function search(){
    $keyword = $this->input->post('keyword');
    $this->load->model('student_model');
    $result = $this->student_model->search($keyword);
    echo json_encode($result);
  }
  
  
}
