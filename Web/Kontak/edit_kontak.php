<?php
include "../../service/basisdata.php"; // Assuming your connection script

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id']; // Retrieve ID from hidden field
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];

  // Update query (assuming 'id' is the primary key)
  $sql = "UPDATE kontak SET alamat='$alamat', email='$email', kontak='$telepon' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
        header("location:kontak.php");
    echo "Kontak berhasil diubah!"; 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;  // Error handling
  }
} else {
  echo "Unauthorized access";
}

$conn->close();
?>