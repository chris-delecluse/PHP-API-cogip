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
        $firstname = Request::get()['firstname'];
        $lastname = Request::get()['lastname'];
        $email = Request::get()['email'];
        $phone = Request::get()['phone'];

        $sql = "update people set 
                  firstname = '$firstname',
                  lastname = '$lastname',
                  email = '$email',
                  Phone = $phone
                where Id_People = $id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }

    public function updateCompanyById(int $id): bool
    {
        $idType = Request::put()['idType'];
        $companyName = Request::put()['companyName'];
        $country = Request::put()['country'];
        $vatNumber = Request::put()['vatNumber'];

        $sql = "update companies as c set 
                  Id_Type = $idType,
                  company_name = $companyName,
                  country = $country,
                  vat_number = $vatNumber
                where CompaniesId = $id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }

    public function updateInvoiceById(int $id): bool
    {
        $idCompany = Request::put()['idCompany'];
        $idPeople = Request::put()['idPeople'];
        $numberInvoice = Request::put()['numberInvoice'];
        $date = Request::put()['date'];

        $sql = "update invoices as i set
                  Id_Company = $idCompany,
                  Id_People = $idPeople,
                  number_invoice = $numberInvoice,
                  date = $date
                where i.Id_Invoice = $id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }
}
