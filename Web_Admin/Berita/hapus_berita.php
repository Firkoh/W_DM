<?php
include "../../service/basisdata.php";

$id = $_GET['id'];

if (!is_numeric($id)) {
    echo "ID berita tidak valid.";
    exit;
}

// Ambil nama file gambar dari database (sesuaikan dengan struktur tabel Anda)
$stmt = $conn->prepare("SELECT image FROM berita WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$gambar = $row['image'];

// Hapus berita dari database
$stmt->close();
$stmt = $conn->prepare("DELETE FROM berita WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Hapus file gambar jika ada
    if ($gambar) {
        $file_path = "../../upGambar/Berita/" . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    header("Location: berita.php?message=berhasil_dihapus");
    exit;
} else {
    // pesan error
    echo "Gagal menghapus berita. Silahkan coba lagi.";
}

$stmt->close();
$db->close();