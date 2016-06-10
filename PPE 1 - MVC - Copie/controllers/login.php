<?php
session_start();
include_once "../models/Formation.php";
$erreur=null;

	
if (!empty($_POST['pseudo']) && (!empty($_POST['password']))) 

{	$mdp = hash('sha512',$_POST['password']);
	if (RechercheUser ($_POST ['pseudo'], $mdp ))
	{
		$_SESSION['pseudo']= $_POST['pseudo'];
		header('location: InscritFormation.php');
	}
	else
	{
		$erreur .= '<img src="img/icone_erreur.png"/>'." ".'Le pseudo ou le mot de passe sont incorrects';
	}
}
elseif (!empty($_POST))
{
	$erreur .= '<img src="img/icone_erreur.png"/>'." ".'Veuillez remplir tout les champs' ;
}

