<?php

namespace App\Controllers\API;

use App\Models\Crud\CreateModel;
use App\Models\Crud\DeleteModel;
use App\Models\Crud\ReadModel;

class CompaniesController
{
    private CreateModel $createSQL;
    private ReadModel $readSQL;
    private DeleteModel $deleteSQL;

    public function __construct()
    {
        $this->createSQL = new CreateModel();
        $this->readSQL = new ReadModel();
        $this->deleteSQL = new DeleteModel();
    }

    public function getAll(): void
    {
        $response = [];

        foreach ($this->readSQL->getAllCompanies() as $item) {
            $response[] = $item;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function getById(int $id): void
    {
        $response = [];

        foreach ($this->readSQL->getCompanyById($id) as $item) {
            $response[] = $item;
        }

        if (empty($response)) {
            $response = [
                'status' => 0,
                'message' => 'error: id not match !'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function post(): void
    {
        if ($this->createSQL->createCompany()) {
            $response = [
                'status' => 1,
                'message' => 'company added successfully'
            ];
        } else {
            $response = [
                'status' => 0,
                'message ' => 'error: adding has fail'
            ];

            http_response_code(500);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function delete(int $id): void
    {
        if ($this->companyAlreadyExist($id) && $this->deleteSQL->removeCompanyById($id)) {
            $response = [
                'status' => 0,
                'message' => 'company delete successfully'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'error: delete has fail'
            ];

            http_response_code(500);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function companyAlreadyExist(int $id): bool
    {
        if (!is_null($this->readSQL->getCompanyById($id)[0]['CompaniesId'])) {
            return true;
        }

        return false;
    }
}
