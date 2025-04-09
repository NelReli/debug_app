<?php
require_once 'config/database.php';

// Récupération des produits depuis la base de données



echo "<h1>Nos Produits</h1>";

foreach ($produits as $produit) {
    echo "<div class='produit'>";
    echo "<h3>" . htmlspecialchars($produit['nom']) . "</h3>";
    echo "<p>" . htmlspecialchars($produit['description']) . "</p>";
    echo "<p>Prix : " . number_format($produit['prix'], 2) . " €</p>";
    echo "<form method='POST' action='index.php?route=panier'>";
    echo "<input type='hidden' name='produit_id' value='" . $produit['id'] . "'>";
    echo "<button type='submit'>Ajouter au panier</button>";
    echo "</form>";
    echo "</div>";
}
?>