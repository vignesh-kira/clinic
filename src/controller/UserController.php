<?php

namespace Clinic\Controller\UserController;

use Clinic\Model\User;

class UserController {
	public function login() {
		$username = $_POST ['username'];
		$password = $_POST ['username'];
		$user = new User ();
		$loginResponse = $user->login ( $username, $password );
		session_start ();
		if ($loginResponse ['status']) {
			// 1. Start session 2.Write to session that the user has logged in and store his user id
			if (! isset ( $_SESSION ['UserId'] )) {
				$_SESSION ['UserId'] = $loginResponse ['userId'];
			}
			// Redirect to home page
			header ( "Location: /home.php" );
			die ();
		} else {
			// Redirect to login page with error
			if (! isset ( $_SESSION ['errorMsgs'] )) {
				$_SESSION ['errorMsgs'] = array ();
				array_push ( $_SESSION ['errorMsgs'], "Invalid username or password" );
			}
		}
	}
}