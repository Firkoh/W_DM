
<?php
include "../../service/basisdata.php";

$ids = $_GET['id'];

if (!isset($ids) || empty($ids)) {
    echo "NIP informasi tidak valid.";
    exit;
}

// Hapus informasi dari database
$stmt = $conn->prepare("DELETE FROM pegawai WHERE id = ?");
$stmt->bind_param("s", $ids);


if ($stmt->execute()) {
    header("Location: informasi.php?message=berhasil_dihapus");
    exit;
} else {
    // pesan error
    echo "Gagal menghapus informasi. Silahkan coba lagi.";
}

$stmt->close();
$conn->close();
