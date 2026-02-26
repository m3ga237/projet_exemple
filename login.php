<?php
session_start();
require 'db.php';

$error = "";

if (isset($_POST['username'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $req = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $req->execute([$user, $pass]);
    $result = $req->fetch();

    if ($result) {
        $_SESSION['user'] = $result['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Identifiants invalides !";
    }
}
include 'header.php';
?>
<div class="login-container">
    <form method="POST" action="login.php">
        <h1>Connexion</h1>
        <?php if ($error != "") { echo "<p class='error'>$error</p>"; } ?>
        <input type="text" name="username" placeholder="Utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</div>
<?php include 'footer.php'; ?>