<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Techstore</title>
    <link rel="stylesheet" type="text/css" href="styles/styles2.css" />
</head>
<body>
    

    <div class="defiled-images">
        <?php
        $images = glob('img/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        shuffle($images);
        $imageCount = count($images);
        $imagesPerRow = 3;
        $rows = ceil($imageCount / $imagesPerRow);
        for ($i = 0; $i < $rows; $i++) {
            echo '<div class="flex-row">';
            for ($j = 0; $j < $imagesPerRow; $j++) {
                $index = ($i * $imagesPerRow) + $j;
                if (isset($images[$index])) {
                    echo '<img src="' . $images[$index] . '" alt="Image">';
                }
            }
            echo '</div>';
        }
        ?>
    </div>

    <!-- ... (le reste de votre contenu) ... -->

</body>
</html>
