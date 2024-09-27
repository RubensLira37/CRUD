<?php
$DB_hostname = "localhost";
$DB_username = "root";
$DB_database =  "star";
$DB_password = "";

$MySQLi = new MySQLi($DB_hostname, $DB_username, $DB_password, $DB_database);
if ($MySQLi->connect_error) {
    die("Error: {$MySQLi->connect_error}");
}

$MySQLi->set_charset("utf8mb4");