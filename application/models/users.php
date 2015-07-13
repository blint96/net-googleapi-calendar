<?php
class Users extends CI_Model 
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function generateSalt($max = 15) 
    {
	    $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&?";
	    $i = 0;
	    $salt = "";
	    while ($i < $max) {
	        $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
	        $i++;}
	   	return $salt;
    }

    function is_user_like_this($email)
    {
    	$query = $this->db->query("SELECT * FROM kdr_users WHERE user_email = '$email'");
    	if ($query->num_rows() > 0)
    		return true;
    	else
    		return false;
    }

    function add_user($email, $pass)
    {
    	$salt = $this->generateSalt();
    	$passhash = md5(md5($salt).md5($pass));
    	$this->db->query("INSERT INTO kdr_users VALUES(NULL, '$email', '$passhash', '$salt')");
    	return true;
    }

    function log_user($email, $pass)
    {
    	$query = $this->db->query("SELECT * FROM kdr_users WHERE user_email = '$email' AND user_pass = MD5(CONCAT(MD5(user_salt), MD5('$pass'))) LIMIT 1");
    	if ($query->num_rows() > 0)
    		return $query->row_array();
    	else
    		return false;
    }
}