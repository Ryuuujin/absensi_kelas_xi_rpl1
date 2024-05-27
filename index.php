<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi Kelas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="site-title">Absensi Kelas XI RPL 1</h1>
        </div>
    </header>
    <div class="container">
        <h1>Tambah Siswa</h1>
        <form action="add_student.php" method="post">
            Nama Lengkap: <input type="text" name="namalengkap"><br>
            Kelas: <input type="text" name="kelas"><br>
            <input type="submit" value="Add Student">
        </form>

        <h1>Tambah Absensi</h1>
        <form action="add_attendance.php" method="post">
            Nomor:
            <select name="nomor">
                <?php
                include 'db_connection.php';
                $sql = "SELECT id, namalengkap FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"]. "'>" . $row["id"]. " - " . $row["namalengkap"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No students available</option>";
                }
                ?>
            </select><br>
            Tanggal: <input type="date" name="tanggal"><br>
            Keterangan:
            <select name="keterangan">
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
                <option value="Terlambat">Terlambat</option>
                <option value="Izin">Izin</option>
            </select><br>
            <input type="submit" value="Add Attendance">
        </form>

        <h1>Daftar Absensi</h1>
        <?php
        $sql = "SELECT a.id, s.namalengkap, s.kelas, a.tanggal, a.keterangan 
                FROM attendance a 
                JOIN students s ON a.nomor = s.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nama Lengkap</th><th>Kelas</th><th>Tanggal</th><th>Keterangan</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["namalengkap"]. "</td><td>" . $row["kelas"]. "</td><td>" . $row["tanggal"]. "</td><td>" . $row["keterangan"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
