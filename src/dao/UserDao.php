<?php

namespace Clinic\Dao\UserDao;

use Clinic\Dao\Pdo\Pdo;
use Clinic\Model\User\User;

class UserDao {
	private $dbHandler;
	public function getUserbyUsername($username) {
		// Get user for db
		$this->dbHandler = Pdo::getPdo ();
		$stmt = $this->dbHandler->prepare ( "SELECT * from user where username=:username" );
		$stmt->bindParam ( ':username', $username, PDO::PARAM_STR );
		$stmt->execute ();
		// if user does not exisit create dummy object and set valid to false
		if (! ($stmt->rowCount () < 1)) {
			$result = $stmt->fetch ( PDO::FETCH_ASSOC );
			$user = getUserFromRecord ( $result );
		} else {
			$user = new User ();
			$user->setValid ( false );
		}
		
		$stmt->close ();
		$this->dbHandler->close ();
		
		return $user;
	}
	public function getUserFromRecord($record) {
		$user = new User ();
		$user->setFirstName ( $record ['firstName'] );
		$user->setLastName ( $record ['lastName'] );
		$user->setValid ( true );
		return $user;
	}
}