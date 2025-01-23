<?php

namespace app\models;

use Flight;

class AdminModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getById($id)
    {
        $query = "SELECT * FROM Administrator WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getByName($name)
    {
        $query = "SELECT * FROM Administrator WHERE name = :name";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':name' => $name]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}