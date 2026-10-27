<?php

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kec_sukoharjo";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari tabel kec_sukoharjo
$sql = "SELECT * FROM kec_sukoharjo";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";


// Menampilkan data
if ($result->num_rows > 0) {

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Kecamatan</th>
                <th>Jumlah Penduduk</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Luas</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["kec"] . "</td>
                <td>" . $row["jml_pddk"] . "</td>
                <td>" . $row["lat"] . "</td>
                <td>" . $row["long"] . "</td>
                <td>" . $row["luas"] . "</td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "Belum ada data";
}

// Menutup koneksi
$conn->close();

?>
