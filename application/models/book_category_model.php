<?php
class Book_category_model extends CI_Model{
	function all(){
		$this->db->where('is_deleted', false);
		$query = $this->db->get('book_category');
		return $query->result();
	}
}
?>
