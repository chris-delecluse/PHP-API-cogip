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
        $companyId = htmlspecialchars(Request::post()['companyId']);
        $firstname =  htmlspecialchars(Request::post()['firstname']);
        $lastname = htmlspecialchars(Request::post()['lastname']);
        $email = htmlspecialchars(Request::post()['email']);
        $phone = htmlspecialchars(Request::post()['phone']);

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
        $idType = htmlspecialchars(Request::post()['idType']);
        $companyName = htmlspecialchars(Request::post()['companyName']);
        $country = htmlspecialchars(Request::post()['country']);
        $vatNumber = htmlspecialchars(Request::post()['vatNumber']);

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
        $companyId = htmlspecialchars(Request::post()['companyId']);
        $peopleId = htmlspecialchars(Request::post()['peopleId']);
        $numberInvoice = htmlspecialchars(Request::post()['numberInvoice']);
        $date = htmlspecialchars(Request::post()['date']);

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
