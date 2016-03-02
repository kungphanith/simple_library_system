<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Borrowing extends CI_Controller {
  function index(){
    $this->user_model->authorize();
    $this->load->model('borrowing_model');
    $this->load->model('book_model');
    $this->load->model('student_model');

    $data["borrowings"] = $this->borrowing_model->all();
    $data["books"] = $this->book_model->all();
    $data["students"] = $this->student_model->all();
    
    $this->load->view("borrowings/index", $data);
  }
  function create(){ /*ajax responder*/
    $this->user_model->authorize();

    $user_id = $this->session->userdata('id');
  	$data = array(
      'book_id' => $this->input->post('book_id') , 
  		'student_id' => $this->input->post('student_id') , 
  		'lend_by' => $user_id,
  		'borrow_at' => $this->input->post('borrow_at') , 
  		'returned_at' => $this->input->post('returned_at'),
      'is_inroom' => $this->input->post('is_inroom')
  	);
  	$this->load->model('borrowing_model');
  	$data = $this->borrowing_model->create($data);
    echo json_encode($data);
  }
  function update(){ /*ajax responder*/
    $this->user_model->authorize();
    $id= $this->input->post('id');
    $data = array(
      'title' => $this->input->post('title') , 
      'author_name' => $this->input->post('author_name') , 
      'publisher' => $this->input->post('publisher') , 
      'category_id' => $this->input->post('category_id') , 
      'year' => $this->input->post('year') , 
      'other' => $this->input->post('other'),
      'updated_at' => $this->date->get_date_now(),
      );
    $this->load->model('borrowing_model');
    $data = $this->borrowing_model->update($id,$data);
    echo json_encode($data);
  }
  function delete(){ /*ajax Rsponder*/
    $this->user_model->authorize();
    $this->load->model('borrowing_model');
    if ($this->borrowing_model->delete($this->input->post('id'))){
      echo 1;  
    }
    else{
      echo 0;
    }
  }

  function search(){
    $keyword = $this->input->post('keyword');
    $this->load->model('borrowing_model');
    $query = $this->borrowing_model->search($keyword);
    echo json_encode($query->result());
  }

  function do_return_book(){
    $id= $this->input->post('id');
    $data = array( 
      'recieved_at' => $this->input->post('returned_at'),
      'is_returned' => true,
      'recieved_by' => $this->session->userdata("id")
      );
    $this->load->model('borrowing_model');
    if ($this->borrowing_model->update($id, $data)){
      echo 1;
    }
    else{
      echo 0;
    }
  }
}
