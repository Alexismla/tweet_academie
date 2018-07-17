<?php 
	$dbhost = 'localhost';
	$dbname = 'common-database';
	$dbuser = 'root';
	$dbpass = '';

	try{

		$dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $ex){
		die($ex->getMessage());
	}
	include 'User.php';
	$login = new login($dbcon);
