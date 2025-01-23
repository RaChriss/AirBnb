<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Airbnb Clone</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    <header class="admin-header">
        <nav>
            <div class="logo">
                <a href="homeAdmin">
                    <img src="../../assets/images/Airbnb_Logo_Bélo.svg" alt="Airbnb">
                </a>
                <span class="admin-badge">Admin</span>
            </div>
            <div class="admin-nav">
                <a href="/" class="admin-link">Voir le site</a>
                <a href="decoAdmin" class="admin-logout">Déconnexion</a>
            </div>
        </nav>
    </header>

    <main class="admin-main">
        <div class="admin-sidebar">
            <h2>Dashboard</h2>
            <ul class="admin-menu">
                <li class="active"><a href="#listings">Annonces</a></li>
                <li><a href="#users">Utilisateurs</a></li>
                <li><a href="#stats">Statistiques</a></li>
            </ul>
        </div>