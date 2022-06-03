<?php

namespace App\Models\Crud;

use App\Config\Database;

class ReadModel
{
    private string|\PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnected();
    }

    public function getAllPeople(): bool|array
    {
        $sql = "select * from people as p";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPeopleById(int $id): bool|array
    {
        $sql = "select * from people as p where p.Id_People = $id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllInvoices(): bool|array
    {
        $sql = "select * from invoices as i";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getInvoiceById(int $id): bool|array
    {
        $sql = "select * from invoices as i where i.Id_Invoice = $id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllCompanies(): bool|array
    {
        $sql = "select * from companies as c
                inner join type_company tc on tc.Id_Type = c.Id_Type";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCompanyById(int $id): bool|array
    {
        $sql = "select * from companies as c
                inner join type_company tc on tc.Id_Type = c.Id_Type
                where c.CompaniesId = $id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
