<?php
?>

<html>
	<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../CSS/inscrip.css">
	<title> Espace Inscription </title>
	</head>
	<body>
	<a href="Connexion.php"><img src="img/icone-retour.png" alt="retour"/></a>

<fieldset>
	<legend>Inscription</legend>
	<form method="post" action="../controllers/inscrip.php">
		<label for="nom"> Nom : </label>
		<p><input type="text" name="nom" id="nom" required pattern="[A-Z]+"/></p>
		<label for="prenom"> Prénom : </label>
		<p><input type="text" name="prenom" id="prenom" required pattern="[A-Z][a-z]+"/></p>
		<label for="pseudo"> Login : </label>
		<p><input type="text" name="pseudo" id="pseudo" required pattern="[A-Z][a-z]+"/></p>
		<label for="email"> Email : </label>
		<p><input type="email" name="email" id="email" required placeholder="exemple@mail.fr"/></p>
		<label for="mdp"> Mot de passe :</label>
		<p><input type="password" name="mdp" id="mdp" required/></p>
		<input type="submit" name="submit" value="Valider" />
	</form>
</fieldset>
	</body>
	</html>
