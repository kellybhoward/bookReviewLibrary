<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends CI_Model {

	public function __construct(){
		parent:: __construct();
	}

	//Get three book reviews, descending soonest first, need book title, user name, review, date review
	public function most_recent_reviews(){
		return $this->db->query("SELECT books.title, books.book_id, rating, users.first_name, users.user_id, review, date_format(reviews.created_at, '%b %D %Y') as created_at
								FROM reviews
								JOIN books ON reviews.book_id = books.book_id
								JOIN users ON reviews.user_id = users.user_id
								ORDER BY review_id DESC
								LIMIT 0,3")->result_array();
	}

	//all reviews for one book
	public function get_reviews_by_book($book_id){
		return $this->db->query("SELECT rating, users.first_name, users.user_id, review, review_id, date_format(reviews.created_at, '%b %D %Y') as created_at
								FROM reviews
								JOIN users ON reviews.user_id = users.user_id
								WHERE reviews.book_id =?
								ORDER BY review_id DESC", $book_id)->result_array();
	}

	public function add_review($review_info){
		$query = "INSERT INTO reviews (review, rating, user_id, book_id, created_at) 
					VALUES (?, ?, ?, ?, NOW())";
		$values = [$review_info['review'], $review_info['rating'], $review_info['user_id'], $review_info['book_id']];
		return $this->db->query($query, $values);
	}

	public function delete_review($review_id){
		return $this->db->query("DELETE FROM reviews 
									WHERE review_id=?", $review_id);
	}
}
?>