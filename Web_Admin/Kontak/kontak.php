<?php include "../sessionb.php" ?>
<?php include "header.html"; ?>
<?php include "../../service/basisdata.php"; ?>

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

    <?php if ($result->num_rows > 0) : // Tampilkan form hanya jika data ada ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="edit_kontak.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

                <div class="form-group mb-3">
                    <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                    <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="telepon" class="form-label"><strong>Telepon</strong></label>
                    <input class="form-control" type="tel" id="telepon" name="telepon" value="<?php echo htmlspecialchars($telepon); ?>" required>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <img src="../../public/Peta.png" alt="" class="img-fluid w-100">
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include "../partials/footer.html"; ?>