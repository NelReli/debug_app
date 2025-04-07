<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}

echo "<h1>Page Administration</h1>";
//  code d'administration ici
?>