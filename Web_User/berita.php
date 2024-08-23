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
            <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
              <div class="card">
                <img src="<?php echo htmlspecialchars('./upGambar/' . $row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['title']; ?></h5>
                  <p class="card-text"><?php echo substr($row['slug'], 0, 200) . "..."; ?></p>
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