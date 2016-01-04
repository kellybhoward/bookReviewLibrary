<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Model {

	public function __construct(){
		parent:: __construct();
	}

	//validate author. If returns false, it doesn't exist so then you should add the author. If does exist, should get the author id to send to add book
	public function does_author_exist($author_name){
		return $this->db->query("SELECT name, author_id FROM authors WHERE name =?", $author_name)->row_array();
	}

	//get all authors
	public function get_all_authors(){
		return $this->db->query("SELECT name, author_id FROM authors")->result_array();
	}

	//adding new author
	public function add_author($author_info){
		$query = "INSERT INTO authors (name) VALUES (?)";
		$values = [$author_info['name']];
		return $this->db->query($query, $values);
	}

	public function get_author_id_by_name($author_name){
		return $this->db->query("SELECT author_id
								FROM authors
								WHERE name=?", $author_name)->row_array();
	}

	public function add_user($user_info)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, review_count) VALUES (?, ?, ?, ?, ?)";
		$values = [$user_info['first_name'], $user_info["last_name"], $user_info['email'], $user_info['password'], '0'];
		return $this->db->query($query, $values);
	}
}
?>