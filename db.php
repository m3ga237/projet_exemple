<?php
// db.php - Connexion à la base de données avec PDO
$host = 'localhost';
$dbname = 'bts_sio_db';
$user = 'user';
$pass = 'pass'; 


$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
?>
