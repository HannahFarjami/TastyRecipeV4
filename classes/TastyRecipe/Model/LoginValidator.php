<?php

namespace TastyRecipe\Model;

use TastyRecipe\Integration\DBHandler;

class LoginValidator {
	
	private $username;
	private $password;
	private $DBHandler;


	public function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
		$this->DBHandler = new DBHandler();
	}

	public function checkLogin(){
			
			$result = $this->DBHandler->login($this->username, $this->password);
			$exists = count($result);
			if($exists > 0){
				for($i = 0; $i < $exists; $i++){
					if(password_verify($this->password,$result[$i])){
						return true;
					}
				}
			}
			return false;


	}
}