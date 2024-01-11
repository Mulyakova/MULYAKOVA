<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "v79333k6_3333";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
