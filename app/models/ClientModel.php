<?php

namespace app\models;

use Flight;

class ClientModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter un nouveau client
    public function addClient($username, $name, $password, $phone_number)
    {
        $query = "INSERT INTO Client (username, name, password, phone_number) VALUES (:username, :name, :password, :phone_number)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':username' => $username,
            ':name' => $name,
            ':password' => $password,
            ':phone_number' => $phone_number,
        ]);
    }

    // Récupérer un client par son ID
    public function getClientById($id)
    {
        $query = "SELECT id, username, name, phone_number FROM Client WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer tous les clients
    public function getAllClients()
    {
        $query = "SELECT id, username, name, phone_number FROM Client";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Mettre à jour un client
    public function updateClient($id, $name, $phone_number)
    {
        $query = "UPDATE Client SET name = :name, phone_number = :phone_number WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':phone_number' => $phone_number,
        ]);
    }

    // Supprimer un client
    public function deleteClient($id)
    {
        $query = "DELETE FROM Client WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function getClientByUsername($username)
    {
        $query = "SELECT * FROM Client WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}