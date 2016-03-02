<?php
session_start();
include_once "../CoucheBD/dbformation.php";
$erreur=null;

/*if(isset($_POST['remember']))
{
	setcookie('pseudo', $_POST ['pseudo'], time() + 365*24*3600, '/'); // On écrit un cookie
	setcookie('mdp', $_POST ['password'], time() + 365*24*3600, '/');
}
	
	if (isset($_COOKIE['pseudo']) && (isset($_COOKIE['mdp'])))
	{
		RechercheUser ( $_COOKIE['pseudo'], $_COOKIE['mdp']);
		
	}*/
	
if (!empty($_POST['pseudo']) && (!empty($_POST['password']))) 
{
	if (RechercheUser ( $_POST ['pseudo'], $_POST ['password'] ))
	{
		$_SESSION['pseudo']= $_POST['pseudo'];
		header('location: InscritFormation.php');
	}
	else
	{
		
		$erreur .= '<img src="img/icone_erreur.png"/>'." ".'Le pseudo ou le mot de passe est incorrects';

	}
}
elseif (!empty($_POST))
{

	$erreur .= '<img src="img/icone_erreur.png"/>'." ".'Veuillez remplir tout les champs' ;


}

