<?php

namespace App\Models\Crud;

use App\Config\Database;

class DeleteModel
{
    private string|\PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnected();
    }

    public function removeCompanyById(int $id): bool
    {
        $sql = "delete from companies where CompaniesId = $id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }
}