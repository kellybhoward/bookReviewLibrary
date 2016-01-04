<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct(){
		parent:: __construct();
	}

	//validate registration
	public function validate_registration($post)
	{
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('first_name', 'First Name', 'trim|min_length[3]|alpha_dash|required|xss_clean');
	    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|min_length[3]|alpha_dash|required|xss_clean');
	    $this->form_validation->set_rules('email', 'Email', 'trim|is_unique[users.email]|valid_email|required');
	    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[confirm_password]|required|md5');
	    if($this->form_validation->run())
	    {
	    	return "valid";
	    }
	    else
	    {
	    	return array(validation_errors());
	    }
	}

	//add user once registration is valid
	public function add_user($user_info)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, review_count) VALUES (?, ?, ?, ?, ?)";
		$values = [$user_info['first_name'], $user_info["last_name"], $user_info['email'], $user_info['password'], '0'];
		return $this->db->query($query, $values);
	}

	//validate login form
	public function validate_login($login_info)
	{
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|callback_check_database');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	    if($this->form_validation->run())
	    {
	    	return "valid";
	    }
	    else
	    {
	    	return array(validation_errors());
	    }
	}

	//make sure user is unique and matches database before logging in
	public function login($email, $password)
	{
	    $this -> db -> select('email', 'password', 'id');
	    $this -> db -> from('users');
	    $this -> db -> where('email', $email);
	    $this -> db -> where('password', md5($password));
	    $this -> db -> limit(1);

	    $query = $this -> db -> get();

	    if($query -> num_rows() == 1)
	    {
	    	return $query->result();
	    }
	    else
	    {
	    	return false;
	    }
	}

	//get user for showing purposes
	public function get_user_by_email($email)
	{
		return $this->db->query("SELECT first_name, last_name, email, user_id, review_count
								FROM users
								WHERE email =?", $email)->row_array();
	}

	public function get_user_by_id($user_id)
	{
		return $this->db->query("SELECT first_name, last_name, email, user_id, review_count
								FROM users
								WHERE user_id=?", $user_id)->row_array();
	}

	//update review_count
	public function update_review_count($updated_count)
	{
		$sql = "UPDATE users SET review_count=? WHERE user_id=?";
		return $this->db->query($sql, $updated_count);
	}
}
?>
