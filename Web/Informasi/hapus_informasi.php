
<?php
include "../../service/basisdata.php";

$nip = $_GET['nip'];

if (!isset($nip) || empty($nip)) {
    echo "NIP informasi tidak valid.";
    exit;
}

// Hapus informasi dari database
$stmt = $conn->prepare("DELETE FROM pegawai WHERE nip = ?");
$stmt->bind_param("s", $nip);


if ($stmt->execute()) {
    header("Location: informasi.php?message=berhasil_dihapus");
    exit;
} else {
    // pesan error
    echo "Gagal menghapus informasi. Silahkan coba lagi.";
}

$stmt->close();
$conn->close();
