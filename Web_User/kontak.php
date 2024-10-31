<?php include "partials/header.html"; ?>
<?php include "../service/basisdata.php"; ?>

<div class="container-fluid mt-4">

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
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Kontak Kami</h5>
                    <p class="card-text">
                        <strong>Alamat:</strong> <?php echo htmlspecialchars($alamat); ?><br>
                        <strong>Email:</strong> <?php echo htmlspecialchars($email); ?><br>
                        <strong>Telepon:</strong> <?php echo htmlspecialchars($telepon); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
          
    
         <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Lokasi</h5>
                     <div class="col-md-12 text-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d514.0651743104842!2d132.91276881636134!3d-0.8605768471475943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sasiti!5e1!3m2!1sid!2sid!4v1729506361341!5m2!1sid!2sid" width="1000px" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include "partials/footer.html"; ?>