<?php
namespace Clinic\Dao\Pdo;

use Clinic\Config;

class Pdo{
	public static function getPdo(){
		return new PDO(Config::DB_URL,Config::DB_USERNAME,Config::DB_PASSWORD);
	}
}