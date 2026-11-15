<?php
//$servername = "localhost";
$servername = "mysql_db";
$username = "root";
$password = "root";
// $dbname = "school_cinema";
// $servername = "localhost";
// $username = "annexbios_hoofdkantoor";
// $password = "YVbGZmm7ZMG7bqKke4QB";
$dbname = "annexbios_hoofdkantoor";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}