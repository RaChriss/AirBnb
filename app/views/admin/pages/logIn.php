<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/logAdmin.css">
    <title>Administration - Connexion</title>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <!-- Icône de bâtiment moderne -->
            <svg width="80" height="80" viewBox="0 0 24 24" fill="#ef5350">
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <h1>Espace Administrateur</h1>
            <p>Plateforme de gestion immobilière</p>
        </div>

        <div class="error-message" id="error-message">
            Identifiants incorrects. Veuillez réessayer.
        </div>

        <form id="admin-login-form">
            <div class="form-group">
                <label for="username">Identifiant administrateur</label>
                <input type="text" id="username" name="username" required 
                       placeholder="Entrez votre identifiant">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required 
                           placeholder="Entrez votre mot de passe">
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
            </div>

            <div class="remember-forgot">
                <a href="#" class="forgot-password">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="login-button">
                Connexion
            </button>
        </form>

        <div class="security-notice">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"/>
            </svg>
            <span>Connexion sécurisée à l'espace administrateur</span>
        </div>
    </div>
    <script src="../../assets/js/mine.js"></script>
</body>
</html>