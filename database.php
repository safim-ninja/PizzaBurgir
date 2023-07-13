<?php

$host = "localhost";
$dbname = "foodorder";
$username = "root";
$password = "";

// $host = "sql12.freesqldatabase.com";
// $dbname = "sql12623726";
// $username = "sql12623726";
// $password = "wbhR5IV5Y4";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;