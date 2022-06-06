<?php

namespace App\Controllers;

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
                'error' => [
                    'status' => 204,
                    'message' => 'error: cannot get this invoice, this id do not exist !',
                ],
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function post(): void
    {
        if ($this->createSQL->createInvoice()) {
            $response = [
                'success' => [
                    'status' => 201,
                    'message' => 'invoice created successfully'
                ],
            ];
        } else {
            $response = [
                'error' => [
                    'status' => 404,
                    'message ' => 'error: adding invoice has fail'
                ],
            ];
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($response);
    }

    public function delete(int $id): void
    {
        if ($this->invoiceAlreadyExist($id) && $this->deleteSQL->removeInvoiceById($id)) {
            $response = [
                'success' => [
                    'status' => 200,
                    'message' => 'invoice delete successfully'
                ],
            ];
        } else {
            $response = [
                'error' => [
                    'status' => 204,
                    'message' => 'error: cannot delete this invoice, id do not exist !'
                ],
            ];
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
