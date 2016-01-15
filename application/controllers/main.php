<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {

	public function index(){
		$this->user_model->authorize();
		$this->load->view('main');
	}
	// function search(){ /*Ajax responder*/
	// 	$keyword = strtolower($this->input->post('key'));
	// 	$query = $this->db->query('SELECT dictionary.*, pos.abbraviation FROM dictionary INNER JOIN pos on pos.id = dictionary.pos_id where word like "'.$keyword.'%" ');
	// 	echo json_encode($query->result());
	// }
	// function translate_word(){ /*ajax responder*/
	// 	$id = $this->input->post('id');
	// 	$query = $this->db->query("SELECT * from dictionary INNER JOIN pos on pos.id = dictionary.pos_id where dictionary.id = ".$id." ");
	// 	echo json_encode($query->result());
	// }
	
}
