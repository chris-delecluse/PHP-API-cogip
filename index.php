<?php

use App\Controllers\API\CompaniesController;
use App\Controllers\API\InvoicesController;
use App\Controllers\API\PeopleController;
use App\Controllers\HomeController;
use App\Controllers\NotFoundController;

require 'vendor/autoload.php';

//error_reporting(0);

$router = new AltoRouter();

$router->map('GET', '/', function () {
    $home = new HomeController();
    $home->index();
});

$router->map('GET', '/people/get/all', function () {
    $people = new PeopleController();
    $people->getAll();
});

$router->map('GET', '/people/get/[i:id]', function (int $id) {
    $people = new PeopleController();
    $people->getById($id);
});

$router->map('POST', '/people/post', function() {
    $people = new PeopleController();
    $people->post();
});

$router->map('GET', '/people/put/[i:id]', function (int $id) {
    $people = new PeopleController();
    $people->put($id);
});

$router->map('GET', '/people/delete/[i:id]', function (int $id) {
    $people = new PeopleController();
    $people->delete($id);
});

$router->map('GET', '/invoices/get/all', function () {
    $invoices = new InvoicesController();
    $invoices->getAll();
});

$router->map('GET', '/invoice/get/[i:id]', function (int $id) {
    $invoice = new InvoicesController();
    $invoice->getById($id);
});

$router->map('POST', '/invoice/post', function () {
    $invoice = new InvoicesController();
    $invoice->post();
});

$router->map('POST', '/invoice/put/[i:id]', function (int $id) {
    $invoice = new InvoicesController();
    $invoice->put($id);
});

$router->map('GET', '/invoice/delete/[i:id]', function (int $id) {
    $invoice = new InvoicesController();
    $invoice->delete($id);
});

$router->map('GET', '/companies/get/all', function () {
    $companies = new CompaniesController();
    $companies->getAll();
});

$router->map('GET', '/company/get/[i:id]', function (int $id) {
    $company = new CompaniesController();
    $company->getById($id);
});

$router->map('POST', '/company/post', function () {
    $company = new CompaniesController();
    $company->post();
});

$router->map('POST', '/company/put/[i:id]', function (int $id) {
    $company = new CompaniesController();
    $company->put($id);
});

$router->map('GET', '/company/delete/[i:id]', function (int $id) {
    $company = new CompaniesController();
    $company->delete($id);
});

$match = $router->match();

if ($match !== false) {
    call_user_func_array($match['target'], $match['params']);
} else {
    http_response_code(404);
    $notFound = new NotFoundController();
    $notFound->index();
}
