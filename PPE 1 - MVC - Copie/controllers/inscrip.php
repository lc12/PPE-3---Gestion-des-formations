<?php
Include_once("../models/inscrip.php");

function verif($var = array())
{
	extract($_POST['submit']);
	$mdp = hash($mdp);
	$i = 0;
	$message = "";

	if(empty($nom) || !preg_match("#[A-Z]+#",$nom))
	{
		$i++;
		$message .= "Votre nom ne doit comporter que des MAJ <br />";
	}

	if(empty($prenom) || !preg_match("#[A-Z][a-z]+#",$prenom))
	{
		$i++;
		$message .= "Votre prenom ne doit comporter que des Min sauf la première lettre <br />";
	}

	if(empty($email) || !preg_match("#[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}#",$email))
	{
		$i++;
		$message .= "Votre email n'est pas conforme <br />";
	}

	if($i>0)
	{
		echo "Vous avez $i erreur";
		echo $message;
	}
	else
	{
		VerifLoginMail($nom, $prenom, $pseudo, $email, $mdp);
	}
}
//require_once("../views/inscrip.php");
?>
