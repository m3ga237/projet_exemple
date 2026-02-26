<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $req = $pdo->prepare("UPDATE inventory SET name = ?, quantity = ?, price = ? WHERE id = ?");
    $req->execute([$name, $quantity, $price, $id]);

    header("Location: dashboard.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = $pdo->prepare("SELECT * FROM inventory WHERE id = ?");
    $req->execute([$id]);
    $item = $req->fetch();
} else {
    header("Location: dashboard.php");
    exit();
}

include 'header.php';
?>
<main>
    <h1>Modifier l'article</h1>
    
    <div>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="text" name="name" value="<?php echo $item['name']; ?>" required>
            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" required>
            <input type="number" step="0.01" name="price" value="<?php echo $item['price']; ?>" required>
            <button type="submit">Enregistrer les modifications</button>
            <br><br>
            <a href="dashboard.php" style="text-decoration: none; color: #333;">Annuler</a>
        </form>
    </div>
</main>
<?php include 'footer.php'; ?>