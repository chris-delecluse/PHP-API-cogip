<?php

namespace App\Controllers;

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

        if (!empty($response)) {
            http_response_code(200);
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
                'error' => [
                    'status' => 204,
                    'message' => 'error: cannot get this company, this id do not exist !',
                ],
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function post(): void
    {
        if ($this->createSQL->createCompany()) {
            $response = [
                'success' => [
                    'status' => 201,
                    'message' => 'people company successfully'
                ],
            ];
        } else {
            $response = [
                'error' => [
                    'status' => 404,
                    'message ' => 'error: adding company has fail'
                ],
            ];
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($response);
    }

    public function delete(int $id): void
    {
        if ($this->companyAlreadyExist($id) && $this->deleteSQL->removeCompanyById($id)) {
            $response = [
                'success' => [
                    'status' => 200,
                    'message' => 'company delete successfully'
                ],
            ];
        } else {
            $response = [
                'error' => [
                    'status' => 204,
                    'message' => 'error: cannot delete this company, id do not exist !'
                ],
            ];
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
