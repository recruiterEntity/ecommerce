<!-- signup.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="process_signup.php" defer></script>
    <script src="singup.js" defer></script>
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
                <h2>Sign Up</h2>
                <form action="process_signup.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" required></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="email" id="email" name="email" required></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td><label for="confirm_password">Confirm Password:</label></td>
                            <td><input type="password" id="confirm_password" name="confirm_password" required></td>
                        </tr>
                        <!-- <tr>
                            <td><label for="copyright_file">Upload Copyright File:</label></td>
                            <td><input type="file" name="copyright_file" id="copyright_file"></td>
                        </tr> -->
                    </table>
                    
                    <!-- Bouton d'envoi du formulaire d'inscription -->
                    <input type="submit" value="Sign Up" >
                </form>
</br>
                <!-- Formulaire d'upload de copyright -->
              <!--  <form action="uploadfile.php" method="post" enctype="multipart/form-data">
                    <label for="copyright_file">Upload Copyright File:</label>
                    <input type="file" name="copyright_file" id="copyright_file">
                    <button type="submit" name="upload_copyright">Upload Copyright</button>
                </form>  -->
            </section>
        </main>
    
    </div>
    <footer>
        <?php include_once 'footer.php'; ?>
    </footer>
</body>
</html>
