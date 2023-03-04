<?php
$servername = "localhost";
$username = "id20394938_irvanshandika";
$password = "S!?CKjl/M(4DkiKO";
$dbname = "id20394938_db_simpan_file";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])) {
  $filename = $_FILES["fileToUpload"]["name"];
  $filesize = $_FILES["fileToUpload"]["size"];

  // Prepare and bind statement
  $stmt = $conn->prepare("INSERT INTO files (filename, filesize) VALUES (?, ?)");
  $stmt->bind_param("si", $filename, $filesize);

  // Execute statement
  if ($stmt->execute() === TRUE) {
    $id = $stmt->insert_id;
    $target_dir = "uploads";
    $target_file = $target_dir . $id . "_" . basename($filename);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>