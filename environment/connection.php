<?php

/**
 * All the data to connect to the database
 */
$data = [
    'host' => 'localhost:8889',
    'database' => 'product',
    'user' => 'thyler',
    'password' => 'thyler',
];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions
try {
    $connection = mysqli_connect($data['host'], $data['user'], $data['password'], $data['database']);
    mysqli_set_charset($connection, 'latin1');
    $databaseAvailable = true;
} catch (mysqli_sql_exception $e) {
    $databaseAvailable = false;
}
if (!$databaseAvailable) {
    ?><h2>Website wordt op dit moment onderhouden.</h2><?php
    die();
}
