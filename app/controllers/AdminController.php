<?php

namespace app\controllers;

use Flight;

class AdminController
{

    public function __construct() {}

    public function loginPage()
    {
        Flight::render('admin/pages/logIn');
    }

    public function home()
    {
        session_start();
        $listeHabs = Flight::HabitationModel()->getAllHabitations();
        Flight::render('admin/pages/admin', ['liste' => $listeHabs]);
    }


    public function login()
    {
        $name = $_POST['name'];
        $mdp = $_POST['password'];

        if (!isset($name, $mdp)) {
            http_response_code(400);
            Flight::render('admin/pages/logIn', ['error' => 'name and password are required.']);
            return;
        }

        $admin = Flight::AdminModel()->getByName($name);

        if (!$admin) {
            http_response_code(404);
            Flight::render('admin/pages/logIn', ['error' => 'Invalid name or password.']);
            return;
        }

        // // Vérifier le mot de passe
        if ($mdp != $admin['password']) {
            http_response_code(401);
            Flight::render('admin/pages/logIn', ['error' => 'Invalid password.']);
            return;
        }

        session_start();
        $_SESSION['admin'] = $admin;

        $listeHabs = Flight::HabitationModel()->getAllHabitations();
        Flight::render('admin/pages/admin', ['liste' => $listeHabs]);
        return;
    }
}
