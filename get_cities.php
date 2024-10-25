<?php
$servername = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root";        // Sesuaikan dengan username database Anda
$password = "";            // Sesuaikan dengan password database Anda
$dbname = "ppdb-app";      // Nama database yang Anda gunakan

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mendapatkan data kota
$sql = "SELECT city_name FROM cities";
$result = $conn->query($sql);

$cities = [];
while ($row = $result->fetch_assoc()) {
    $cities[] = $row['city_name'];
}

// Output data kota dalam format JSON
echo json_encode($cities);

$conn->close();
?>
