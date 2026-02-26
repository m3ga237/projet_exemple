<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php if (isset($_SESSION['user'])) { ?>
            Bienvenue, <strong><?php echo $_SESSION['user']; ?></strong>
            <a href="logout.php">Déconnexion</a>
        <?php } else { ?>
            Gestion SIO
        <?php } ?>
    </header>