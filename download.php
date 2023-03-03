<?php
// konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_simpan_file";

// koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ambil id file dari parameter url
$id = $_GET["id"];

// ambil informasi file dari database
$sql = "SELECT * FROM files WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ambil informasi file dari hasil query
    $row = $result->fetch_assoc();
    $filename = $row["filename"];
    $filecontent = $row["filecontent"];
    $filesize = $row["filesize"];
    $filetype = $row["filetype"];

    // header untuk mengunduh file
    header("Content-length: $filesize");
    header("Content-type: $filetype");
    header("Content-Disposition: attachment; filename=$filename");

    // tampilkan isi file
    echo $filecontent;
} else {
    echo "File not found.";
}

// tutup koneksi database
$conn->close();
?>
