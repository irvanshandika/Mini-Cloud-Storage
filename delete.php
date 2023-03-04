<?php
// konfigurasi database
$servername = "localhost";
$username = "id20394938_irvanshandika";
$password = "S!?CKjl/M(4DkiKO";
$dbname = "id20394938_db_simpan_file";

// koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ambil id file dari parameter url
$id = $_GET["id"];

// hapus file dari database
$sql = "DELETE FROM files WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "File deleted successfully.";
} else {
    echo "Error deleting file: " . $conn->error;
}

// tutup koneksi database
$conn->close();
?>