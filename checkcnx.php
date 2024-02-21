<?php
session_start();
include("connexion_bdd.php");

header('Content-Type: application/json');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $login = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations de connexion dans la table des utilisateurs
    $query = "SELECT * FROM users WHERE username = '$login' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $login;
        $response['success'] = true;

        // Redirect to listprduitsforuse.php
        header('Location: ListProduitForUser.php');
        exit(); // Make sure to exit after sending the header to prevent further execution
    } else {
        $response['success'] = false;
    }
} else {
    $response['success'] = false;
}

mysqli_close($conn);

echo json_encode($response);
?>
