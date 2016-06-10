<?php
include_once "Base.php";

function InsererNouvelleEmploye($nomemploye, $prenomemploye, $login, $mdp, $email)
{
	$base = initBase ();
	$randomId = mt_rand(1, 3);
	$mdp = hash('sha512',$_POST['MdpEmploye']);
	$sql=$base->prepare('INSERT INTO employe(NomEmploye, PrenomEmploye, LoginEmploye, MdpEmploye, Email, CreditFormation, NbJours, TYPE SALARIE_IdTypeSalarie, EQUIPE_IdEquipe) VALUES (:nom,:prenom,:login,:mdp,:email,"5000","15","2", :idequipe)');
	$sql->bindParam(':nom', $nomemploye);
	$sql->bindParam(':prenom', $Prenomemploye);
	$sql->bindParam(':login', $login);
	$sql->bindParam(':mdp', $mdp);
	$sql->bindParam(':email', $email);
	$sql->bindParam(':idequipe', $randomId);
	if ($sql->execute() === false)
	{
		echo "Erreur insertion";
	}
	else
	{
		 echo 'Inscription fini, un mail vient de vous être envoyé';
	}

	/*return $sql->execute ( array (
				  ':nom' =>$_POST['NomEmploye'],
                  ':prenom' => $_POST['PrenomEmploye'],
				  ':login' => $_POST['LoginEmploye'],
				  ':mdp' => $mdp,
                  ':email' => $_POST['Email'],
                  ':idequipe' => $randomId
				  ));
                  echo 'Inscription fini, un mail vient de vous être envoyé';*/
}
	
function VerifLoginMail($login, $email)
{
	/*Verifie si le pseudo est deja inscrit */
        $sql = $base->prepare('SELECT LoginEmploye, Email FROM employe WHERE LoginEmploye = : $login and Email = $email'); 
		$sql->bindParam(':login', $login);
		$sql->bindParam(':email', $email);
		
		if ($sql->execute() === false)
		{
			echo "Erreur base";
		}
		else
		{
			$tab = $sql->fetch() ;
			if (empty($tab))
			{
				InsererNouvelleEmploye($nomemploye, $prenomemploye, $login, $mdp, $email, $randomId);
			}
			else
			{
			echo 'Le pseudo ou l\'adresse email est déjà utilisé'; 
			}
					
		}
		/*$count = $sql->rowCount(); 
		if($count > 0) 
		{ 
           // Pseudo déjà utilisé 
           echo 'Le pseudo ou l\'adresse email est déjà utilisé'; 
        } 
		else
        { 
		  // Sinon on procede a l'inscription
	
		}*/
		
}
?>