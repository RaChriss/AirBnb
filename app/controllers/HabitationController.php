<?php

namespace app\controllers;

use app\models\HabitationModel;
use DateTime;
use Flight;

class HabitationController
{

    public function __construct() {}

    public function doUpdate()
    {
        
    }

    public function update()
    {
        $listeHabs = Flight::HabitationModel()->getAllHabitations();
        if (!isset($_GET['idHabs']) || empty($_GET['idHabs'])) {
            Flight::render('admin/pages/admin', ['liste' => $listeHabs]);
            return;
        }
        $id = $_GET['idHabs'];
        $result = Flight::HabitationModel()->getHabitationById($id);
        if ($result) {
            Flight::render('admin/pages/update', ['toUpdate' => $result]);
        } else {
            Flight::render('admin/pages/admin', ['liste' => $listeHabs, 'error' => "Erreur Inconnue"]);
        }
    }

    public function delete()
    {
        $listeHabs = Flight::HabitationModel()->getAllHabitations();
        if (!isset($_GET['idHabs']) || empty($_GET['idHabs'])) {
            Flight::render('admin/pages/admin', ['liste' => $listeHabs]);
            return;
        }
        $id = $_GET['idHabs'];
        if (Flight::HabitationModel()->deleteHabitation($id)) {
            $listeUpdate = Flight::HabitationModel()->getAllHabitations();
            Flight::render('admin/pages/admin', ['liste' => $listeUpdate, 'error' => "Suppression Effecute Avec Succes"]);
        } else {
            Flight::render('admin/pages/admin', ['liste' => $listeHabs, 'error' => "Erreur lors de la Suppression"]);
        }
    }

    public function doReservation()
    {
        $id = $_POST['idHabs'];
        $habs = Flight::HabitationModel()->getHabitationById($id);
        if (!isset($_POST['arrivee'], $_POST['depart']) || (empty($_POST['arrivee']) && empty($_POST['depart']))) {
            Flight::render('client/pages/details', ['habitation' => $habs, 'error' => 'Arrivee et Depart Indefinie']);
            return;
        }
        session_start();
        $arrivee = $_POST['arrivee'];
        $depart = $_POST['depart'];
        $client_id = $_SESSION['user']['id'];

        if (Flight::HabitationModel()->checkAvailable($id, $arrivee, $depart)) {
            Flight::render('client/pages/details', ['habitation' => $habs, 'error' => 'Habitation non Dispo Pour les Dates Fournis']);
            return;
        }
        $date1 = new DateTime($arrivee);
        $date2 = new DateTime($depart);

        $interval = $date1->diff($date2);
        $nbrJour = $interval->days;

        $totalCost =  $habs['daily_rent'] * $nbrJour;

        if (Flight::HabitationModel()->reserve($client_id, $id, $arrivee, $depart, $totalCost)) {
            Flight::render('client/pages/details', ['habitation' => $habs, 'error' => 'Reservation Effectuee avec Success']);
        } else {
            Flight::render('client/pages/details', ['habitation' => $habs, 'error' => 'Erreur lors de la Reservation']);
        }
    }

    public function details()
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $listeHabs = Flight::HabitationModel()->getAllHabitations();

            Flight::render('client/pages/index', ['liste' => $listeHabs]);
            return;
        }

        $id = $_GET['id'];
        $results = Flight::HabitationModel()->getHabitationById($id);

        if (empty($results)) {
            http_response_code(404);
            Flight::render('client/pages/index', ['error' =>  'No habitations found.']);
        } else {
            http_response_code(200);
            Flight::render('client/pages/details', ['habitation' => $results]);
        }
    }

    // Rechercher des habitations
    public function searchHabitations()
    {
        // Vérifier si la variable 'annonce' est définie dans $_GET
        if (!isset($_GET['annonce']) || empty($_GET['annonce'])) {
            http_response_code(400);
            echo json_encode(['error' => 'The "annonce" parameter is required.']);
            return;
        }

        $keyword = $_GET['annonce'];

        // Rechercher les habitations avec le mot-clé
        $results = Flight::HabitationModel()->getHabitationsByDescription($keyword);

        if (empty($results)) {
            http_response_code(404);
            echo json_encode(['message' => 'No habitations found for the given keyword.']);
        } else {
            http_response_code(200);
            echo json_encode($results);
        }
    }

    // Exemple d'affichage de toutes les habitations (optionnel)
    public function getAllHabitations()
    {
        $results = Flight::HabitationModel()->getAllHabitations();

        if (empty($results)) {
            http_response_code(404);
            echo json_encode(['message' => 'No habitations found.']);
        } else {
            http_response_code(200);
            echo json_encode($results);
        }
    }
}
