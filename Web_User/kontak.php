<?php include "partials/header.html"; ?>
<?php include "../service/basisdata.php"; ?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Kontak</h3>

    <?php
    $sql = "SELECT * FROM kontak LIMIT 1";
    $result = $conn->query($sql);

    // Cek apakah data ada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $alamat = $row['alamat'];
        $email = $row['email'];
        $telepon = $row['kontak']; // Mengasumsikan kolom 'kontak' menyimpan nomor telepon
    } else {
        echo "<p class='text-center'>Informasi kontak tidak ditemukan.</p>";
    }
    ?>

    <?php if ($result->num_rows > 0) : ?>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title text-center">Informasi Kontak</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Alamat:</strong> <?php echo htmlspecialchars($alamat); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Email:</strong> <?php echo htmlspecialchars($email); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Telepon:</strong> <?php echo htmlspecialchars($telepon); ?>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <img src="" alt="" class="img-fluid">
            </div>
        </div>
    <?php endif; ?>

</div>

<?php include "partials/footer.html"; ?>