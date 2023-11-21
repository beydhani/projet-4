<?php
// database.php
// PDO (PHP Data Objects), c'est une extension de PHP qui fournit une couche d'abstraction pour l'accès aux bases de données. Elle permet aux développeurs d'utiliser les mêmes fonctions pour interagir avec différents types de bases de données, rendant le code plus portable et facile à maintenir. PDO supporte les transactions, offre une sécurité accrue contre les injections SQL, et facilite la récupération et la manipulation des données.
// Utilisation de PDO pour une connexion sécurisée à la base de données
class Database {
    // informations de connexion à la base de données
    private $host = "localhost"; //Nom du host
    private $db_name = "blog_db"; // Nom de la base de données
    private $username = "root"; // nom d'utilisateur pour la base de données
    private $password = "root"; // mot de passe pour la base de données
    public $conn;

    // Méthode pour établir la connexion
    public function getConnection() {
        $this->conn = null;

        try {
            // Création d'une instance PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Définir le mode d'erreur PDO sur Exception pour qu'il marche avec try catch
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            // Gestion des erreurs de connexion
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
