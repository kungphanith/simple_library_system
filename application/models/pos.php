<?php
class Pos extends CI_Model{
	function get_all_pos(){
		$query = $this->db->get('pos');
		return $query->result();
	}
}
?>