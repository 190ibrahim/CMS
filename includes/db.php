<?php

$dbconn = [
    'host' => 'localhost',
    'db' => 'cms',
    'port' => '3306',
    'username' => 'root',
    'password' => ''
];

$error = new stdClass();
$error->type = 'none';

try {
    // Create the DSN string
    $dsn = 'mysql:host=' . $dbconn['host'] . ';dbname=' . $dbconn['db'] . ';port='.
        $dbconn['port'] . ';charset=utf8mb4';

    // Create the PDO object
    $connection = new PDO($dsn, $dbconn['username'], $dbconn['password'], [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    if (!$connection) {
        echo "The database is not connected";
    }

} catch (PDOException $pex) {
    $error->type = 'db';
} catch (Throwable $exc) {
    $error->type = 'server';
}