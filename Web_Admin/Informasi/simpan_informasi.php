
<?php
include "../../service/basisdata.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data dari form
$nama = isset($_POST["nama"]) ? $_POST["nama"] : null;
$nip = isset($_POST["nip"]) ? $_POST["nip"] : null;
$ttl = isset($_POST["ttl"]) ? $_POST["ttl"] : null;
$alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : null;

echo "Received data:<br>";
echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "NIP: " . htmlspecialchars($nip) . "<br>";
echo "TTL: " . htmlspecialchars($ttl) . "<br>";
echo "Alamat: " . htmlspecialchars($alamat) . "<br><br>";

// Check if NIP already exists
if($nip) {
    $checkNIPSql = "SELECT * FROM pegawai WHERE nip = ?";
    $checkStmt = $conn->prepare($checkNIPSql);
    $checkStmt->bind_param("s", $nip);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if($result->num_rows > 0) {
        echo "Error: NIP '$nip' sudah ada. Silakan gunakan NIP yang berbeda.";
        
    } else {
        // NIP does not exist, proceed with insert
        if($nama && $ttl && $alamat) {
            $sql = "INSERT INTO pegawai (`nama`, `nip`, `ttl`, `alamat`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nama, $nip, $ttl, $alamat);

            if ($stmt->execute()) {
                header("location:informasi.php");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
       echo "ada yang hilang";
        }
    }

    $checkStmt->close();
} else {
    echo "Error: NIP kolom di perlukan";
}

mysqli_close($conn);
?>
