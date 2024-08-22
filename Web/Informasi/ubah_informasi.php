<?php
// Koneksi ke database
include "../../service/basisdata.php";
// Tambah data
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id_berita = $_POST['id'];
$judul = $_POST['title'];
$isi = $_POST['slug'];

// Update berita data
$query = "UPDATE berita SET title='$judul', slug='$isi' WHERE id='$id_berita'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: berita.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>