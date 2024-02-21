<?php
include("connexion_bdd.php");

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Récupérer les informations du produit à mettre à jour
    $query = "SELECT * FROM products WHERE product_id = '$productId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Erreur : Produit non trouvé.";
        exit();
    }
} else {
    echo "Erreur : ID de produit manquant.";
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données soumises
    $newProductName = $_POST['new_product_name'];
    $newProductPrice = $_POST['new_product_price'];

    // Mettre à jour les informations du produit dans la base de données
    $updateQuery = "UPDATE products SET product_name = '$newProductName', price = '$newProductPrice' WHERE product_id = '$productId'";

    if (mysqli_query($conn, $updateQuery)) {
        // Produit mis à jour avec succès, afficher le message dans la balise script
        echo '<script>
                alert("Produit mis à jour avec succès.");
                window.location.href = "listPrdAdmin.php";
              </script>';
        exit();
    } else {
        echo "Erreur lors de la mise à jour du produit : " . mysqli_error($conn);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour du Produit</title>
    <!-- Ajoutez ici vos liens CSS ou d'autres ressources nécessaires -->
</head>
<body>

<h2>Mise à Jour du Produit</h2>

<form method="POST">
    <label for="new_product_name">Nouveau Nom du Produit:</label>
    <input type="text" id="new_product_name" name="new_product_name" value="<?php echo $product['nom_produit']; ?>" required><br>
    <label for="new_product_price">Nouveau Prix:</label>
    <input type="text" id="new_product_price" name="new_product_price" value="<?php echo $product['prix']; ?>" required><br>
    <button type="submit">Mettre à Jour</button>
</form>

</body>
</html>
