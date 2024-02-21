<!DOCTYPE html>
<html>
  <head>
    <title>My Techstore</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
  </head>
  <body>
    <header>
      
      <?php include_once 'header.php'; ?>
    </header>
    <div class="you">
    <main>
      <div class="defiled-images">
        <?php include_once 'defiled-images.php'; ?>
        </div>
      <section>
            <h2>Introduction</h2>
            <p>Bienvenue sur le site Techhub Store. Nous sommes votre destination incontournable pour les produits technologiques de haute qualité.</p>
        </section>
        
        <section>
            <h2>Adresse</h2>
            <p>Notre adresse au Maroc :<br>
            123 Rue Tech, Ville Tech, Code Postal Tech</p>
        </section>

        <section>
            <h2>Numéro de Téléphone</h2>
            <p>Contactez-nous au : +212 123 456 789</p>
        </section>
        
    </main>
    </div>
    <nav>
      <?php include_once 'menu.php'; ?>
    </nav>
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>
