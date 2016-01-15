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
	function delete($id){
		$this->db->where('id', $id);
		if ($this->db->delete('student')){
			return true;
		}
		else{
			return false;
		}
	}
	function generate_code($id){
    $id = str_pad($id, 4, '0', STR_PAD_LEFT);
    return "LBP".$id;
  }
}
?>
