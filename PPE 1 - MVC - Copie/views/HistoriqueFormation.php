<?php
include_once "../Option/date.php";
include_once "../controllers/login.php";
include_once "../controllers/verifconnect.php";
$login=	$_SESSION['pseudo'];
include_once "menu.php";
include_once "../models/LFormation.php";
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
	<h1>Historique de vos formations</h1>
	<table>
	<tr><th>Intitulé</th><th>Date</th><th>Durée</th><th>Lieu</th></tr>
		<?php
		$formation2 =HistoriqueF($login);
		foreach ( $formation2 as $result) 
		{
		echo '<tr>';
		echo '<td>'.$result['ContenuFormation'].'</td>';
		echo '<td class="date">'.AfficherDateComplete($result['DateFormation']).'</td>';
		echo '<td>'.$result['DureeFormation'].'h'.'</td>';
		echo '<td>'.$result['LieuFormation'].'</td>';
		echo '</tr>';

 			
		}
?>
	</table>
</div>
</body>
</html>
