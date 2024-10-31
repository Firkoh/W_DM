<?php include "partials/header.html" ?>

<div class="container-fluid">
    <h3 class="text-center mb-4 mt-4">Informasi</h3>

    <?php
    include "../service/basisdata.php";
    $sql = "SELECT * FROM Informasi ORDER BY id ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <div class="row">
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-4">
                <div class="card border-primary">
                    <div class="card-header">
                        <h5 class="card-title text-center"><?php echo $row['judul']; ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo (strlen($row['isi']) > 550) ? nl2br(substr($row['isi'], 0, 550)) . "... Klik Detail" : nl2br($row['isi']); ?></p>
                            <div class="col-md-12 text-center">
                                <div class="card-text bg-info mb-3">Waktu dan Tempat Pelaksanaan</div>
                            </div>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="card-text bg-info">Tanggal : <?php echo $row['tanggal']; ?></div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="card-text bg-info">Jam: <?php echo $row['jam']; ?></div>
                            </div>
                            <div class="col-md-7 text-center">
                                <div class="card-text bg-info">
                                    Tempat: <?php echo (strlen($row['tempat']) > 55) ? substr($row['tempat'], 0, 55) . "... Klik Detail" : $row['tempat']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $row['id']; ?>">Detail</button>
                      
                    </div>
                    <div class="modal fade" id="detailModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document" style="width: 90vw; height: 90vh; overflow: off;">
                            <div class="modal-content" style="height: 100%;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel<?php echo $row['id']; ?>"><?php echo $row['judul']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="overflow-y: auto;">
                                    <p class="card-text">
                                        <b>Tanggal :</b> <?php echo $row['tanggal']; ?><br>
                                        <b>Waktu :</b> <?php echo $row['jam']; ?><br>
                                        <b>Tempat :</b> <?php echo $row['tempat']; ?>
                                    </p>
                                    <p><?php echo nl2br($row['isi']); ?></p>
                                </div>
                                <div class="modal-footer">
                                   
                                </div>
                            </div>
                        </div>
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