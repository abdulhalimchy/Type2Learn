<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Text_Model');
		$this->load->model('User_Model');
	}

	public function index()
	{
		
		redirect(base_url()."typing-speed");

	}

	public function set_text()
	{
		$data['username']=$this->session->userdata('username');
		if($this->session->userdata('username')!='')
			$this->load->view('header_after_login_view',$data);
		else
			$this->load->view('header_before_login_view');

		/*:::::Selecting random text:::::*/
		$query=$this->Text_Model->get_text();
		$num = mt_rand(0, $query->num_rows()-1);
		$res = $query->result();
		$txt = $res[$num]->txt;
		$data['text']=$txt;
		$this->load->view('typing_view',$data);
		$this->load->view('footer_view');
	}



	public function sign_in()
	{
		if($this->session->userdata('username')!='')
			redirect(base_url()."profile");
		else
		{
			$this->load->view('header_before_login_view');
			$this->load->view('signin_view');
			$this->load->view('footer_view');
		}
	}

	public function signin_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//load model if not autoload
			
			if($this->User_Model->can_login($username, $password))
			{
				$userId=$this->User_Model->get_userId($username);
				$session_data = array(
					'username' => $username,
					'userId' => $userId
				);
				$this->session->set_userdata($session_data);
				redirect(base_url()."profile");
			}
			else
			{
				$this->session->set_flashdata('error', "Invalid username or password");
				redirect(base_url()."signin");
			}
		}
		else
		{
			$this->sign_in();
		}
	}


	public function signup_validation(){
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('username', 'username', 'required');
		// $this->form_validation->set_rules('email', 'email', 'required');

		$username = $this->input->post('username');
		$email = $this->input->post('email');

		$a = $this->User_Model->isUsernameAvailable($username);
		$b =  $this->User_Model->isEmailAvailable($email);

		if($a && $b)
		{

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			// $daetOfbirth = $this->input->post('daetOfbirth');
			$password = $this->input->post('password');
			// $securityQ1 = $this->input->post('securityQ1');
			// $securityQ2 = $this->input->post('securityQ2');
			$data = array(
				'name' => $name,
				'userName' => $username,
				'email' => $email,
				// 'dateOfBirth' => $daetOfbirth,
				'password' => $password
				// 'question1Answer' => $securityQ1,
				// 'question2Answer' => $securityQ2
			);
			$this->User_Model->sign_up($data);
			$this->session->set_flashdata('done', 'Signed up successfully, You can sign in!');
			redirect(base_url()."signin");
		}
		else
		{
			if($a==false)
				$this->session->set_flashdata('error2', 'This username is not available');

			if($b==false)
				$this->session->set_flashdata('error1', 'This email is registered already');
			redirect(base_url()."signup");
		}
	}


	public function sign_up()
	{
		$this->load->view('header_before_login_view');
		$this->load->view('signup_view');
		$this->load->view('footer_view');
	}

	public function enter()
	{

		if($this->session->userdata('username')!='')
		{
			$this->set_text();
			
		}
		else
		{
			redirect(base_url()."signin");
		}
	}

	public function sign_out()
	{
		$this->session->unset_userdata('username');

		redirect(base_url()."signin");
	}


	public function rank_list()
	{
		$res =$this->User_Model->get_rank_list();
		$data['ranklist']=$res;
		$username=$this->session->userdata('username');
		$data['username']=$username;
		$rnk=1;
		foreach ($res as $value) {
			if($value->userName==$username)
				break;
			$rnk++;
		}
		if($this->session->userdata('username')!='')
			$data['yourRank']="Your rank is #".$rnk;
		else
			$data['yourRank']="";

		if($this->session->userdata('username')!='')
			$this->load->view('header_after_login_view',$data);
		else
			$this->load->view('header_before_login_view');
		$this->load->view('ranklist_view', $data);
		$this->load->view('footer_view');

	}


	public function typing_history()
	{
		
		if($this->session->userdata('username')!='')
		{
			$username=$this->session->userdata('username');
			$userId=$this->session->userdata('userId');
			$res =$this->User_Model->get_typing_history($userId);
			$data['typinglist']=$res;
			$data['username']=$username;

			$this->load->view('header_after_login_view',$data);
			$this->load->view('typing_history_view', $data);
			$this->load->view('footer_view');
		}
		else
			redirect(base_url()."signin");
		

	}

	public function save_speed_acc()
	{
		if($this->session->userdata('username')!='')
		{
			$userId = $this->session->userdata('userId');
			$speed = $this->input->post('speed');
			$acc = $this->input->post('acc');
			$data = array(
				'userId'=> $userId,
				'speed'=> $speed,
				'accuracy' => $acc
			);
			$this->User_Model->insert_typing_history($data);
		}
		redirect(base_url()."typing-speed");
	}
}
