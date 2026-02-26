<?php
session_start();
include 'header.php';
?>
<main>
    <h1>Mentions Légales</h1>
    <p>Ce site a été réalisé dans le cadre d'un projet de BTS SIO.</p>
    <p>Hébergeur : Localhost</p>
    <p>Contact : gardie.baptiste.pro@gmail.com <br> 06 52 40 33 85</p>
    <?php if (isset($_SESSION['user'])) { ?>
        <a href="dashboard.php" style="color: #007bff;">Retour au tableau de bord</a>
    <?php } else { ?>
        <a href="login.php" style="color: #007bff;">Retour à la connexion</a>
    <?php } ?>
</main>
<?php include 'footer.php'; ?>