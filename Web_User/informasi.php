<?php include "partials/header.html" ?>

<div class="container-fluid">
    <h3 class="text-center mb-4 mt-4">Informasi</h3>

    <?php
    include "../service/basisdata.php";
    $sql = "SELECT * FROM pegawai ORDER BY nip DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <div class="row justify-content-center">
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                        <p class="card-text">NIP: <?php echo $row['nip']; ?></p>
                        <p class="card-text">Tanggal Lahir: <?php echo $row['ttl']; ?></p>
                        <p class="card-text">Alamat: <?php echo $row['alamat']; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    } else {
        ?>
        <p class="text-center">Tidak ada informasi</p>
        <?php
    }

    // Menutup koneksi
    $conn->close();
    ?>
</div>

<?php include "partials/footer.html" ?>