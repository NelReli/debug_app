<?php
echo "<h1>Mon Panier</h1>";


$panier = $_SESSION['panier'] ?? [];
if(isset($_POST['suppresion_panier'])) {
    unset($_SESSION['panier']);
    header("Location: index.php?route=panier");
    exit;
}



echo "</pre>";
if (!empty($panier)) {
    echo "<form  method='POST'>";
    echo "<button name='suppresion_panier' type='submit'>Vider le panier</button>";
    echo "</form>";
}
if (empty($panier)) {
    echo "<p>Votre panier est vide 🛒</p>";
} else {
    $total = 0;
    
    foreach ($panier as $id => $data) {
        if (!isset($produits[$id])) continue;

        $produit = $produits[$id];
        $quantite = $data['quantite'];
        $prix = (float)$produit['prix'];
        $sousTotal = $prix * $quantite;
        $total += $sousTotal;

        echo "<div class='produit'>";
        echo "<h3>" . htmlspecialchars($produit['nom']) . "</h3>";
        echo "<p>Prix unitaire : " . number_format($prix, 2) . " €</p>";
        echo "<p>Quantité : $quantite</p>";
        echo "<p>Sous-total : " . number_format($sousTotal, 2) . " €</p>";
        echo "</div><hr>";
    }

    echo "<h3>Total général : " . number_format($total, 2) . " €</h3>";
}
?>


