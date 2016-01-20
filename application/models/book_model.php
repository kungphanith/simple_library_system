<?php
class Book_model extends CI_Model{
	function all(){
		$this->db->select('book.*, book_category.name as book_category_name');
		$this->db->from('book');
		$this->db->join('book_category', 'book_category.id = book.category_id', "left");
		$this->db->where("book.is_deleted", false);
		$query = $this->db->get();
		return $query->result();
	}
	function create($data){
		$this->db->insert('book', $data);
		$id= $this->db->insert_id();
		$this->db->where("id", $id);
		$this->db->update("book", array('code' => $this->generate_code($id)));

		$this->db->select('book.*, book_category.name as book_category_name');
		$this->db->from('book');
		$this->db->join('book_category', 'book_category.id = book.category_id', "left");
		$this->db->where("book.id", $id);
		$query = $this->db->get();
		return $query->result();
	}
	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('book', $data);
		$this->db->select('book.*, book_category.name as book_category_name');
		$this->db->from('book');
		$this->db->join('book_category', 'book_category.id = book.category_id', "left");
		$this->db->where("book.id", $id);

		$query = $this->db->get();
		return $query->result();
	}
	function delete($id){
		$this->db->where('id', $id);
		if ($this->db->update('book', array('is_deleted' => true))){
			return true;
		}
		else{
			return false;
		}
	}
	function generate_code($id){
    $id = str_pad($id, 5, '0', STR_PAD_LEFT);
    return "B".$id;
  }
  function search($keyword){
  	$query = $this->db->query("SELECT book.*, book_category.name as book_category_name FROM book 
  															LEFT JOIN book_category on book_category.id = book.category_id
  															where book.title like '%".$keyword."%' or book.author_name like '%".$keyword."%' or book.code like '%".$keyword."%' and book.is_deleted = false ");
  	return $query->result();
  }
}
?>
