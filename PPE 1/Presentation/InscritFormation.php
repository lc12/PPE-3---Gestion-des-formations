<?php
include_once "../Option/date.php";
include ('login.php');
$login=	$_SESSION['pseudo'];
include('menu.php');
include_once "../CoucheBD/dbLFormation.php";
include_once "../CoucheBD/dbformation.php";

?>

<html>
<head>
<link rel="stylesheet" href="../CSS/menu.css" type="text/css">
</head>
<body>

<?php
echo affiche_menu();
?>

 <div id="principal">
	<h1>Vos formations</h1>
	<table>
	<tr><th>Intitulé</th><th>Date</th><th>Durée</th><th>Lieu</th><th>Etat</th></tr>
		<?php
		$formation =RFormationUsers($login);
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

<div id= "footer">
<a href="CreationPDF.php"><img src="img/imprimer.jpg" alt="imprimer"/></a>
</div>
</body>
</html>

<?php 
include_once "../Design/footer.php";
?>

