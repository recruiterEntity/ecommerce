<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Ajoutez ici vos styles CSS pour la page d'administration */
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
            <button class='supprimer' data-id='" . $row['product_id'] . "'>Supprimer</button>
            <button class='mise-a-jour' data-id='" . $row['product_id'] . "'>Mise à jour</button>
          </td>";
    echo "</tr>";
}

echo "</tbody>
    </table>";

mysqli_close($conn);
?>
<button id="btnDeconnexion">Déconnexion</button>
<script>
    $(document).ready(function () {
        $(".supprimer").click(function () {
            var productId = $(this).data("id");

            $.ajax({
                type: "POST",
                url: "deleteprd.php",
                data: { product_id: productId },
                success: function (response) {
                    alert(response);
                    window.location.href = "listPrdAdmin.php"
					
                }
            });
        });

        $(".mise-a-jour").click(function () {
            var productId = $(this).data("id");
            window.location.href = "miseAjour.php?id=" + productId;
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
</script>

</body>
</html>
