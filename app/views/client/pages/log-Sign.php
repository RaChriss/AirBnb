<?php
if (isset($error)) {
    $message = $error;
} else {
    $message = '';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/logAdmin.css">
    <link rel="stylesheet" href="../../assets/css/log.css">
    <title>Connexion/Inscription - Immobilier de luxe</title>
</head>

<body>
    <div class="container">
        <div class="info-side">
            <h2>Bienvenue dans votre espace immobilier</h2>
            <p>Découvrez des biens d'exception et gérez vos propriétés en toute simplicité. Notre plateforme vous offre une expérience unique dans le monde de l'immobilier haut de gamme.</p>
            <p>Déjà plus de 10 000 propriétaires nous font confiance pour la gestion de leurs biens.</p>
        </div>

        <div class="form-side">
            <div class="form-container">
                <div class="tab-buttons">
                    <button class="tab-button active">Connexion</button>
                    <button class="tab-button">Inscription</button>
                </div>

                <!-- Formulaire de connexion -->
                <form id="login-form" action="connect" method="POST">
                    <div class="form-group">
                        <label for="username">Your username</label>
                        <input type="username" name="username" id="username" required value="jdupont" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" value="client1" required placeholder="Votre mot de passe">
                            <span class="toggle-password" onclick="togglePassword()">👁️</span>
                        </div>
                    </div>

                    <div class="forgot-password">
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                    <h3><?= $message ?></h3>
                    <button type="submit" class="submit-button">Se connecter</button>
                </form>

                <!-- Formulaire d'inscription (caché par défaut) -->
                <form id="signup-form" style="display: none;" action="inscription" method="POST">
                    <div class="form-group">
                        <label for="full-name">Nom complet</label>
                        <input type="text" name="name" id="full-name" required placeholder="Votre nom complet">
                    </div>

                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" required placeholder="Your User Name">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" required placeholder="+261...">
                    </div>

                    <div class="form-group">
                        <label for="signup-password">Mot de passe</label>
                        <input type="password" name="signup-password" id="signup-password" required placeholder="Choisissez un mot de passe">
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirmer le mot de passe</label>
                        <input type="password" name="confirm-password" id="confirm-password" required placeholder="Confirmez votre mot de passe">
                    </div>

                    <h3><?= $message ?></h3>
                    <button type="submit" class="submit-button">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <!-- script js -->
    <script src="../../assets/js/log.js"></script>
    <script src="../../assets/js/mine.js"></script>
</body>

</html>