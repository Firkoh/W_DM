<?php
// Koneksi ke database
include "../../service/basisdata.php";
// Tambah data
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id_galeri = $_POST['id'];
$judul = $_POST['title'];
$isi = $_POST['slug'];

// Update galeri data
$query = "UPDATE galeri SET title='$judul', slug='$isi' WHERE id='$id_galeri'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: galeri.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>