<?php

namespace app\models;

class HabitationModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function reserve($client_id, $habitation_id, $start_date, $end_date, $total)
    {
        $query = "INSERT INTO Reservation (client_id, habitation_id, start_date, end_date, total_cost) 
                    VALUES (:user, :habs, :start_date , :depart, :total_cost)";
        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':user' => $client_id,
            ':habs' => $habitation_id,
            ':start_date' => $start_date,
            ':depart' => $end_date,
            ':total_cost' => $total,
        ]);
    }

    public function checkAvailable($id, $arrivee, $depart)
    {
        $query = "SELECT * FROM Reservation WHERE habitation_id = :id AND (start_date <= :arrivee AND end_date >= :depart)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':arrivee' => $arrivee,
            ':depart' => $depart
        ]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Ajouter une habitation
    public function addHabitation($type, $numberOfRooms, $dailyRent, $photos, $neighborhood, $description)
    {
        $query = "INSERT INTO Habitation (type, number_of_rooms, daily_rent, photos, neighborhood, description) 
                  VALUES (:type, :number_of_rooms, :daily_rent, :photos, :neighborhood, :description)";
        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':type' => $type,
            ':number_of_rooms' => $numberOfRooms,
            ':daily_rent' => $dailyRent,
            ':photos' => $photos,
            ':neighborhood' => $neighborhood,
            ':description' => $description,
        ]);
    }

    // Récupérer toutes les habitations
    public function getAllHabitations()
    {
        $query = "SELECT * FROM Habitation";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Récupérer une habitation par ID
    public function getHabitationById($id)
    {
        $query = "SELECT * FROM Habitation WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Mettre à jour une habitation
    public function updateHabitation($id, $type, $numberOfRooms, $dailyRent, $photos, $neighborhood, $description)
    {
        $query = "UPDATE Habitation 
                  SET type = :type, number_of_rooms = :number_of_rooms, daily_rent = :daily_rent, 
                      photos = :photos, neighborhood = :neighborhood, description = :description 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':id' => $id,
            ':type' => $type,
            ':number_of_rooms' => $numberOfRooms,
            ':daily_rent' => $dailyRent,
            ':photos' => $photos,
            ':neighborhood' => $neighborhood,
            ':description' => $description,
        ]);
    }

    // Supprimer une habitation
    public function deleteHabitation($id)
    {
        $query = "DELETE FROM Habitation WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    // Récupérer les habitations par description
    public function getHabitationsByDescription($keyword)
    {
        $query = "SELECT * FROM Habitation WHERE description LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
