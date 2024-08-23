<?php include "partials/header.html" ?>

<?php 
include("../service/basisdata.php");

// Mengambil 
$sql = "SELECT * FROM kontak";
$result = $conn->query($sql);

// Mengecek
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $alamat = $row['alamat'];
    $email = $row['email'];
    $call = $row['kontak'];
} else {
    $result(error_reporting);
}

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 text-center">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title">Selamat Datang di Website kantor Distrik Mawabuan</h1>
                    <p class="card-text">
                        Kantor Distrik Mawabuan terletak di <?php echo $alamat ?> Salah satu dari 
                        29 distrik di Kabupaten Tambrauw, kantor ini dibangun untuk meningkatkan kesejahteraan masyarakat dalam pendidikan, ekonomi, dan sosial.
                        <br>
                        Email kami adalah <?php echo $email ?> Kami memeliki nomor telepon yang dapat di hubungi pada <?php echo $call ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ini footer -->
<?php include "partials/footer.html" ?>