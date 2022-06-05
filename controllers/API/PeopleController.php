<?php

namespace App\Controllers\API;

use App\Models\Crud\CreateModel;
use App\Models\Crud\DeleteModel;
use App\Models\Crud\ReadModel;

class PeopleController
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

        foreach ($this->readSQL->getAllPeople() as $item) {
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

        foreach ($this->readSQL->getPeopleById($id) as $item) {
            $response[] = $item;
        }

        if (empty($response)) {
            $response = [
                'status' => 0,
                'message' => 'error: cannot get this people, id do not exist !'
            ];

            http_response_code(204);
        } else {
            http_response_code(200);
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function post(): void
    {
        if ($this->createSQL->createPeople()) {
            $response = [
                'status' => 1,
                'message' => 'people added successfully'
            ];

            http_response_code(201);
        } else {
            $response = [
                'status' => 0,
                'message ' => 'error: adding people has fail'
            ];

            http_response_code(404);
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($response);
    }

    public function delete(int $id): void
    {
        if ($this->peopleAlreadyExist($id) && $this->deleteSQL->removePeopleById($id)) {
            $response = [
                'status' => 1,
                'message' => 'people delete successfully'
            ];

            http_response_code(200);
        } else {
            $response = [
                'status' => 0,
                'message' => 'error: cannot delete this people, id do not exist !'
            ];

            http_response_code(204);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function peopleAlreadyExist(int $id): bool
    {
        if (!is_null($this->readSQL->getPeopleById($id)[0]['Id_People'])) {
            return true;
        }

        return false;
    }
}
