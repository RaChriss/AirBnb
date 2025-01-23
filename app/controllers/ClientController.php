<?php

namespace app\controllers;

use Flight;

class ClientController
{

    public function __construct() {}

    public function mainPage()
    {
        Flight::render('client/pages/log-Sign');
    }

    public function home()
    {
        session_start();
        $listeHabs = Flight::HabitationModel()->getAllHabitations();
        Flight::render('client/pages/index', ['liste' => $listeHabs]);
    }

    // Inscription d'un client
    public function register()
    {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $mdp1 = $_POST['signup-password'];
        $mdp2 = $_POST['confirm-password'];
        $phone = $_POST['phone'];



        if (!isset($username, $name, $mdp1, $phone)) {
            http_response_code(400);
            Flight::render('client/pages/log-Sign', ['error' => 'All fields are required.']);
            return;
        }

        // Vérifier si le nom d'utilisateur existe déjà
        if (Flight::ClientModel()->getClientByUsername($username)) {
            http_response_code(400);
            Flight::render('client/pages/log-Sign', ['error' => 'Username already exists.']);
            return;
        }

        if ($mdp1 != $mdp2) {
            Flight::render('client/pages/log-Sign', ['error' => 'Invalid PassWord']);
        }

        $result = Flight::ClientModel()->addClient(
            $username,
            $name,
            $mdp1,
            $phone
        );

        if ($result) {
            http_response_code(201);
            Flight::render('client/pages/log-Sign', ['error' => 'Registration successful.']);
        } else {
            http_response_code(500);
            Flight::render('client/pages/log-Sign', ['error' => 'Failed to register client.']);
        }
    }

    // Connexion d'un client
    public function login()
    {
        $username = $_POST['username'];
        $mdp = $_POST['password'];


        if (!isset($username, $mdp)) {
            http_response_code(400);
            Flight::render('client/pages/log-Sign', ['error' => 'Username and password are required.']);
            return;
        }

        $client = Flight::ClientModel()->getClientByUsername($username);

        if (!$client) {
            http_response_code(404);
            Flight::render('client/pages/log-Sign', ['error' => 'Invalid username or password.']);
            return;
        }

        // // Vérifier le mot de passe
        if ($mdp != $client['password']) {
            http_response_code(401);
            Flight::render('client/pages/log-Sign', ['error' => 'Invalid password.']);
            return;
        }

        session_start();
        $_SESSION['user'] = $client;

        $listeHabs = Flight::HabitationModel()->getAllHabitations();
        Flight::render('client/pages/index', ['liste' => $listeHabs]);
        return;
    }
}
