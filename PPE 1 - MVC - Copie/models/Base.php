<?php


function initBase()
{
/*
	$user = 'root';
	$pass = '';
	$host = 'localhost';
	$port = '3306';
	$base = 'ppe';
	$dsn="mysql:$host;port=$port;dbname=$base";
	
	*/

	try
	{
		/*$dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));*/
		$dbh = new PDO("mysql:host=localhost;dbname=ppe","root","", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	}
	catch (PDOException $e)
	{
		$msg ='Erreur de connexion avec la base de donnee';
		die($msg);
	}
	return $dbh;
}