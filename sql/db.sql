--Le schéma de base de données pour ce projet comprend deux tables :
--utilisateurs : Une table qui stocke les comptes d'utilisateurs.
--produits : Une table qui stocke la liste des produits.
--cart pour panier (user1 et produit)

-- Table des utilisateurs
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Table des produits
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);
-- Table du panier
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- ========================= Insertion des donnees
-- Insérer des données dans la table "users"
INSERT INTO users (user_id, username, password, email)
VALUES
    (1, 'login1', 'motdepasse1', 'login1@example.com'),
    (2, 'login2', 'motdepasse2', 'login2@example.com'),
    (3, 'login3', 'motdepasse3', 'login3@example.com'),
    (4, 'login4', 'motdepasse4', 'login4@example.com'),
    (5, 'login5', 'motdepasse5', 'login5@example.com');

-- Insérer des données dans la table "products"
INSERT INTO products (product_id, product_name, price, description)
VALUES
    (1, 'pcdell', 899.99, 'Ordinateur portable Dell'),
    (2, 'datashowepson', 499.99, 'Projecteur Epson'),
    (3, 'pm4sumsunf', 599.99, 'Téléphone Samsung Galaxy M4'),
    (4, 'playstation5', 499.99, 'Console de jeu PlayStation 5'),
    (5, 'imprimante hp', 129.99, 'Imprimante HP tout-en-un');
--====================================================Cart
-- Insérer des données dans la table "cart"
INSERT INTO cart (cart_id, user_id, product_id, quantity)
VALUES
    (1, 1, 3, 2), -- Utilisateur login1 a ajouté 2 unités de pm4sumsunf à son panier
    (2, 2, 4, 1); -- Utilisateur login2 a ajouté 1 unité de playstation5 à son panier
