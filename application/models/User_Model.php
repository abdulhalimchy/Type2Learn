<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


	public function can_login($username, $password)
	{
		$this->db->where('userName', $username);
		$this->db->where('password', $password);
		//SELECT * FROM tbl_admin where username='$username' AND password='$password';
		$query = $this->db->get('tbl_user');

		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function isUsernameAvailable($username)
	{
		$this->db->where('userName', $username);
		//SELECT * FROM tbl_admin where username='$username' AND password='$password';
		$query = $this->db->get('tbl_user');

		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function isEmailAvailable($email)
	{
		$this->db->where('email', $email);
		//SELECT * FROM tbl_admin where username='$username' AND password='$password';
		$query = $this->db->get('tbl_user');

		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function get_rank_list()
	{
		$st = "SELECT tbl_user.userId, userName, AVG(speed) AS avgSpeed, MAX(speed)AS bestSpeed, AVG(accuracy) AS avgAccuracy FROM tbl_user, tbl_racehistory WHERE tbl_user.userId=tbl_racehistory.userId GROUP BY tbl_racehistory.userId ORDER BY AVG(speed) DESC;";
		$query=$this->db->query($st);
		return $query->result();
	}


	public function sign_up($data)
	{
		$this->db->insert('tbl_user', $data);
	}


	public function	get_typing_history($userId)
	{
		$this->db->where('userId', $userId);
		$query = $this->db->get('tbl_racehistory');
		return $query->result();
	}

	public function get_userId($username)
	{
		$this->db->where('userName', $username);
		$query = $this->db->get('tbl_user');
		$res = $query->result();
		$id = $res[0]->userId;

		return $id;
	}

	public function insert_typing_history($data)
	{
		$this->db->insert('tbl_racehistory', $data);
	}
}
