<?php include "../sessionb.php" ?>
<?php include "header.html" ?>

<div class="container">
    <h3 class="text-center mb-4">Berita Terbaru</h3>
    <a href="tambah_berita.php" class="btn btn-primary mb-3">Tambah Berita</a>

    <?php
    include "../../service/basisdata.php";
    $sql = "SELECT * FROM berita ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            if ($count % 2 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="card-img-top ">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo substr($row['slug'], 0, 200) . "..."; ?></p>
                        <a href="edit_berita.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="hapus_berita.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
                    </div>
                </div>
            </div>
            <?php
            $count++;
            if ($count % 2 == 0) {
                echo '</div>';
            }
        }
        if ($count % 2 != 0) {
            echo '</div>';
        }
    } else {
        ?>
        <p class="text-center">Tidak ada berita.</p>
        <?php
    }

    // Menutup koneksi
    $conn->close();
    ?>
</div>
<?php include "../partials/footer.html" ?>