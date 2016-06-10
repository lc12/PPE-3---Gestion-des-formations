<?php
 require_once("../models/Formation.php");
 
 if (!isset($_SESSION['login']))
 {
	header('location: Connexion.php');
 }
 
 //require_once("../views/InscritFormation.php");


?>