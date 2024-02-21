<?php
$user = 'root';
$password = 'root';
$db = 'ecommerce';
$host = 'localhost';
$port = 3307;

$conn = mysqli_init();

if (!$conn) {
    die("Erreur d'initialisation de MySQLi");
}

$success = mysqli_real_connect(
    $conn,
    $host,
    $user,
    $password,
    $db,
    $port
);

if (!$success) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>
