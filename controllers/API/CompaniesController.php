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
        $this->readSQL = new ReadModel();
        $this->deleteSQL = new DeleteModel();
        $this->createSQL = new CreateModel();
    }

    public function get(): void
    {
        $response = [];

        foreach ($this->readSQL->getAllCompanies() as $item) {
            $response[] = $item;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function post(): void
    {

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function delete(int $id): void
    {
        if ($this->deleteSQL->removeCompanyById($id)) {
            $response = [
                'status' => 0,
                'message' => 'company delete successfully'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'error: delete has fail'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}