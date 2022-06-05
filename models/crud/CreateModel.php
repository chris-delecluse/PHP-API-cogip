<?php

namespace App\Models\Crud;

use App\Config\Database;
use App\Models\Request;

class CreateModel
{
    private string|\PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnected();
    }

    public function createPeople(): bool
    {
        $companyId = Request::post()['companyId'];
        $firstname = Request::post()['firstname'];
        $lastname = Request::post()['lastname'];
        $email = Request::post()['email'];
        $phone = Request::post()['phone'];

        $sql = "insert into people (Id_Company, firstname, lastname, email, Phone)
                values (:id_company, :firstname, :lastname, :email, :phone)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_company' => $companyId,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    public function createCompany(): bool
    {
        $idType = Request::post()['idType'];
        $companyName = Request::post()['companyName'];
        $country = Request::post()['country'];
        $vatNumber = Request::post()['vatNumber'];

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

    public function createInvoice(): bool
    {
        $companyId = Request::post()['companyId'];
        $peopleId = Request::post()['peopleId'];
        $numberInvoice = Request::post()['numberInvoice'];
        $date = Request::post()['date'];

        $sql = "insert into invoices (Id_Company, Id_People, number_invoice, date)
                values (:companyId, :peopleId, :numberInvoice, :date)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'companyId' => $companyId,
            'peopleId' => $peopleId,
            'numberInvoice' => $numberInvoice,
            'date' => $date
        ]);
    }
}
