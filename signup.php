<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $password])) {
        $_SESSION['user_id'] = $conn->lastInsertId();
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Erreur lors de l'inscription.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Cahier de Texte</title>
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
        <a href="signin.php">Se connecter</a>
    </div>
</div>
<div class="form-container">
    <h2>Inscription</h2>
    <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
</div>
</body>
</html>
