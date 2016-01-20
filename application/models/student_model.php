<?php
class Student_model extends CI_Model{
	function all(){
		$this->db->where('is_deleted', false);
		$query = $this->db->get('student');
		return $query->result();
	}
	function create($data){
		$this->db->insert('student', $data);
		$id= $this->db->insert_id();
		$this->db->where("id", $id);
		$this->db->update("student", array('code' => $this->generate_code($id)));
		$this->db->where("id", $id);
		$query = $this->db->get('student');
		return $query->result();
	}
	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('student', $data);
		$this->db->where("id", $id);
		$query = $this->db->get('student');
		return $query->result();
	}
	function delete($id){
		$this->db->where('id', $id);
		if ($this->db->update('student', array('is_deleted' => true))){
			return true;
		}
		else{
			return false;
		}
	}
	function generate_code($id){
    $id = str_pad($id, 5, '0', STR_PAD_LEFT);
    return "LBP".$id;
  }
  function search($keyword){
  	$query = $this->db->query("SELECT * FROM student where student.name_khmer like '%".$keyword."%' or student.latin_name like '%".$keyword."%' or student.code like '%".$keyword."%' and student.is_deleted = false ");
  	return $query->result();
  }
}
?>
