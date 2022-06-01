<?php

namespace App\Controllers;

use App\Models\Crud\DeleteModel;
use App\Models\Crud\ReadModel;

class CompaniesController
{
    private ReadModel $readSQL;
    private DeleteModel $deleteSQL;

    public function __construct()
    {
        $this->readSQL = new ReadModel();
        $this->deleteSQL = new DeleteModel();
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
                'message' => 'company delete has fail'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}