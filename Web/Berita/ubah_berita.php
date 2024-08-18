<?php
include "../../service/basisdata.php";

// Ambil data dari form
$judul = $_POST['judul'];
$isi = $_POST['news'];
$gambar = $_FILES['gambar'];

// Cek jika gambar diupload
if ($gambar['name'] != "") {
    $target_dir = "uploads";
    $target_file = $target_dir . basename($gambar['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($gambar['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($gambar['size'] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($gambar['tmp_name'], $target_file)) {
            $gambar_nama = $gambar['name'];
        } else {
            $gambar_nama = $gambar['name'];
        }
    }
} else {
    $gambar_nama = $_POST['gambar_lama'];
}

// Update data berita
$id_berita = $_POST['id_berita'];
$query = "UPDATE berita SET judul='$judul', isi='$isi', gambar='$gambar_nama' WHERE id='$id_berita'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: berita.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>