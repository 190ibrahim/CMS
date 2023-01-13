<?php

$dbconn = [
    'host' => 'eu-cdbr-west-03.cleardb.net',
    'db' => 'heroku_446a1eee8463ee6',
    'port' => '3306',
    'username' => 'b97ff3798df03f',
    'password' => '06a88943'
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
