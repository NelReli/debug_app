<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?route=login');
    exit();
}

echo "<h1>Mon Profil</h1>";
// Code pour afficher et modifier le profil
?>