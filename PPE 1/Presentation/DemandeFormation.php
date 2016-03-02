<?php
include_once "../Option/date.php";
include ('login.php');
$login=	$_SESSION['pseudo'];
include ('menu.php');
include_once "../CoucheBD/dbLFormation.php";
include_once "../CoucheBD/dbEFormation.php";
include_once "../CoucheBD/dbformation.php";
$equipe=$_SESSION ['idequipe'];
RechercheChefEquipe($equipe);
?>

<html>
<head>
<link rel="stylesheet" href="../CSS/menu.css" type="text/css">
</head>
<body>

<?php

echo affiche_menu();

?>
<?php 
if ($_SESSION ['chef']) {
	
?>
	<div id="f3">
		<h1>Liste des employés en attente de confirmation</h1>
		<table>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Intitulé</th>
				<th>Etat</th>
				<th>Validation</th>
			</tr>
	
		
		
		<form action="DemandeFormation.php" method="post">
		<?php
		if (isset ( $_POST ['valider'] )) 
		{
			ValidFormation( $_SESSION ['id'], $_POST ['idform1'] );
			ValidFormation(RechercheChefEquipe($equipe), $_POST ['idform1'] );
			echo 'Formation validé';
		}
		
		$formation4 =RechercheEmpChef($login);
		foreach ($formation4 as $result) 
		{ 
			
		echo '<tr>';
		echo "<td>$result->NomEmploye</td>";
		echo "<td>$result->PrenomEmploye</td>";
		echo "<td>$result->ContenuFormation</td>";
		echo "<td>$result->EtatValidation</td>";
		echo "<td><input type='submit' name='valider' value='Valider' /></td>";
		?>
		<input name="idform1" value=<?php echo $result->IdFormation?>
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


<?php
} 

else {
	
	?>
<div id="principal">
	<h1>Formations en attente de confirmation</h1>
	<table>
		<tr>
			<th>Intitulé</th>
			<th>Date</th>
			<th>Durée</th>
			<th>Lieu</th>
			<th>Etat</th>
		</tr>
		<?php
		$formation =RFormationAttente($login);
		foreach ( $formation as $result) 
		{
		echo '<tr>';
		echo '<td>'.$result['ContenuFormation'].'</td>';
		echo '<td class="date">'.AfficherDateComplete($result['DateFormation']).'</td>';
		echo '<td>'.$result['DureeFormation'].'h'.'</td>';
		echo '<td>'.$result['LieuFormation'].'</td>';
		echo '<td>'.$result['EtatValidation'].'</td>';
		echo '</tr>';

 			
		}
		?>
	</table>

</div>
</body>
</html>

<!-- HTML -->

<?php
}

?>


</body>
</html>
<?php 
include_once '../Design/footer.php';
?>