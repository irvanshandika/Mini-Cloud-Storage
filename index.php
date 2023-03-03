<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Upload</title>
</head>
<body>
  <div class="container d-flex justify-content-center">
    <form class="form-upload" action="upload.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="file">Upload Here: </label>
        <input type="file" name="fileToUpload">
      </div>
      <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Upload" name="submit">
      </div>
    </form>
  </div>
<div class="container text-center">
  <div class="row">
    <div class="col">
      Nama File
    </div>
    <div class="col">
      Ukuran
    </div>
    <div class="col">
      Aksi
    </div>
  </div>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_simpan_file";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute statement
$sql = "SELECT id, filename, filesize FROM files";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <td><?php echo $row['filename']; ?></td>
        </div>
        <div div class="col">
          <td><?php echo $row['filesize']; ?></td>
        </div>
        <div class="col">
      <td>
        <a href="download.php?id=<?php echo $row["id"] ?>" target="_blank">Download</a> | 
        <a href="delete.php?id=<?php echo $row["id"]?>">Delete</a>
      </td>
    </div>
  </div>
</div>
    <!-- echo "<tr>";
    echo "<td>" . $row["filename"] . "</td>";
    echo '<br>';
    echo "<td>" . $row["filesize"] . "</td>";
    echo "<td><a href='download.php?id=". $row["id"] ."' target='_blank'>Download</a></td>";
    echo "<td><a href='delete.php?id=". $row["id"] ."'>Delete</a></td>";
    echo "</tr>"; -->
    <?php
  }
} else {
  echo '<p class="text-center">0 results</p>';
}

$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>