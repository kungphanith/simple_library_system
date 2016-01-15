<?php
class User_model extends CI_Model{
	function authorize(){
		if(!$this->session->userdata('loged_in')){
			redirect(base_url().'authorize');
			echo 0;
		}
	}
	function do_login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('encrypted_password', sha1($password));
		$query = $this->db->get('user');
		if ($query->num_rows() > 0){
			$data['id'] = $query->row(0)->id;
			$data['name_khmer'] = $query->row(0)->full_name_kh;
			$data['loged_in'] = true;
			$this->session->set_userdata($data);
			return true;
		}
		else{
			return false;
		}
	}
	function clear_session(){
		$this->session->sess_destroy();
	}
}
?>
