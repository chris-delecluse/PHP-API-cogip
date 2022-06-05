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
                'message' => 'error: id not match !'
            ];

            http_response_code(500);
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
        if ($this->invoiceAlreadyExist($id) && $this->deleteSQL->removeInvoiceById($id)) {
            $response = [
                'status' => 1,
                'message' => 'invoice delete successfully'
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

    private function invoiceAlreadyExist(int $id): bool
    {
        if (!is_null($this->readSQL->getInvoiceById($id)[0]['Id_Invoice'])) {
            return true;
        }

        return false;
    }
}
