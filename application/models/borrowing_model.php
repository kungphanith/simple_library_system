<?php
class Borrowing_model extends CI_Model{
	function all(){
		$this->db->select('borrowing.* , student.name_khmer as student_name, lender.full_name_kh as lender_name, reciever.full_name_kh as reciever_name, book.title as book_title ');
		$this->db->from('borrowing');
		$this->db->join('student', 'student.id = borrowing.student_id', "left");
		$this->db->join('book', 'book.id = borrowing.book_id', "left");
		$this->db->join('user as lender', 'lender.id = borrowing.lend_by', "left");
		$this->db->join('user as reciever', 'reciever.id = borrowing.recieved_by', "left");
		$this->db->where("borrowing.is_deleted", false);
		$this->db->order_by("borrow_at", "desc"); 
		$query = $this->db->get();
		return $query->result();
	}
	function create($data){
		$this->db->insert('borrowing', $data);
		$id= $this->db->insert_id();
		
		$this->db->select('borrowing.*, student.name_khmer as student_name, lender.full_name_kh as lender_name, reciever.full_name_kh as reciever_name, book.title as book_title ');
		$this->db->from('borrowing');
		$this->db->join('student', 'student.id = borrowing.student_id', "left");
		$this->db->join('book', 'book.id = borrowing.book_id', "left");
		$this->db->join('user as lender', 'lender.id = borrowing.lend_by', "left");
		$this->db->join('user as reciever', 'reciever.id = borrowing.recieved_by', "left");
		$this->db->where("borrowing.is_deleted", false);
		$this->db->where("borrowing.id", $id);

		$query = $this->db->get();
		return $query->result();
	}
	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('borrowing', $data);

		$this->db->select('borrowing.* , student.name_khmer as student_name, lender.full_name_kh as lender_name, reciever.full_name_kh as reciever_name, book.title as book_title ');
		$this->db->from('borrowing');
		$this->db->join('student', 'student.id = borrowing.student_id', "left");
		$this->db->join('book', 'book.id = borrowing.book_id', "left");
		$this->db->join('user as lender', 'lender.id = borrowing.lend_by', "left");
		$this->db->join('user as reciever', 'reciever.id = borrowing.recieved_by', "left");
		$this->db->where("borrowing.is_deleted", false);
		$this->db->where("borrowing.id", $id);
		$this->db->order_by("borrow_at", "desc"); 
		$query = $this->db->get();

		return $query->result();
	}
	function delete($id){
		$this->db->where('id', $id);
		if ($this->db->update('borrowing', array('is_deleted' => true))){
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
  	
  	$query = $this->db->query('SELECT borrowing.* , student.name_khmer as student_name, lender.full_name_kh as lender_name, reciever.full_name_kh as reciever_name, book.title as book_title
		FROM borrowing
		LEFT JOIN student on student.id = borrowing.student_id
		LEFT JOIN book on book.id = borrowing.book_id
		LEFT JOIN user as lender on lender.id = borrowing.lend_by
		LEFT JOIN user as reciever on reciever.id = borrowing.recieved_by
		WHERE borrowing.is_deleted = false
		and student.name_khmer like "%'.$keyword.'%" or book.title like "%'.$keyword.'%"
		or borrowing.borrow_at like "%'.$keyword.'%"
		ORDER BY borrow_at desc');
  	return $query;
  }
}
?>
