<?php

namespace App\Models\Crud;

use App\Config\Database;
use App\Models\Request;

class CreateModel
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnected();
    }

    public function createPeople(): bool
    {
        $firstname = Request::get()['firstname'];
        $lastname = Request::get()['lastname'];
        $email = Request::get()['email'];
        $phone = Request::get()['phone'];

        $sql = "insert into people (Id_Company, firstname, lastname, email, Phone)
                values (:id_company, :firstname, :lastname, :email, :phone)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_company' => 0,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    public function createCompany(): bool
    {
        $idType = Request::get()['idType'];
        $companyName = Request::get()['companyName'];
        $country = Request::get()['country'];
        $vatNumber = Request::get()['vatNumber'];

        $sql = "insert into companies (Id_Type, company_name, country, vat_number)
                values (:id_type, :name, :country, :vat)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_type' => $idType,
            'name' => $companyName,
            'country' => $country,
            'vat' => $vatNumber
        ]);
    }
}