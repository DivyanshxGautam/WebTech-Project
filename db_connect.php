<?php
/* db_connect.php — single database connection, included by all other files */

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "campaign_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    /* In production, log this error instead of exposing it */
    error_log("DB connection failed: " . $conn->connect_error);
    http_response_code(503);
    die("Service temporarily unavailable. Please try again later.");
}

/* Ensure correct character encoding */
$conn->set_charset("utf8mb4");