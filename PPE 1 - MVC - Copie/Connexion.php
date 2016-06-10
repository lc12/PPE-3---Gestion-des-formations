<?php

include ('../controllers/login.php');
?>
	<html>
	<head>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../CSS/Connexion.css">
	<title> Gestion de formation </title>
	</head>
	<body>
	<fieldset>
	<legend> Connexion au site M2L </legend>
	<p>
	<form method="post" action="Connexion.php">
	<label for="pseudo"> Pseudo : </label><input name="pseudo" type="text" <?php if (isset($_POST['pseudo'])){echo'value= "'.$_POST['pseudo'].'"';}?> id="pseudo" /><p>
	<label for="password"> Mot de Passe : </label><input type="password" <?php if (isset($_POST['password'])){echo'value= "'.$_POST['password'].'"';}?> name="password" id="password" /></p>
	<a id = "inscrip" href ="inscrip.php"> S'inscrire </a><br/>
	<div><p><input type="submit" name="connexion" value="Connexion" /></p></div>
	</form>
	</fieldset>
	</body>
	</html>
	
<p style="color:red;text-align:center"><?php echo $erreur;?></p>
