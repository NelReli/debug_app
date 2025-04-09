<?php

echo "<h1>Bienvenue sur Ma Boutique</h1>";
echo "<p>Découvrez notre sélection de produits de qualité.</p>";

var_dump($_SESSION);

if ((isset($_SESSION['admin'])) && ($_SESSION['admin'])) {
    
    echo "<h2> Bonjour ".$_SESSION['username']."</h2>";
    
  
} 

?>