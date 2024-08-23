<?php
include("session.php");
?>

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

<?php include  "partials/header.html"?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Selamat Datang di Website Kantor Distrik Mawabuan</h1>
                    <p class="card-text">
                        Kantor Distrik Mawabuan terletak di <?php echo $alamat ?>. Kami adalah salah satu dari 29 distrik di Kabupaten Tambrauw.
                    </p>
                    <p class="card-text">
                        Tujuan kami adalah meningkatkan kesejahteraan masyarakat dalam bidang pendidikan, ekonomi, dan sosial.
                    </p>
                    <p class="card-text">
                        Anda dapat menghubungi kami melalui email <?php echo $email ?> atau telepon <?php echo $call ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php include "partials/footer.html"?>