<?php
// Koneksi ke database
include "../../service/basisdata.php";
// Tambah data
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$ids = $_POST['id'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];

// Update berita data
$query = "UPDATE `pegawai` SET `nip`='$nip',`nama`='$nama',`ttl`='$ttl',`alamat`='$alamat' WHERE id='$ids'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location:informasi.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>