<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Boutique</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Ajoutez ici vos styles CSS si nécessaire */
    </style>
</head>
<body>

<?php
session_start();
include("connexion_bdd.php");

echo "<table>
        <thead>
            <tr>
                <th>Nom du Produit</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>
            <button class='commander' data-id='" . $row['product_id'] . "'>Commander</button>
          </td>";
    echo "</tr>";
}

echo "</tbody>
    </table>";

mysqli_close($conn);
?>
<button id="btnDeconnexion">Déconnexion</button>
<button id="VoirPanier">Voir Contenu du Panier</button>
<script>
    $(document).ready(function () {
        $(".commander").click(function () {
            var productId = $(this).data("id");

            $.ajax({
                type: "POST",
                url: "ajouterPanier.php",
                data: { product_id: productId },
                success: function (response) {
                    if (response.success) {
                        // Afficher le popup de confirmation
                        alert("Produit ajouté au panier avec succès!");

                        // Rediriger vers la liste des produits
                        window.location.href = "ListProduitForUser.php";
                    } else {
                        // En cas d'erreur, afficher un message d'erreur
                        alert("Erreur : " + response.message);
                    }
                }
            });
        });
    });
	$("#btnDeconnexion").click(function () {
            $.ajax({
                type: "GET",
                url: "deconx.php",
                success: function () {
                    window.location.href = "index.php";
                }
            });
        });
        $("#VoirPanier").click(function () {
            // Rediriger vers la liste des produits dans le panier
            window.location.href = "ListPrdtsPanier.php";
        });
</script>

</body>
</html>
