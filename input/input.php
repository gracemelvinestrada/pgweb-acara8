<?php

$kode_kecamatan = $_POST['kode_kecamatan'];
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kec_sukoharjo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
$sql = "INSERT INTO kec_sukoharjo
        (id, jml_pddk, kec, lat, `long`, luas)
        VALUES
        ($kode_kecamatan, $jumlah_penduduk, '$kecamatan', $latitude, $longitude, $luas)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Kembali ke halaman form
header("Location: index.html");
exit();

?>