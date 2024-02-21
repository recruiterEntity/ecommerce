
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$user = 'root';
$password = 'root';
$db = 'ecommerce';
$host = 'localhost';
$port = 3307;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

if (!$success) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Get form data
$login = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Insert user data into the database
$sql = "INSERT INTO users (username, password, email) VALUES ('$login', '$password', '$email')";

if (mysqli_query($link, $sql)) {
    // Send email
    $to = $email;
    $subject = 'Your login details for My Techstore';
    $message = "Hello,\n\nYour login details for My Techstore are:\n\nLogin: $login\nPassword: $password\n\nThank you for registering. Best regards,\nThe My Techstore Team";
    $headers = 'From: My Techstore <noreply@mytechstore.com>' . "\r\n" . 'Reply-To: noreply@mytechstore.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'User registered successfully. Email sent.';
    } else {
      
        echo ' send email.'.$to.' perfectly';
        echo $message;
    }
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($link);
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Techstore</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="process_signup.php" defer></script>
    <script src="login.js" defer></script>
  </head>
  <body>
    <header>
      <?php include_once 'header.php'; ?>
    </header>
    <main>
    <div class="defiled-images">
        <?php include_once 'defiled-images.php'; ?>
      </div>

      <?php
if (isset($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']); // Use htmlspecialchars to sanitize the input
    echo "<h2>Bienvenue $login</h2>";
} else {
    echo "<p>Login not provided.</p>";
}
?>
        <section>
           
            <p>Bienvenue sur le site Techhub Store. Nous sommes votre destination incontournable pour les produits technologiques de haute qualité.</p>
        </section> 
            
    </main>
    <nav>
      <?php include_once 'menu.php'; ?>
    </nav>
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>
