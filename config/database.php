<?php
$host = "localhost";
$dbname = "boutique_debug";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";


    $stmt = $pdo->query("SELECT * FROM produits");

    // recuperation des produits depuis la base de données
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
$produitsReindexés = [];
foreach ($produits as $produit) {
    $produitsReindexés[$produit['id']] = $produit;
}
$produits = $produitsReindexés;
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>