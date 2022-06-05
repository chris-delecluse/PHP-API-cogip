<?php

namespace App\Controllers\API;

use App\Models\Crud\CreateModel;
use App\Models\Crud\DeleteModel;
use App\Models\Crud\ReadModel;

class InvoicesController
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

        foreach ($this->readSQL->getAllInvoices() as $item) {
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

        foreach ($this->readSQL->getInvoiceById($id) as $item) {
            $response[] = $item;
        }

        if (empty($response)) {
            $response = [
                'status' => 0,
                'message' => 'error: cannot get this invoice, id do not exist !'
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
        if ($this->createSQL->createInvoice()) {
            $response = [
                'status' => 1,
                'message' => 'invoice added successfully'
            ];

            http_response_code(201);
        } else {
            $response = [
                'status' => 0,
                'message ' => 'error: adding invoice has fail'
            ];

            http_response_code(404);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function delete(int $id): void
    {
        if ($this->invoiceAlreadyExist($id) && $this->deleteSQL->removeInvoiceById($id)) {
            $response = [
                'status' => 1,
                'message' => 'invoice delete successfully'
            ];

            http_response_code(200);
        } else {
            $response = [
                'status' => 0,
                'message' => 'error: cannot delete this invoice, id do not exist !'
            ];

            http_response_code(204);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function invoiceAlreadyExist(int $id): bool
    {
        if (!is_null($this->readSQL->getInvoiceById($id)[0]['Id_Invoice'])) {
            return true;
        }

        return false;
    }
}
