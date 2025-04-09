<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}

//  code d'administration ici




if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}

echo "<h1>Page Administration - Gestion des produits</h1>";

// Gestion CRUD
if (array_key_exists("fr", $_SESSION) ) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['ajouter'])) {
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
        $stock = $_POST['stock'];

        $sql = "INSERT INTO produits (nom, description, prix, stock) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $description, $prix, $stock]);
        echo "Produit ajouté avec succès!";
    } elseif (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];

        $sql = "UPDATE produits SET nom = ?, description = ?, prix = ?, stock = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $description, $prix, $stock, $id]);
        echo "Produit mis à jour avec succès!";
    } elseif (isset($_POST['supprimer'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM produits WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        echo "Produit supprimé avec succès!";
    }
}
}else{
    echo "je pense que tu dois chercher le probleme ";
}

// Affichage des produits
$stmt = $pdo->query("SELECT * FROM produits");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head>
    <title>Administration des produits</title>
</head>
<body>
    <form action="" method="post">
        Nom: <input type="text" name="nom" required><br>
        Description: <textarea name="description"></textarea><br>
        Prix: <input type="number" name="prix" step="0.01" required><br>
        Stock: <input type="number" name="stock" required><br>
        <button type="submit" name="ajouter">Ajouter Produit</button>
    </form>
    <hr>
    <?php foreach ($produits as $produit) { ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
            Nom: <input type="text" name="nom" value="<?php echo $produit['nom']; ?>"><br>
            Description: <textarea name="description"><?php echo $produit['description']; ?></textarea><br>
            Prix: <input type="number" name="prix" step="0.01" value="<?php echo $produit['prix']; ?>"><br>
            Stock: <input type="number" name="stock" value="<?php echo $produit['stock']; ?>"><br>
            <button type="submit" name="modifier">Modifier</button>
            <button type="submit" name="supprimer">Supprimer</button>
        </form>
        <hr>
    <?php } ?>
</body>
</html>