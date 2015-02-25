<?php

namespace Clinic\Model\User;

use Clinic\Dao\UserDao\UserDao;

class User {
	private $id;
	private $firstName;
	private $lastName;
	private $username;
	private $password;
	private $emailAddress;
	private $dateOfBirth;
	private $valid;
	public function getFirstName() {
		return $this->firstName;
	}
	public function login($username, $password) {
		$userDao = new UserDao ();
		$user = $userDao->getUserbyUsername ( $username );
		if ($user->isValid () && $user->password == $password) {
			return array (
					"status" => true,
					"userId" => $user->getId (),
					"message" => "Login Successfull" 
			);
		} else {
			return array(
					"status" => false,
					"userId" => null;
					"message" => "Invalid username or password"
			)
			
			;
		}
	}
	public function create($values) {
	}
	public function isValid() {
		return $this->valid;
	}
}