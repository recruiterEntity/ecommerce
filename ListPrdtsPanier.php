<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Liste des Produits dans le Panier</title>
    <style>
        /* Ajoutez ici vos styles CSS si nécessaire */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<button id="btnDeconnexion">Déconnexion</button>
<button id="Acheter">Acheter</button>
<?php
session_start();
include("connexion_bdd.php");

echo "<h2>Liste des Produits dans le Panier</h2>";

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];

    // Retrieve user_id from the database based on the username from the session
    $queryUserId = "SELECT user_id FROM users WHERE username = ?";
    $stmtUserId = $conn->prepare($queryUserId);

    if ($stmtUserId) {
        $stmtUserId->bind_param("s", $username);
        $stmtUserId->execute();
        $stmtUserId->bind_result($user_id);

        if ($stmtUserId->fetch()) {
            $stmtUserId->close();

            // Retrieve products in the user's cart
            $queryCart = "SELECT p.product_id, p.product_name, p.price FROM cart c
                           JOIN products p ON c.product_id = p.product_id
                           WHERE c.user_id = ?";
            $stmtCart = $conn->prepare($queryCart);

            if ($stmtCart) {
                $stmtCart->bind_param("i", $user_id);
                $stmtCart->execute();
                $result = $stmtCart->get_result();

                // Check if the cart is not empty
                if ($result->num_rows > 0) {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>Nom du Produit</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>";

                    // Fetch and display cart products
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p>Le panier est vide.</p>";
                }

                $stmtCart->close();
            } else {
                echo "Erreur lors de la préparation de la requête : " . $conn->error;
            }
        } else {
            echo "Erreur lors de la récupération de l'identifiant utilisateur.";
        }
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
} else {
    echo "Erreur : Utilisateur non connecté.";
}

mysqli_close($conn);
?>
<script>
     $(document).ready(function () {
	$("#btnDeconnexion").click(function () {
            $.ajax({
                type: "GET",
                url: "deconx.php",
                success: function () {
                    window.location.href = "index.php";
                }
            });
        });
    });
</script>
</body>
</html>
