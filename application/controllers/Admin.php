<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	var $userRow;
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('MemberModel');

		if ($this->session->userdata('token')) {
			$this->userRow = $this->db->query("SELECT * FROM users WHERE logintoken='" . $this->session->userdata('token') . "'")->row();
			if (!$this->userRow)
				redirect("");
		} else
			redirect("");
	}

	public function index()
	{
		$this->header("Dashboard");
		$toDay = date('Y-m-d');
		$data['members'] = $this->db->query("SELECT COUNT(*) as cnt FROM members")->row()->cnt;
		$data['birthday'] = $this->db->query("SELECT COUNT(*) as cnt FROM members WHERE birthday LIKE '$toDay%'")->row()->cnt;
		$data['ann'] = $this->db->query("SELECT COUNT(*) as cnt FROM members WHERE anniversary LIKE '$toDay%'")->row()->cnt;
		$data['dann'] = $this->db->query("SELECT COUNT(*) as cnt FROM members WHERE deathann LIKE '$toDay%'")->row()->cnt;
		$this->load->view('dashboard', @$data);
		$this->load->view('include/footer');
	}

	public function header($title = "")
	{
		$data['title'] = $title;
		$data['user'] = $this->userRow;
		$this->load->view('include/header', $data);
		$this->load->view('include/menu', $data);
	}



	public function User($edit = 0)
	{
		if (isset($_POST['save'])) {
			$name = $this->input->post("name");
			$contact = $this->input->post("contact");
			$email = $this->input->post("email");
			$address = $this->input->post("address");
			$pwd = $this->input->post("pwd");
			$parentuser = $this->userRow->id;
			$status = $this->input->post("status");
			$role = $this->input->post("role");

			if ($name && $contact && $pwd && $role && $status) {
				$data = array(
					'name' => $name,
					'contact' => $contact,
					'email' => $email,
					'address' => $address,
					'pwd' => $pwd,
					'parentuser' => $parentuser,
					'status' => $status,
					'role' => $role
				);

				$UserID = $this->UserModel->storeUser($data);
				if ($UserID > 0)
					$this->session->set_flashdata('result', '<div class="text-success">User Saved....</div>');
				else
					$this->session->set_flashdata('result', '<div class="text-danger">Error in data saving....</div>');
			} else
				$this->session->set_flashdata('result', '<div class="text-danger">All Data Required</div>');

			redirect("Admin/User");
		} else {

			if ($edit > 0) {
				$this->header("Edit User");
				$data['edit'] = $this->UserModel->getUser($edit);
			} else
				$this->header("Add User");

			$this->load->view('user/add', @$data);
			$this->load->view('include/footer');
		}
	}


	public function UserList()
	{
		$this->header("User List");
		$data['users'] = $this->UserModel->getUsers();
		$this->load->view('user/list', $data);
		$this->load->view('include/footer');
	}


	public function members($edit = 0)
	{
		if (isset($_POST['save'])) {
			$name = $this->input->post("name");
			$marathi_name = $this->input->post("marathi_name");
			$contact = $this->input->post("contact");
			$birthday = $this->input->post("birthday");

			$anniversary = $this->input->post("anniversary");
			$deathann = $this->input->post("deathann");
			$iddate = date('Y-m-d H:i:s');

			if ($name && $contact) {
				$data = array(
					'iddate' => $iddate,
					'name' => $name,
					'marathi_name' => $marathi_name,
					'contact' => $contact,
					'birthday' => $birthday,
					'anniversary' => $anniversary,
					'deathann' => $deathann
				);
				if ($edit > 0) {
					$BcID = $this->MemberModel->update($data, $edit);
					if ($BcID > 0)
						$this->session->set_flashdata('result', '<div class="text-success">Member Updated....</div>');
					else
						$this->session->set_flashdata('result', '<div class="text-danger">Error in Member Update....</div>');
				} else {
					$ID = $this->MemberModel->storeMember($data);
					if ($ID > 0)
						$this->session->set_flashdata('result', '<div class="text-success">Member Saved....</div>');
					else
						$this->session->set_flashdata('result', '<div class="text-danger">Error in Member saving....</div>');
				}
			} else
				$this->session->set_flashdata('result', '<div class="text-danger">All Data Required</div>');

			redirect("Admin/members");
		} else {

			if ($edit > 0) {
				$this->header("Edit Member");
				$data['edit'] = $this->MemberModel->get($edit);
			} else
				$this->header("Add Member");
			$this->load->view('member/add', @$data);
			$this->load->view('include/footer');
		}
	}

	public function membersList()
	{
		$this->header("Members List");
		$data['members'] = $this->MemberModel->getMembers();
		$this->load->view('member/list', $data);
		$this->load->view('include/footer');
	}
}
