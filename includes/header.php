<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Boutique</title>
    <style>
        nav {
            background-color: #333;
            padding: 1rem;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 1rem;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="index.php?route=produit">Produits</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="index.php?route=panier">Panier</a>
            <a href="index.php?route=profil">Profil</a>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                <a href="index.php?route=admin">Administration</a>
            <?php endif; ?>
            <a href="index.php?route=logout">Déconnexion</a>
        <?php else: ?>
            <a href="index.php?route=login">Connexion</a>
            <a href="index.php?route=register">Inscription</a>
        <?php endif; ?>
    </nav>
    <div class="container">