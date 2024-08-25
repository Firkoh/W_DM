<?php
include "../../service/basisdata.php"; // Assuming your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id']; // Retrieve ID from hidden field
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];

  $sql = "UPDATE kontak SET alamat='$alamat', email='$email', kontak='$telepon' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
header ("location:kontak.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;  // Error handling
  }
} else {
  echo "Akses Tidak Di Izinkan";
}


$conn->close();
?>