<?php include "../sessionb.php" ?>
<?php include "header.html" ?>

<div class="container">
    <h3 class="text-center mb-4">Informasi Pegawai</h3>
    <a href="tambah_informasi.php" class="btn btn-primary mb-3">Tambah Pegawai</a>

    <?php
    include "../../service/basisdata.php";
    $sql = "SELECT * FROM pegawai ORDER BY nip DESC";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <div class="row">
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 col-sm-8 col-xs-12 mb-4" style="width: 18rem;"> 
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                        <p class="card-text">NIP: <?php echo $row['nip']; ?></p>
                        <p class="card-text">Tanggal Lahir: <?php echo $row['ttl']; ?></p>
                        <p class="card-text">Alamat: <?php echo $row['alamat']; ?></p>

                        <a href="edit_informasi.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="hapus_informasi.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda Yakin ingin menghapus <?php echo $row['nama'];?>')">Hapus</a>
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
        <p class="text-center">Tidak ada data pegawai yang dimasukkan.</p>
        <?php
    }

    // Menutup koneksi
    $conn->close();
    ?>
</div>

<?php include "../partials/footer.html" ?>
