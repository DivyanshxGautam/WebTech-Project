<?php
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = $_POST['category'];
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO campaigns (title, category, description) VALUES ('$title', '$category', '$desc')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?status=success");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>