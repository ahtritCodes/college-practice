<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "college_db";
$port = 3306;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $user, $password, $db, $port);

if (!$conn) {
    die($conn);
}
