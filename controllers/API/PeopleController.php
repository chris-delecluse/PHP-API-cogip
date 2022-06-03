<?php

namespace App\Controllers\API;

use App\Models\Crud\CreateModel;
use App\Models\Crud\DeleteModel;
use App\Models\Crud\ReadModel;
use App\Models\Crud\UpdateModel;

class PeopleController
{
    private CreateModel $createSQL;
    private ReadModel $readSQL;
    private UpdateModel $updateSQL;
    private DeleteModel $deleteSQL;

    public function __construct()
    {
        $this->createSQL = new CreateModel();
        $this->readSQL = new ReadModel();
        $this->updateSQL = new UpdateModel();
        $this->deleteSQL = new DeleteModel();
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

        foreach ($this->readSQL->getPeopleById($id) as $item) {
            $response[] = $item;
        }

        if (empty($response)) {
            $response = [
                'status' => 0,
                'message' => 'error: id not match !'
            ];

            http_response_code(500);
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

            http_response_code(500);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function put(int $id): void
    {
        if ($this->peopleAlreadyExist($id) && $this->updateSQL->updatePeopleById($id)) {
            $response = [
                'status' => 1,
                'message' => 'update people successfully'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'error: update has fail cannot found this id'
            ];

            http_response_code(500);
        }

        header('Content-type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function delete(int $id): void
    {
        if ($this->peopleAlreadyExist($id) && $this->deleteSQL->removePeopleById($id)) {
            $response = [
                'status' => 1,
                'message' => 'people delete successfully'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'error: id do not match'
            ];

            http_response_code(500);
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
