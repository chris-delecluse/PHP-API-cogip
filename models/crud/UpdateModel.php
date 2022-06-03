<?php

namespace App\Models\Crud;

use App\Config\Database;
use App\Models\Request;

class UpdateModel
{
    private string|\PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnected();
    }

    public function updatePeopleById(int $id): bool
    {
        $firstname = Request::put()['firstname'];
        $lastname = Request::put()['lastname'];
        $email = Request::put()['email'];
        $phone = Request::put()['phone'];

        $sql = "update people as p set 
                  firstname = $firstname,
                  lastname = $lastname,
                  email = $email,
                  Phone = $phone
                where p.Id_People = $id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }
}