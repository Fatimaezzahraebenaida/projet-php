<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'votre_base_de_donnees';  // Remplacez par le nom de votre base de données
    private $username = 'votre_utilisateur';    // Remplacez par votre utilisateur MySQL
    private $password = 'votre_mot_de_passe';   // Remplacez par votre mot de passe MySQL
    private $conn;

    public function __construct() {
        try {
            // Création de la connexion PDO
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            // Définir le mode d'erreur PDO sur Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
