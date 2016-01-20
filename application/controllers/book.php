<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Book extends CI_Controller {
  function index(){
    $this->user_model->authorize();
    $this->load->model('book_model');
    $this->load->model('book_category_model');
    $data["books"] = $this->book_model->all();
    $data["book_categories"] = $this->book_category_model->all();
    $this->load->view("books/index", $data);
  }
  function create(){ /*ajax responder*/
    $this->user_model->authorize();
  	$data = array(
      'title' => $this->input->post('title') , 
  		'author_name' => $this->input->post('author_name') , 
  		'publisher' => $this->input->post('publisher') , 
  		'category_id' => $this->input->post('category_id') , 
      'quantity' => $this->input->post('quantity') , 
  		'year' => $this->input->post('year') , 
  		'other' => $this->input->post('other'),
      'created_at' => $this->date->get_date_now(),
      'is_deleted' => false
  		);
  	$this->load->model('book_model');
  	$data = $this->book_model->create($data);
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
      'quantity' => $this->input->post('quantity') , 
      'year' => $this->input->post('year') , 
      'other' => $this->input->post('other'),
      'updated_at' => $this->date->get_date_now(),
      );
    $this->load->model('book_model');
    $data = $this->book_model->update($id,$data);
    echo json_encode($data);
  }
  function delete(){ /*ajax Rsponder*/
    $this->user_model->authorize();
    $this->load->model('book_model');
    if ($this->book_model->delete($this->input->post('id'))){
      echo 1;  
    }
    else{
      echo 0;
    }
  }

  function search(){
    $keyword = $this->input->post('keyword');
    $this->load->model('book_model');
    $result = $this->book_model->search($keyword);
    echo json_encode($result);
  }
}
