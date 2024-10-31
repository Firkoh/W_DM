<?php include "partials/header.html" ?>

<div class="container-fluid">
  <h3 class="text-center mb-4 mt-4">Galeri</h3>

  <div class="row">
    <?php
    include "../service/basisdata.php";
    $sql = "SELECT * FROM galeri ORDER BY id ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <div class="col-xs-12 col-sm-6 col-md-3 mb-4"> 
              <div class="card">
                <div class="card-body">
               <img src="<?php echo htmlspecialchars('./upGambar/' . $row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="card-img-top" style="width:100%; height: 100px; object-fit: cover;">
              </div>  
              </div>
            </div>
            <?php
        }
    } else {
        ?>
        <p class="text-center">Tidak ada gambar</p>
        <?php
    }

    // Menutup koneksi
    $conn->close();
    ?>
 
</div>

<?php include "partials/footer.html" ?> 