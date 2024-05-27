<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    // Check if the student ID (nomor) exists in the students table
    $check_sql = "SELECT id FROM students WHERE id = '$nomor'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Student ID exists, proceed to insert attendance record
        $sql = "INSERT INTO attendance (nomor, tanggal, keterangan) VALUES ('$nomor', '$tanggal', '$keterangan')";

        if ($conn->query($sql) === TRUE) {
            echo "New attendance added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Student ID does not exist";
    }

    $conn->close();
}
?>
