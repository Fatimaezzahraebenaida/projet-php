<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cahier de Texte - Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMv6eO2ab9QyIy0HcmK6ujJZ5FhYOS2j4oK2c0" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9; /* Soft gray background */
            color: #333; /* Dark text */
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background-color: #4CAF50; /* Green */
            display: flex;
            justify-content: space-between;
            padding: 15px 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
            width: 100%;
        }

        .navbar .logo {
            font-size: 2em;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 12px 20px;
            margin-left: 20px;
            transition: all 0.3s ease-in-out;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #45a049; /* Light green */
            color: #fff;
            transform: translateY(-3px);
        }

        /* Hero Section */
        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://www.leconomiste.com/sites/default/files/eco7/public/emsi_tt_casa_800_400.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            position: relative;
            padding: 0 20px;
        }

        .hero::before {
            content: ''; 
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-transform: uppercase;
        }

        .hero-content h1 {
            font-size: 3.5em;
            font-weight: bold;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }

        .hero-content p {
            font-size: 1.2em;
            margin-bottom: 30px;
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-content .btn {
            background-color: #4CAF50;
            color: white;
            font-size: 1.1em;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .hero-content .btn:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }

        /* Features Section */
        .features {
            padding: 60px 30px;
            background-color: #ffffff;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: -60px;
            z-index: 999;
            position: relative;
        }

        .features h2 {
            font-size: 2.8em;
            color: #4CAF50;
            margin-bottom: 40px;
            font-weight: 600;
        }

        .feature-item {
            display: inline-block;
            width: 30%;
            padding: 25px;
            background-color: #ffffff;
            margin: 15px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .feature-item i {
            font-size: 3.5em;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .feature-item h3 {
            font-size: 1.9em;
            color: #333;
            margin-bottom: 15px;
        }

        .feature-item p {
            font-size: 1.1em;
            color: #777;
        }

        /* Footer */
        .footer {
            background-color: #4CAF50;
            color: white;
            padding: 40px 20px;
            text-align: center;
            font-size: 1.1em;
            margin-top: 60px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            margin-left: 15px;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                height: auto;
                text-align: center;
            }

            .features .feature-item {
                width: 100%;
                margin-bottom: 30px;
            }

            .navbar {
                padding: 15px 20px;
            }

            .hero-content h1 {
                font-size: 2.8em;
            }

            .hero-content p {
                font-size: 1.1em;
            }

            .hero-content .btn {
                font-size: 1em;
                padding: 10px 25px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <a href="home.php" class="logo">
        <i class="fas fa-graduation-cap"></i> EMSI
    </a>
    <div class="right">
        <a href="home.php">Accueil</a>
        <a href="about.php">À Propos</a>
        <a href="services.php">Nos Services</a>
        <a href="signin.php">Se Connecter</a>
        <a href="signup.php">S'inscrire</a>
        
        <a href="contact.php">Contact</a>
    </div>
</div>

<!-- Hero Section -->
<div class="hero">
    <div class="hero-content">
        <h1>Bienvenue sur votre Cahier de Texte Digital</h1>
        <p>Gérez vos cours, assignez des devoirs et suivez les progrès de vos étudiants avec un seul outil.</p>
        <a href="about.php" class="btn">En savoir plus</a>
    </div>
</div>

<!-- Features Section -->
<div class="features">
    <h2>Les Fonctionnalités</h2>
    <div class="feature-item">
        <i class="fas fa-book"></i>
        <h3>Gestion de Cours</h3>
        <p>Créez, éditez et organisez vos cours de manière simple et efficace.</p>
    </div>
    <div class="feature-item">
        <i class="fas fa-pencil-alt"></i>
        <h3>Devoirs et Évaluations</h3>
        <p>Assignez des devoirs, des projets et évaluez les progrès des étudiants.</p>
    </div>
    <div class="feature-item">
        <i class="fas fa-users"></i>
        <h3>Suivi des Étudiants</h3>
        <p>Suivez la progression et les performances de vos étudiants à tout moment.</p>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Cahier de Texte - EMSI</p>
    <p>
        <a href="privacy.php">Politique de Confidentialité</a> |
        <a href="terms.php">Conditions d'Utilisation</a> |
        <a href="contact.php">Contactez-nous</a>
    </p>
</div>

</body>
</html>
