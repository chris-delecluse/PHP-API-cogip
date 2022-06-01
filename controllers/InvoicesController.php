<?php

namespace App\Controllers;

use App\Models\Crud\ReadModel;

class InvoicesController
{
    private ReadModel $readSQL;

    public function __construct()
    {
        $this->readSQL = new ReadModel();
    }

    public function index(): void
    {
        $response = [];

        foreach ($this->readSQL->getAllInvoices() as $item) {
            $response[] = $item;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function show(int $id): void
    {
        $response = [];

        foreach ($this->readSQL->getAllInvoicesById($id) as $item) {
            $response[] = $item;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}