<?php
include_once "Base.php";
function RechercheVille($ville)
{
	$base=initBase();
	$sql =$base->prepare ('select * from prestataire where VillePresta like %?% ');
	$sql->execute (array(
		$ville
	));
	if ($sql->execute()=== false)
	{
		return $erreur="erreur";
	}
	else
	{
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	
}

