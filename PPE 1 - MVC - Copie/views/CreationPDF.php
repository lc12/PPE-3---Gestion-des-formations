<?php
require_once "../dompdf/dompdf_config.inc.php";
include_once "../Option/date.php";
include('../controllers/login.php');
include ('../controllers/verifconnect.php');
$login=	$_SESSION['pseudo'];
include_once "../models/LFormation.php";
include_once "../models/EFormation.php";
ob_start();
?>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="../CSS/print.css" type="text/css">
</head>
<body>
<div id="h">
<table>
<tr>
<b>Gestion des formations de la M2L</b>
</tr>
</table>
</div>
<br/>
<br/>
<div id="b">
<table>
<tr>
<td><strong> Nom :</strong><font style="text-align:left"><?php echo $_SESSION['nom']?></font></td>
<td><strong> Prenom :</strong><font style="text-align:left"><?php echo $_SESSION['prenom'] ?></font></td>
<td><strong> Votre chef d'équipe est : </strong><font style="text-align:left"><?php echo $_SESSION['nomchef']?></font></td>
</tr>
</table>
</div>
<br/>
<br/>
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
</body>
</html>

<?php 
$content=ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->load_html($content);
$dompdf->render();
/*file_put_contents("document.pdf", $dompdf->output());*/
$dompdf->stream("document.pdf", array("Attachment" => true));
/*$dompdf->stream("sample.pdf");*/




