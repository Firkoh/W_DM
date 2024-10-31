<?php include "partials/header.html" ?>
<div class="container-fluid">
  <h3 class="text-center mb-4 mt-4">Berita Terbaru</h3>
  <div class="row">
    <?php
    include "../service/basisdata.php";
    $sql = "SELECT * FROM berita ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
              <div class="card">
                <img src="<?php echo htmlspecialchars('./upGambar/' . $row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="card-img-top" style="width:100%; height: 100px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['title']; ?></h5>
                  <p class="card-text"><?php echo substr($row['slug'], 0, 50) . "..."; ?></p>
                  <button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#detailModal<?php echo $row['id']; ?>">Detail</button>
                </div>
              </div>
            </div>

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
                    <img src="<?php echo htmlspecialchars('./upGambar/' . $row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="img-fluid" style="width: 50%;">
                    <h4><?php echo $row['title']; ?></h4>
                    <div style="overflow-y: auto; max-height: 400px;"><?php echo nl2br($row['slug']); ?></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    } else {
        ?>
        <p class="text-center">Tidak ada berita</p>
        <?php
    }

    // Menutup koneksi
    $conn->close();
    ?>
  </div>
</div>

<?php include "partials/footer.html" ?>
