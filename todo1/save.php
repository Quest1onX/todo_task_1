<?php

$servername = "localhost";
$username = "root";
$password = "Quest1on.";
$dbname = "tasks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $taskName = $_POST["task-name"];
    $date = $_POST["date"];
    $priority = $_POST["priority"];

    $sql = "INSERT INTO tasks (name, date, priority) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param( $taskName, $date, $priority);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

?>