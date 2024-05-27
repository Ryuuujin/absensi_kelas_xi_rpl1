<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO students (namalengkap, kelas) VALUES ('$namalengkap', '$kelas')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
