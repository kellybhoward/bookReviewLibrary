<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authors extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model("author");
	}

	public function index()
	{
		redirect("/");
	}

	public function add()
	{
		$author_list = $this->author->get_all_authors();
		$data = ['author_list'=>$author_list, 'user_id'=>$this->session->userdata('user_id')];
		$this->load->view("add", $data);
	}
}
/* End of file authors.php */
/* Location: ./application/controllers/authors.php */