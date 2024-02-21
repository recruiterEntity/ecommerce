<?php
session_start();
header('Content-Type: application/json');

include("connexion_bdd.php");

if (isset($_SESSION['user']) && isset($_POST['product_id'])) {
    $usernameFromSession = $_SESSION['user'];
    $productId = $_POST['product_id'];

    // Check if productId is a valid integer
    if (!ctype_digit($productId)) {
        $response = array('success' => false, 'message' => 'Erreur : ID de produit non valide.');
        echo json_encode($response);
        exit();
    }

    // Retrieve user_id from the database based on the username from the session
    $query = "SELECT user_id FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $usernameFromSession);
        $stmt->execute();
        $stmt->bind_result($user_id_from_db);

        if ($stmt->fetch()) {
            $stmt->close();

            // Use prepared statements to prevent SQL injection
            $insertQuery = "INSERT INTO cart (user_id, product_id) VALUES (?, ?)";
            $insertStmt = $conn->prepare($insertQuery);

            if ($insertStmt) {
                $insertStmt->bind_param("ss", $user_id_from_db, $productId);

                if ($insertStmt->execute()) {
                    $response = array('success' => true, 'message' => 'Produit ajouté au panier avec succès.');

                    // Return JSON response to handle on the client side
                    echo json_encode($response);
                    exit();
                } else {
                    $response = array('success' => false, 'message' => 'Erreur lors de l\'ajout du produit au panier : ' . $insertStmt->error);
                }

                $insertStmt->close();
            } else {
                $response = array('success' => false, 'message' => 'Erreur lors de la préparation de la requête : ' . $conn->error);
            }
        } else {
            $response = array('success' => false, 'message' => 'Erreur lors de la récupération de l\'identifiant utilisateur.');
        }
    } else {
        $response = array('success' => false, 'message' => 'Erreur lors de la préparation de la requête : ' . $conn->error);
    }
} else {
    $response = array('success' => false, 'message' => 'Erreur : Identifiant utilisateur ou ID de produit manquants.');
}

// Return JSON response
echo json_encode($response);
$conn->close();
?>
