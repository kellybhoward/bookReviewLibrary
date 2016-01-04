<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('book');
	}

	public function index()
	{
		redirect("/");
	}

	public function book_profile($id)
	{
		$book_info = $this->book->get_book_by_id($id);
		$this->load->model('review');
		$book_reviews = $this->review->get_reviews_by_book($id);
		array_reverse($book_reviews);
		$data = ["book_info"=>$book_info, "book_reviews"=>$book_reviews];
		$this->load->view("book_profile", $data);
	}
}
/* End of file books.php */
/* Location: ./application/controllers/books.php */