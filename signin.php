<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: home.php");
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Cahier de Texte</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
       body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
    overflow-x: hidden;
}
.navbar {
    background-color: #4CAF50;
    display: flex;
    justify-content: space-between;
    padding: 15px 25px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}
.navbar a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    transition: all 0.3s;
}
.navbar a:hover {
    background-color: #45a049;
    border-radius: 5px;
}
.form-container {
    max-width: 500px;
    margin: 100px auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.form-container h2 {
    margin-bottom: 20px;
}
.form-container input, .form-container textarea, .form-container button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form-container button {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    cursor: pointer;
}
.form-container button:hover {
    background-color: #45a049;
}
.contact-container textarea {
    resize: none;
}

    </style>
</head>
<body>
<div class="navbar">
    <a href="home.php" class="logo"><i class="fas fa-graduation-cap"></i> Cahier de Texte</a>
    <div class="right">
        <a href="home.php">Accueil</a>
        <a href="signup.php">S'inscrire</a>
    </div>
</div>
<div class="form-container">
    <h2>Connexion</h2>
    <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="signup.php">S'inscrire</a>.</p>
</div>
</body>
</html>
