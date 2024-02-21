<!-- signup.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <header>
    <?php include_once 'header.php'; ?> 
    </header>
    <nav>
        <?php include_once 'menu.php'; ?>
    </nav>
    <div>
    <main>
    <div class="defiled-images">
        <?php include_once 'defiled-images.php'; ?>
      </div>
            <section>
                <h2>Sign In</h2>
                <form action="checkcnx.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" required></td>
                        </tr>
                        
                        
                    </table>
                    
                    <!-- Bouton d'envoi du formulaire d'inscription -->
                    <input type="submit" value="Connexion" >
                </form>

        </main>
    
    </div>
    <footer>
        <?php include_once 'footer.php'; ?>
    </footer>
</body>
</html>
