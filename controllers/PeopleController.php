<?php

namespace App\Controllers;

use App\Models\Crud\CreateModel;
use App\Models\Crud\ReadModel;

class PeopleController
{
    private CreateModel $createSQL;
    private ReadModel $readSQL;

    public function __construct()
    {
        $this->readSQL = new ReadModel();
        $this->createSQL = new CreateModel();
    }

    public function getAll(): void
    {
        $response = [];

        foreach ($this->readSQL->getAllPeople() as $item) {
            $response[] = $item;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function getById(int $id): void
    {
        $response = [];

        foreach ($this->readSQL->getAllPeopleById($id) as $item) {
            $response[] = $item;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function post(): void
    {
        if ($this->createSQL->createPeople()) {
            $response = [
                'status' => 1,
                'message' => 'company added successfully'
            ];
        } else {
            $response = [
                'status' => 0,
                'message ' => 'error: adding has fail'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
