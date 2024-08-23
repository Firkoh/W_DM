<?php
include "../../service/basisdata.php";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$judul = $_POST["judul"];
$isi = $_POST["isi"];
$gambar = $_FILES["gambar"];

$dir = "../../upGambar/Berita/";

if (!is_dir($dir)) {
  mkdir($dir, 0777, true); 
}

$target_file = $dir . basename($gambar["name"]);
$uploadOk = 1;                                          
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($gambar)) {

  if ($gambar["size"] > 500000) {
    echo "Maaf, gambar terlalu besar.";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Maaf, hanya file JPG, JPEG, & PNG yang diizinkan.";
    $uploadOk = 0;
  }

  if ($uploadOk == 1) {
    if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
      echo "File telah diupload ke: " . $target_file;
    } else {
      echo "Maaf, terjadi kesalahan saat mengupload file.";
    }
  }
}

// Simpan berita ke database
$sql = "INSERT INTO berita (`title`, `slug`, `image`) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $judul, $isi, $target_file);

if ($stmt->execute()) {
  header ("location:berita.php");
} else {
  unlink($target_file);
  echo "Error: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
?>