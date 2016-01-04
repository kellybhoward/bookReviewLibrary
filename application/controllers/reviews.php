<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('review');
	}

	public function index()
	{
		redirect("/");
	}

	public function add_review()
	{
		if($this->input->post('custom_author_name') !== ""){
			$this->load->model("author");
			$result = $this->author->does_author_exist($this->input->post('custom_author_name'));
			if ($result == false)
			{
				$author = $this->input->post('custom_author_name');
				$author_info = ['name'=>$author];
				$this->load->model("author");
				$this->author->add_author($author_info);
				$author_info = $this->author->get_author_id_by_name($author);
				$author_id = $author_info['author_id'];
			} 
			else
			{
				$message = "That author is already in our database. Please select from the list.";
				$errors = ['message'=>$message];;
		    	$this->session->set_flashdata('errors', $errors);
		    	redirect("/authors/add");
			}
		}
		if (!isset($author_id))
		{ 
			$author_id = $this->input->post('author_id');
		}
		$this->load->model("book");
		$book_info = ['book_title'=>$this->input->post('book_title'), 'author_id'=>$author_id];
		
		$this->book->add_book($book_info);
		$book_id = $this->book->get_book_id_by_name($this->input->post('book_title'));
		$review_info = ['review'=>$this->input->post('review'), 'rating'=>$this->input->post('rating'), 'user_id'=>$this->session->userdata('user_id'), 'book_id'=>$book_id['book_id']];
		$this->review->add_review($review_info);
		
		$this->load->model('user');
		$user_id = $this->session->userdata('user_id');
		$user_info = $this->user->get_user_by_id($user_id);
		$review_count = $user_info['review_count']+1;
		$updated_count = ['review_count'=>$review_count, 'user_id'=>$user_id];
		$this->user->update_review_count($updated_count);

		redirect("books/book_profile/{$book_id['book_id']}");
	}

	public function add_review_to_book()
	{
		$book_id = $this->input->post('book_id');
		$review_info = ['review'=>$this->input->post('review'), 'rating'=>$this->input->post('rating'), 'book_id'=>$this->input->post('book_id'), 'user_id'=>$this->session->userdata['user_id']];
		$this->review->add_review($review_info);

		$this->load->model('user');
		$user_id = $this->session->userdata('user_id');
		$user_info = $this->user->get_user_by_id($user_id);
		$review_count = $user_info['review_count']+1;
		$updated_count = ['review_count'=>$review_count, 'user_id'=>$user_id];
		$this->user->update_review_count($updated_count);

		redirect("books/book_profile/$book_id");
	}
	
	public function delete_review($review_id, $book_id)
	{
		$this->review->delete_review($review_id);

		$this->load->model('user');
		$user_id = $this->session->userdata('user_id');
		$user_info = $this->user->get_user_by_id($user_id);
		$review_count = $user_info['review_count']-1;
		$updated_count = ['review_count'=>$review_count, 'user_id'=>$user_id];
		$this->user->update_review_count($updated_count);


		redirect("books/book_profile/$book_id");
	}
}
/* End of file reviews.php */
/* Location: ./application/controllers/reviews.php */