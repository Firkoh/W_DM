<?php include "partials/header.html"; ?>
<?php include "../service/basisdata.php"; ?>

<div class="container-fluid mt-4">
    <h3 class="text-center mb-4">Kontak</h3>

    <?php
    $sql = "SELECT * FROM kontak LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $alamat = $row['alamat'];
        $email = $row['email'];
        $telepon = $row['kontak'];
    } else {
        echo "<p class='text-center'>Informasi kontak tidak ditemukan.</p>";
    }
    ?>

    <?php if ($result->num_rows > 0) : // Tampilkan form hanya jika data ada ?>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kontak Kami</h5>
                    <p class="card-text">
                        <strong>Alamat:</strong> <?php echo htmlspecialchars($alamat); ?><br>
                        <strong>Email:</strong> <?php echo htmlspecialchars($email); ?><br>
                        <strong>Telepon:</strong> <?php echo htmlspecialchars($telepon); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <img src="../../public/Peta.png" alt="" class="img-fluid w-100">
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include "partials/footer.html"; ?>