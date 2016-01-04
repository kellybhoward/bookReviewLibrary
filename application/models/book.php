<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {

	public function __construct(){
		parent:: __construct();
	}

	public function get_books_with_reviews(){
		return $this->db->query("SELECT book_id, title FROM books")->result_array();
	}

	public function get_books_reviewed_by_user($user_id){
		return $this->db->query("SELECT books.book_id, title 
								FROM books 
								JOIN reviews ON books.book_id = reviews.book_id
								WHERE reviews.user_id =?", $user_id)->result_array();
	}

	public function get_book_by_id($book_id){
		return $this->db->query("SELECT book_id, title, authors.name
								FROM books
								JOIN authors ON books.author_id = authors.author_id
								WHERE books.book_id=?", $book_id)->row_array();
	}

	public function get_book_id_by_name($book_name){
		return $this->db->query("SELECT book_id
								FROM books
								WHERE title=?", $book_name)->row_array();
	}

	public function add_book($book_info){
		$query = "INSERT INTO books (title, author_id) VALUES (?, ?)";
		$values = [$book_info['book_title'], $book_info['author_id']];
		return $this->db->query($query, $values);
	}

	public function add_user($user_info)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, review_count) VALUES (?, ?, ?, ?, ?)";
		$values = [$user_info['first_name'], $user_info["last_name"], $user_info['email'], $user_info['password'], '0'];
		return $this->db->query($query, $values);
	}
}
?>