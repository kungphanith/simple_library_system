<?php
class Dictionary_model extends CI_Model{
	function add_word($word, $pos, $description){
		$dic = array('word' => $word ,'pos_id'=> $pos, 'description' => $description );
		if($this->db->insert('dictionary', $dic)){
			return true;
		}
		else {
			return false;
		}
	}

	function edit_word($id, $word, $pos, $description){
		$dic = array('word' => $word ,'pos_id'=> $pos, 'description' => $description );
		$this->db->where('id', $id);
		if($this->db->update('dictionary', $dic)){
			return true;
		}
		else {
			return false;
		}
	}

}
?>