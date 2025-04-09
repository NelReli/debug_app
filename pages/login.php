<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['di'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['is_admin'] == 1;
        
        header('Location: index.php');
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<h1>Connexion</h1>

<?php if (isset($error)): ?>
    <div style="color: red;"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<form method="POST" action="index.php?route=login">
    <div>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Se connecter</button>
</form>