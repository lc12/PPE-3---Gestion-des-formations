<?php
include_once "../Option/date.php";
include_once "../controllers/login.php";
include_once "../controllers/verifconnect.php";
$login=	$_SESSION['pseudo'];
include_once "menu.php";
include_once "../models/LFormation.php";
include_once "../models/EFormation.php";
include_once "../models/Condition.php";
/*include_once "../models/Search.php";*/
?>

<html>
<head>
<link rel="stylesheet" href="../CSS/menu.css" type="text/css">
</head>
<body>
<br />
<?php 
/*if (isset($_POST['B1']))
{
	$ville = $_POST['recherche'];
	$recherche = RechercheVille($ville);
	foreach ($recherche as $result1)
	{
		echo $result1->NomPrestataire;
	}
}*/
?>
<!--<form action ="ChoixFormation.php" method ="POST">
<p>
<input type="text" size="20" name="recherche"> 
<input type="submit" name="B1" value="Rechercher">
</p>
</form>
<br />
-->
<?php
echo affiche_menu();

?>
 <div id="f2">
		<h1>Liste des formations</h1>
		<table>
			<tr>
				<th>Intitulé</th>
				<th>Date</th>
				<th>Durée</th>
				<th>Lieu</th>
				<th>Nombre de crédit</th>
				<th>Nombre de jours</th>
				<th>Nom du Prestataire</th>
				<th>Inscription</th>
			
			</tr>
<?php
if (isset($_POST['inscrire']))
{
$id = $_SESSION['id'];
$idF = $_POST['idform'];
/*Affichage($login, $idF);*/
InsererNouvelleForm($id, $idF);
}

?>

<form action="ChoixFormation.php" method="post">

<?php 
		
		
		
$formation1 =RechercheFormations($login);
foreach ($formation1 as $result) 
{
		echo '<tr>';
		echo "<td>$result->ContenuFormation</td>";
		echo "<td class='date'>".AfficherDateComplete($result->DateFormation)."</td>";
		echo "<td>$result->DureeFormation h</td>";
		echo "<td>$result->LieuFormation</td>";
		echo "<td>$result->CreditFormation</td>";
		echo "<td>$result->NbjoursFormation</td>";
		echo "<td>$result->NomPrestataire</td>";
		echo '<td><input type="submit" name="inscrire" value="S\'inscrire" /></td>';
		
?>
		<input name="idform" value=<?php echo  $result->IdFormation?>
					type="hidden">
<?php 
		echo '</tr>';
		
		}
?>
		</form>
		</table>
	</div>
</body>
</html>



