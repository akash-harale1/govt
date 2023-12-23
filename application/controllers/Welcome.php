<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('login', $data);
	}
	public function Login()
	{
		if (isset($_POST['login'])) {
			$contact = $this->input->post('contact');
			$pwd = $this->input->post('pwd');

			if ($pwd && $contact) {
				$checkUser = $this->UserModel->checkUser($contact, $pwd);

				if ($checkUser) {
					$this->load->helper('string');
					$token = random_string('alnum', 10);
					$this->UserModel->updateLoginToken($token, $checkUser->admin_id);

					$this->session->set_userdata("token", $token);
					redirect("Admin");
				} else {
					$this->session->set_flashdata('result', '<div class="text-danger">Wrong Login Credential</div>');
					redirect("Login");
				}
			} else {
				$this->session->set_flashdata('result', '<div class="text-danger">All Data Required</div>');
				redirect("Login");
			}
		} else {
			$data['title'] = "Login";
			$this->load->view('login', $data);
		}
	}
	public function logout()
	{
		session_destroy();
		redirect("Welcome/Login");
	}

}
