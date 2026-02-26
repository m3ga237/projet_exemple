<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $req = $pdo->prepare("DELETE FROM inventory WHERE id = ?");
    $req->execute([$id]);
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $req = $pdo->prepare("INSERT INTO inventory (name, quantity, price) VALUES (?, ?, ?)");
    $req->execute([$name, $quantity, $price]);

    header("Location: dashboard.php");
    exit();
}

$req = $pdo->query("SELECT * FROM inventory");
$items = $req->fetchAll();

include 'header.php';
?>
<main>
    <h1>Gestion de l'inventaire</h1>
    
    <div>
        <h2>Ajouter un article</h2>
        <form method="POST" action="dashboard.php">
            <input type="text" name="name" placeholder="Nom de l'article" required>
            <input type="number" name="quantity" placeholder="Quantité" required>
            <input type="number" step="0.01" name="price" placeholder="Prix (€)" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($items as $item) { ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['price']; ?> €</td>
            <td>
                <a class="action-btn edit" href="edit.php?id=<?php echo $item['id']; ?>">Modifier</a>
                <a class="action-btn delete" href="dashboard.php?delete=<?php echo $item['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</main>
<?php include 'footer.php'; ?>