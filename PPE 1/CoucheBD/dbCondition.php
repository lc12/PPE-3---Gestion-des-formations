<?php
function findcreditUtilisateur($login)
{
	$base = initBase ();
	$sql = $base->prepare ('select CreditFormation from employe where LoginEmploye = :lelogin');
	$sql->bindParam (':lelogin', $login);
	if ($sql-> execute () === false)
	{
		$retour =  "ERREUR DE LA REQUETE";
	}
	else
	{
		$tab = $sql->fetch();
		$retour = $tab[0];
	}
	return $retour;
}

function findcreditForm($idF)
{
	$base = initBase ();
	$sql = $base->prepare ('select CreditFormation from formation where IdFormation = :lidf');
	$sql->bindParam (':lidf', $idF);
	if ($sql-> execute () === false)
	{
		$retour = "ERREUR DE LA REQUETE";
	}
	else
	{
		$tab = $sql->fetch();
		$retour = $tab[0];
	}
	return $retour;
}

function retourInscription($login, $idF)
{
	$retour = findcreditUtilisateur($login)  - findcreditForm($idF);
	if ($retour >= 0)
	{
		$possible = true;
	}
	else
	{
		$possible = false;
	}
	return $possible;
}

function Affichage($login, $idF)
{
	$base = initBase ();
	$rep = retourInscription($login, $idF);
	if ($rep === true)
	{
		$sql =$base->prepare( 'update employe set CreditFormation = ? - ?') ;
		$sql->execute ( array (
				$login,
				$idF
		) );
		if ($sql->execute() === false )
		{
			echo 'FATAL ERROR';
		}
		else
		{
			echo 'Mise à jour des crédits réussie';
		}
	}
	else
	{
		echo 'Vous n’avez plus assez de crédits pour effectuer cette action';
	}
}


