<?php
// Koneksi ke database
include "../../service/basisdata.php";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Ambil data dari form
$judul = $_POST["judul"];
$isi = $_POST["isi"];
$gambar = $_FILES["gambar"];

// Mengecek data terlebih dahulu
$dir = "../../upGambar/Galeri/";

if (!is_dir($dir)) {
  mkdir($dir, 0777, true); 
}

// Funngsi mengupload gambar
$target_file = $dir . basename($gambar["name"]);
$uploadOk = 1;                                          
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($gambar)) {
  // Periksa ukuran file maaf jika terlalu salah
  if ($gambar["size"] > 500000) {
    echo "Maaf, gambar terlalu besar.";
    $uploadOk = 0;
  }
  // Periksa tipe file
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Maaf, hanya file JPG, JPEG, & PNG yang diizinkan.";
    $uploadOk = 0;
  }
  // Jika semuanya oke, upload file
  if ($uploadOk == 1) {
    echo "foto masuk";
    if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
    } else {
      echo "Maaf, terjadi kesalahan saat mengupload file.";
    }
  }
}
// Simpan gambar ke database
$sql = "INSERT INTO galeri (`title`, `slug`, `image`) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $judul, $isi, $target_file);

if ($stmt->execute()) {
header ("location:galeri.php");
} else {
    unlink($target_file);
    echo "Error: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
?>