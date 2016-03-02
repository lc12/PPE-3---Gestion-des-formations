<?php
// On appelle la session
session_start();

// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();

setcookie('pseudo', $_POST ['pseudo'], time()-3600, '/');
setcookie('mdp', $_POST ['password'], time() -3600, '/');
// On redirige le visiteur vers la page d'accueil
header ('Location: Connexion.php');

?>