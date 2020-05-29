<?php
$host = "mysql.local";
$dbname = "testdb";
$user = 'root';
$password = 'dbpass';
$dsn = "mysql:dbname={$dbname};host={$host}";

try {
    $dbh = new PDO($dsn, $user, $password);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die;
}