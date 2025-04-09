<?php
// Destruction de toutes les variables de session
$_SESSION = array();

// Destruction du cookie de session
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Destruction de la session


// Redirection vers la page d'accueil
header('Location: inde.php');
exit();