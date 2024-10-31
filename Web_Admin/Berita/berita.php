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
            <div class="col-xs-12 col-sm-6 col-md-3 mb-4"> 
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="card-img-top" style="width:100%; height: 100px; object-fit: cover;">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo nl2br(substr($row['slug'], 0, 50) . "..."); ?></p>
                        <div class="btn-group d-flex justify-content-center">
                            <a href="edit_berita.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $row['id']; ?>">Detail</button>
                            <div class="modal fade" id="detailModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel<?php echo $row['id']; ?>"><?php echo $row['title']; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="img-fluid" style="width: 50%;">
                                            <h4><?php echo $row['title']; ?></h4>
                                            <p><?php echo nl2br($row['slug']); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="hapus_berita.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>   
                        </div>
                        
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

