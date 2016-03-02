<?php 
include_once "../Design/header.php";
include_once "../CoucheBD/dbformation.php";
$equipe=$_SESSION['idequipe'];
RechercheChefEquipe($equipe);
?>

<html>
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<link rel="stylesheet" href="../CSS/menu.css" type="text/css">
<title> Gestion de formation </title>
</head>

<body>
	<div id="navigation">
		<ul>
			<li id="active"><a href="InscritFormation.php">Formation Inscrit</a></li>
			<li><a href="ChoixFormation.php">Choisir Formation</a></li>
			<li><a href="HistoriqueFormation.php">Historique Formation</a></li>
			<li><a href="DemandeFormation.php">Demande de Formation</a></li>
	   </ul>
	   
	</div>
	<a href="Deconnexion.php"><img src="img/boutondecon.jpg" alt="deconnecter"/></a>
	<br />
	<p style="text-align: center; color:#C15324; font-size:30px"> Bienvenue sur votre espace <?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom']?></p>
	<br />

	
</body>
</html>

<?php
function affiche_menu() {
	//  tableaux contenant les liens d'accès et le texte à afficher
	$tab_menu_lien = array (
			"InscritFormation.php",
			"ChoixFormation.php",
			"HistoriqueFormation.php",
			"DemandeFormation.php" 
	);
	$tab_menu_texte  = array (
			"Formation Inscrit",
			"Choisir Formation",
			"Historique Formation",
			"Demande de Formation" 
	);
	
	
	//  informations sur la page
	$info  = pathinfo ( $_SERVER ['PHP_SELF'] );
	$menu  = "<div id=\"navigation\">";
	
	foreach ($tab_menu_lien as $cle => $lien)
	{
		 $lien;
		
	}
	

}
 /*var_dump($_SESSION);*/
?>
<strong style="font-size:20px">Nombre de crédit restant :</strong> <?php echo $_SESSION ['credit'];?><br/>
<!-- <strong style="font-size:20px">Nombre de jours restant :</strong> <?php /*echo $_SESSION ['nbjour'];*/?><br/>-->


<?php
if ($_SESSION ['chef']) {
	
	?>
	
		<font style="text-align: left;font-size:20px"> <strong>Vous êtes chef d'équipe</strong> </font>
	
<!-- Html -->

<?php
} 

else {
	
	?>
		<font style="text-align: left;font-size:20px"><strong> Votre chef d'équipe est : </strong><?php echo $_SESSION['nomchef'] ?></font>

<!-- HTML -->

<?php
}

?>

