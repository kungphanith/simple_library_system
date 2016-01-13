<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dictionary extends CI_Controller {
	public function login(){
		$this->load->view('login');
	}
	function book_management(){
		$this->load->view('book_management');
	}

	public function index()
	{
		$this->load->view('main');
	}
	function search(){ /*Ajax responder*/
		$keyword = strtolower($this->input->post('key'));
		$query = $this->db->query('SELECT dictionary.*, pos.abbraviation FROM dictionary INNER JOIN pos on pos.id = dictionary.pos_id where word like "'.$keyword.'%" ');
		echo json_encode($query->result());
	}
	function translate_word(){ /*ajax responder*/
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * from dictionary INNER JOIN pos on pos.id = dictionary.pos_id where dictionary.id = ".$id." ");
		echo json_encode($query->result());
	}

	function edit(){
		$this->load->model('Pos');
		$data['pos'] = $this->Pos->get_all_pos();
		$this->load->view('edit', $data);
	}

	function do_add(){ /*Ajax respoder*/
		$word = strtolower($this->input->post('word'));
		$pos = $this->input->post('pos');
		$description = $this->input->post('description');

		$this->db->where('word', $word);
		$this->db->where('pos_id', $pos);
		$query = $this->db->get('dictionary');
		if($query->num_rows() > 0 ){
			echo 2;
			return 0;
		}

		if($word=="" or $pos=="" or $description==""){
			echo 0;
			return 0;
		}
		$this->load->model('dictionary_model');
		if($this->dictionary_model->add_word($word, $pos, $description)){
			echo 1;
		}
		else{
			echo 0;
		}
	}
	function do_edit(){ /*Ajax respoder*/
		$id = $this->input->post('id');
		$word = strtolower($this->input->post('word'));
		$pos = $this->input->post('pos');
		$description = $this->input->post('description');

		$this->db->where('id !=', $id);
		$this->db->where('word', $word);
		$this->db->where('pos_id', $pos);
		$query = $this->db->get('dictionary');
		if($query->num_rows() > 0 ){
			echo 2;
			return 0;
		}

		if($word=="" or $pos=="" or $description==""){
			echo 0;
			return 0;
		}
		$this->load->model('dictionary_model');
		if($this->dictionary_model->edit_word($id, $word, $pos, $description)){
			echo 1;
		}
		else{
			echo 0;
		}
	}

	function do_delete(){
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$query = $this->db->delete('dictionary');
		if ($this->db->affected_rows()){
			echo 1;
		}
		else{
			echo 0;
		}
	}
}
