<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Text_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}



	public function get_text()
	{
		$query = $this->db->get('tbl_text');
		return $query;
	}

	// public function get_members()
	// {
	// 	$this->db->where('status', 1);
	// 	$query = $this->db->get('tbl_member');

	// 	return $query;
	// }
	
	// public function get_requests()
	// {
	// 	$this->db->where('status', 0);
	// 	$query = $this->db->get('tbl_member');

	// 	return $query;
	// }

	// public function delete_member($id)
	// {
	// 	 $this->db->delete('tbl_member', "id=".$id);
	// }

	// public function accept_member($id){
	// 	$this->db->set('status', 1);
	// 	$this->db->where('id', $id);
	// 	$this->db->update('tbl_member');
	// }

	
}
