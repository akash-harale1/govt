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
		$this->load->model('FamilyModel');
		$this->load->model('PersonModel');
		$this->load->model('NotificationModel');
		$this->load->model('BroadcastModel');
		$this->load->model('NewsModel');
		$this->load->model('DashboardModel');
		$this->load->library("uuid");

		if ($this->session->userdata('token')) {
			$this->userRow = $this->db->query("SELECT * FROM admin WHERE logintoken='" . $this->session->userdata('token') . "'")->row();
			if (!$this->userRow)
				redirect("Welcome");
		} else
			redirect("Welcome");
	}

	public function index()
	{
		$data = $this->DashboardModel->get_data();

		$this->header("Dashboard");
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



	public function Family($option = null, $id = 0)
	{
		if (isset($_POST['save'])) {

			$this->form_validation->set_rules("home_id", "home id", "required|trim");
			$this->form_validation->set_rules("ration_card_no", "ration card", "required|trim");
			$this->form_validation->set_rules("address", "address", "required|trim");

			if ($this->form_validation->run() == false) {

				$data["data"] = $this->input->post();
				$this->header("Add user");
				$this->load->view("family/add_family", $data);
				$this->load->view("include/footer");
			} else {

				if ($option == null) {

					$result = $this->FamilyModel->add_family($this->input->post());
					if ($result) {

						$this->session->set_flashdata("success", "Family added successfully !!!");
						redirect("Admin/Family");
					}
				} else if ($option == "edit") {
					$data  = $this->input->post();
					$result = $this->FamilyModel->update_family($data, $id);
					if ($result) {
						$this->session->set_flashdata("success", "Updated Successfully !!!");
						redirect("Admin/FamilyList");
					}
				}
			}
		} else {

			if ($option == "edit") {

				$this->header("Edit User");
				$data = $this->FamilyModel->get_family($id);
				$data["data"] = $data[0];
				unset($data[0]);
				$data["data"]["edit"] = 1;

				$this->load->view('family/add_family', $data);
				$this->load->view('include/footer');
			} else if ($option == "delete") {


				$result = $this->FamilyModel->delete_family($id);
				if ($result) {
					$this->session->set_flashdata("success", "Record Deleted Successfully");
					redirect("Admin/FamilyList");
				}
			} else {

				$this->header("Add User");
				$this->load->view('family/add_family');
				$this->load->view('include/footer');
			}
		}
	}

	public function Person($option = null, $id = 0)
	{
		if (isset($_POST['save'])) {

			$this->form_validation->set_rules("first_name", "first name", "required|trim");
			$this->form_validation->set_rules("last_name", "last name", "required|trim");
			$this->form_validation->set_rules("middle_name", "middle name", "required|trim");
			$this->form_validation->set_rules("mobile", "mobile number", "required|exact_length[10]|trim");
			$this->form_validation->set_rules("pan_no", "pan card number", "required|exact_length[10]|trim");
			$this->form_validation->set_rules("aadhar_no", "aadhar card number", "required|exact_length[12]|trim");
			$this->form_validation->set_rules("ayushmaan_bharat_card_no", "ayushmaan card number", "required|trim");
			$this->form_validation->set_rules("abha_card_no", "abha card number", "required|trim");
			$this->form_validation->set_rules("date_of_birth", "birth date ", "required");
			$this->form_validation->set_rules("family_id", "family_ID", "required|trim");


			if ($this->form_validation->run() == false) {


				$data["data"] = $this->input->post();

				$this->header("Add person");

				$this->load->view("person/add_person", $data);
				$this->load->view("include/footer");
			} else {
				$r = $this->PersonModel->check_family_id($this->input->post("family_id"));

				if ($r > 0) {
					if ($option == null) {

						$result = $this->PersonModel->add_person($this->input->post());
						if ($result) {

							$this->session->set_flashdata("success", "Person added successfully !!!");
							redirect("Admin/Person");
						}
					} else if ($option == "edit") {
						$data  = $this->input->post();
						$result = $this->PersonModel->update_person($data, $id);
						if ($result) {
							$this->session->set_flashdata("success", "Person Updated Successfully !!!");
							redirect("Admin/PersonList");
						}
					}
				} else {
					$this->session->set_flashdata("error", "family id does not exist !!!");
					$data["data"] = $this->input->post();
					$this->header("Add person");
					$this->load->view("person/add_person", $data);
					$this->load->view("include/footer");
				}
			}
		} else {

			if ($option == "edit") {

				$this->header("Edit User");
				$data = $this->PersonModel->get_person($id);
				$data["data"] = $data[0];
				unset($data[0]);
				$data["data"]["edit"] = 1;

				$this->load->view('Person/add_person', $data);
				$this->load->view('include/footer');
			} else if ($option == "delete") {

				$result = $this->PersonModel->delete_person($id);
				if ($result) {
					$this->session->set_flashdata("success", "Record Deleted Successfully");
					redirect("Admin/PersonList");
				}
			} else {

				$this->header("Add Person");
				$this->load->view('person/add_person');
				$this->load->view('include/footer');
			}
		}
	}

	public function FamilyList()
	{



		$this->header("Family List");
		$data['family'] = $this->FamilyModel->get_families();
		$this->load->view('family/list', $data);
		$this->load->view('include/footer');
	}







	public function PersonList()
	{



		$this->header("Person List");
		$data['person'] = $this->PersonModel->get_persons();
		$this->load->view('person/list', $data);
		$this->load->view('include/footer');
	}










	public function NotificationList()
	{

		$this->header("Notification List");
		$data['notification'] = $this->NotificationModel->get_notifications();
		$this->load->view('notification/list', $data);
		$this->load->view('include/footer');
	}




	public function Notification($option = null, $id = 0)
	{
		if (isset($_POST['save'])) {

			$this->form_validation->set_rules("header", "header", "required|trim");
			$this->form_validation->set_rules("text", "text", "required|trim");
			$this->form_validation->set_rules("person_id", "person id", "required|trim");



			if ($this->form_validation->run() == false) {


				$data["data"] = $this->input->post();
				$this->header("Add Notification");
				$this->load->view("notification/add_notification", $data);
				$this->load->view("include/footer");
			} else {
				$r = $this->NotificationModel->check_person_id($this->input->post("person_id"));

				if ($r > 0) {
					if ($option == null) {

						$result = $this->NotificationModel->add_notification($this->input->post());
						if ($result) {

							$this->session->set_flashdata("success", "Notification added successfully !!!");
							redirect("Admin/Notification");
						}
					}
				} else {
					$this->session->set_flashdata("error", "person id does not exist !!!");
					$data["data"] = $this->input->post();
					$this->header("Add Notification");
					$this->load->view("notification/add_notification", $data);
					$this->load->view("include/footer");
				}
			}
		} else {

			if ($option == "delete") {

				$result = $this->NotificationModel->delte_notification($id);
				if ($result) {
					$this->session->set_flashdata("success", "Record Deleted Successfully");
					redirect("Admin/NotificationList");
				}
			} else {
				$this->header("Add Notification");
				$this->load->view('notification/add_notification');
				$this->load->view('include/footer');
			}
		}
	}

	public function BroadcastList()
	{

		$this->header("Broadcast List");
		$data['broadcast'] = $this->BroadcastModel->get_broadcasts();
		$this->load->view('broadcast/list', $data);
		$this->load->view('include/footer');
	}







	public function Broadcast($option = null, $id = 0)
	{
		if (isset($_POST['save'])) {

			$this->form_validation->set_rules("header", "header", "required|trim");
			$this->form_validation->set_rules("text", "text", "required|trim");


			if ($this->form_validation->run() == false) {


				$data["data"] = $this->input->post();
				$this->header("Add Broadcast");
				$this->load->view("broadcast/add_broadcast", $data);
				$this->load->view("include/footer");
			} else {



				if ($option == null) {

					$result = $this->BroadcastModel->add_broadcast($this->input->post());
					if ($result) {

						$this->session->set_flashdata("success", "Broadcast added successfully !!!");
						redirect("Admin/Broadcast");
					}
				}
			}
		} else {

			if ($option == "delete") {

				$result = $this->BroadcastModel->delete_broadcast($id);
				if ($result) {
					$this->session->set_flashdata("success", "Record Deleted Successfully");
					redirect("Admin/BroadcastList");
				}
			} else {
				$this->header("Add Broadcast");
				$this->load->view('broadcast/add_broadcast');
				$this->load->view('include/footer');
			}
		}
	}







	// News

	public function file_check($str)
	{
		if ($_FILES['news_image']['size'] > 0) {
			$allowed_extensions = array('jpeg', 'jpg', 'png');
			$file_extension = pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION);

			if (!in_array($file_extension, $allowed_extensions)) {
				$allowed_extensions_str = implode(', ', $allowed_extensions);
				$this->form_validation->set_message('file_check', 'The file must be a ' . $allowed_extensions_str . ' image.');
				return FALSE;
			}

			// Check file size
			$max_size_kb = 5120; // 5 MB in kilobytes
			if ($_FILES['news_image']['size'] > $max_size_kb * 1024) {
				$this->form_validation->set_message('file_check', 'The file size must be less than 5MB.');
				return FALSE;
			}

			return TRUE;
		} else {
			$this->form_validation->set_message('file_check', 'The image is required.');
			return FALSE;
		}
	}

	public function News($option = null, $id = 0)
	{
		if (isset($_POST['save'])) {

			$this->form_validation->set_rules("news_header", "news header", "required|trim");
			$this->form_validation->set_rules("news_text", " news text", "required|trim");
			if ($option == null) {
				$this->form_validation->set_rules('news_image', 'image/document', 'callback_file_check');
			}

			if ($this->form_validation->run() == false) {



				$data["data"] = $this->input->post();

				$this->header("Add News");

				$this->load->view("news/add_news", $data);
				$this->load->view("include/footer");
			} else {

				$config["upload_path"] = './uploads';
				$config["allowed_types"] = 'jpg|png|jpeg';
				$config['max_size'] =  5120;
				$config['file_name'] = $this->uuid->v4();
				$this->load->library('upload', $config);



				if ($option == null) {


					if (!$this->upload->do_upload('news_image')) {
						$error =  $this->upload->display_errors();
					} else {
						$data = $this->upload->data();
						$postdata = $this->input->post();
						$postdata['news_image'] = 'uploads/' . $data['file_name'];

						$result = $this->NewsModel->add_news($postdata);
						if ($result) {

							$this->session->set_flashdata("sucess", "News added successfully !!!");
							redirect("Admin/News");
						}
					}
				} else if ($option == "edit") {
					$prev_data = $this->NewsModel->get_news($id);
					$postdata = $this->input->post();


					if ($_FILES["news_image"]["name"] != "") {
						unlink(FCPATH . $prev_data[0]["news_image"]);
						if (!$this->upload->do_upload('news_image')) {
							$error =  $this->upload->display_errors();

							print_r($error);
						} else {

							$data = $this->upload->data();

							$postdata['news_image'] = 'uploads/' . $data['file_name'];
						}
					}

					$result = $this->NewsModel->update_news($postdata, $id);
					if ($result) {
						$this->session->set_flashdata("success", "News Updated Successfully !!!");
						redirect("Admin/NewsList");
					}
				}
			}
		} else {

			if ($option == "edit") {

				$this->header("Edit User");
				$data = $this->NewsModel->get_news($id);
				$data["data"] = $data[0];
				unset($data[0]);
				$data["data"]["edit"] = 1;

				$this->load->view('News/add_news', $data);
				$this->load->view('include/footer');
			} else if ($option == "delete") {
				$prev_data = $this->NewsModel->get_news($id);
				unlink(FCPATH . $prev_data[0]["news_image"]);

				$result = $this->NewsModel->delete_news($id);
				if ($result) {
					$this->session->set_flashdata("success", "Record Deleted Successfully");
					redirect("Admin/NewsList");
				}
			} else {

				$this->header("Add News");
				$this->load->view('news/add_news');
				$this->load->view('include/footer');
			}
		}
	}

	public function NewsList()
	{
		$this->header("News List");
		$data['news'] = $this->NewsModel->get_newses();
		$this->load->view('news/list', $data);
		$this->load->view('include/footer');
	}
}
