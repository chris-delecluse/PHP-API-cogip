<?php

use App\Controllers\CompaniesController;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Controllers\PeopleController;

require 'vendor/autoload.php';

$router = new AltoRouter();

$router->map('GET', '/', function () {
    $home = new HomeController();
    $home->index();
});

$router->map('GET', '/people/get/all', function () {
    $people = new PeopleController();
    $people->index();
});

$router->map('GET', '/people/get/[i:id]', function (int $id) {
    $people = new PeopleController();
    $people->show($id);
});
$router->map('GET', '/people/post', function() {
    // in progress.
    echo 'people/post';
});

$router->map('GET', '/people/put/[i:id]', function (int $id) {
    // in progress.
    echo 'people/put/'. $id;
});

$router->map('GET', '/people/delete/[i:id]', function (int $id) {
    // in progress.
    echo 'people/delete/'. $id;
});

$router->map('GET', '/invoices/get/all', function () {
    $invoices = new InvoicesController();
    $invoices->index();
});

$router->map('GET', '/invoice/get/[i:id]', function (int $id) {
    $invoices = new InvoicesController();
    $invoices->show($id);
});

$router->map('GET', '/invoice/post', function () {
    // in progress.
    echo 'invoice/post';
});

$router->map('GET', '/invoice/put/[i:id]', function (int $id) {
    // in progress.
    echo 'invoice/put/'. $id;
});

$router->map('GET', '/invoice/delete/[i:id]', function (int $id) {
    // in progress.
    echo 'invoice/delete/'. $id;
});

$router->map('GET', '/companies/get/all', function () {
    $companies = new CompaniesController();
    $companies->get();
});

$router->map('GET', '/company/get/[i:id]', function (int $id) {
    // in progress.
    echo 'company/get/'. $id;
});

$router->map('GET', '/company/post', function () {
    // in progress.
    echo 'company/post';
});

$router->map('GET', '/company/put/[i:id]', function (int $id) {
    // in progress.
    echo 'company/put/'. $id;
});

$router->map('GET', '/company/delete/[i:id]', function (int $id) {
    $companies = new CompaniesController();
    $companies->delete($id);
});

$match = $router->match();

if ($match !== false) {
    call_user_func_array($match['target'], $match['params']);
}