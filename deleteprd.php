<?php
include("connexion_bdd.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Supprimer le produit de la table "products" dans la base de données
    $query = "DELETE FROM products WHERE product_id = '$productId'";
    
    if (mysqli_query($conn, $query)) {
        // Rediriger vers admin.php après la suppression
        echo "Produit supprimé avec succès!";
        exit();
    } else {
        echo "Erreur lors de la suppression du produit : " . mysqli_error($conn);
    }
} else {
    echo "Erreur : ID de produit manquant.";
}

mysqli_close($conn);
?>