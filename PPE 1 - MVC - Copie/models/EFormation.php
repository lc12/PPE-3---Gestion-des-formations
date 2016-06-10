<?php
include_once "Base.php";

function InsererNouvelleForm($idEmploye, $idFormation)
{
	
	$base = initBase ();
	
	$sql=$base->prepare('insert into inscrire (EMPLOYE_IdEmploye, FORMATION_IdFormation, EtatValidation) values ( ?, ?, \'En cours de validation\')');
	return $sql->execute ( array (
			$idEmploye,
			$idFormation
			
	) );
	
	
}

function ValidFormation($idEmploye, $idFormation)
{
	$base = initBase ();

	$sql=$base->prepare('update inscrire set EtatValidation= \'Valider\' where EMPLOYE_IdEmploye= ? and FORMATION_IdFormation = ?');
	return $sql->execute ( array (
			$idEmploye,
			$idFormation
				
	) );
	if ($sql->execute() === false )
	{
		echo 'FATAL ERROR';
	}
	else
	{
		echo 'Inscription prit en compte, veuillez attendre que votre chef d\'équipe valide votre formation';
	
	}
	

}
