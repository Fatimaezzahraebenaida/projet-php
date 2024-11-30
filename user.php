<?php
require_once 'Database.php';  // Inclure la classe Database

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Inscription de l'utilisateur
    public function register($username, $email, $password) {
        // Vérifier si l'email existe déjà
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return "L'email est déjà utilisé.";
        }

        // Hacher le mot de passe avant de l'enregistrer
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertion des données dans la base de données
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $hashedPassword])) {
            return true;  // Succès
        } else {
            return "Erreur lors de l'inscription.";
        }
    }

    // Connexion de l'utilisateur
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;  // Retourner l'utilisateur pour la session
        } else {
            return false;  // Identifiants incorrects
        }
    }

    // Vérifier si l'utilisateur est connecté
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Obtenir l'utilisateur actuel
    public function getCurrentUser() {
        if ($this->isLoggedIn()) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            return $stmt->fetch();
        }
        return null;
    }
}
?>
