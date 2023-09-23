<?php

$servername = 'localhost';
$username = 'superuser';
$password = '1234';
$dbname = 'firstdb';
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
  die("Connection failed :" . $conn->connect_error);
}
