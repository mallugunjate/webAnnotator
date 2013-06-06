<?php
require_once '../config.php';
class user
{
	/*constructor*/
	function user()
	{
		unset($USER);
		global $USER;
		$USER = new stdClass();
		$USER->id = 0;
		$USER->empid = 0;
		$USER->username = 'guest';
		$USER->address = '';
		$USER->firstname = 'Guest';
		$USER->email = '';
		$USER->mobile = '';
		$USER->telephone = '';
		$USER->flag = null;
		$_SESSION['USER'] = $USER;
	}
	/*login validation*/
	function login($username , $pwd)
	{	
		global $DB;
		$query = "SELECT * FROM antr_user WHERE username like '$username' && password like '$pwd'";
		$rs = $DB->select($query);
		
		if($rs['count']){
			unset($USER);
			global $USER;
			$USER = new stdClass();
			foreach ($rs['result'] as $key => $value) {
				$USER->id = $value['id'];
				$USER->firstname = $value['firstname'];
				$USER->lastname = $value['lastname'];
				$USER->username = $value['username'];
				$USER->email = $value['email'];
				$USER->flag = $value['flag'];
				$_SESSION['USER'] = $USER;	
			return true;
			}
		}else{
			return false;
		}
	}
	/*
		check if user is logged in 
		param: 
		
	*/	
	public function requiredlogin()
	{
		global $USER;
		if($USER){
			return true;
		}
		else{
			return false;
		}
	}

	/* 
		check if user is admin
		param: 
		
	*/
	public function isadmin($USER)
	{
		if($USER->username === $CFG->admin){
			return true;
		}
		else{
			return false;
		}	
	}

	/*
		change password
		param: 
		
	*/
	public function changepwd($USER,$pwd)
	{
		# code...
	}

	/*
		user profile update
		param: 

	*/
	public function updateprofile($USER,$records)
	{
		# code...
	}
}

?>