<?php
$error = new stdClass();
$error->type = 'none';

try {
    // Retrieve the environment variables
    $url = getenv("CLEARDB_DATABASE_URL");
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    // Create the DSN string
    $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";

    // Create the PDO object
    $connection = new PDO($dsn, $username, $password, [
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

