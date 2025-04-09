<?php


// Ton tableau $produits ici...

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produit_id'])) {
    $id = (int) $_POST['produit_id'];
    
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }
    
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]['quantite'] += 1;
    } else {
        $_SESSION['panier'][$id] = ['quantite' => 1];
    }
    
    // Rediriger vers la page panier après ajout
    header("Location: index.php?route=panier");
    exit;
}

$route = $_GET['routes'] ?? 'accueil';

require_once 'includes/header.php';

switch($route) {
    case 'admin':
        require_once 'pages/admin.php';
        break;
    
    case 'profil':
        require_once 'pages/profil.php';
        break;
        
    case 'panier':
        require_once 'pages/panier.php';
        break;
        
    case 'produit':
        require_once 'pages/produit.php';
        break;
        
    case 'login':
        require_once 'pages/login.php';
        break;
        
    case 'logout':
        require_once 'pages/logout.php';
        break;
        
    case 'register':
        require_once 'pages/register.php';
        break;
        
    default:
        require_once 'pages/accueil.php';
}

require_once 'includes/footer.php';