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
                        Kantor Distrik Mawabuan terletak di jalan trans papua barat daya <?php echo $alamat ?>. distrik mawabuan adalah salah satu dari 29 distrik yang ada di Kabupaten Tambrauw kantor distrik mawabuan berdiri pada tahun 2014 pada zaman pemekaran baru yaitu kabupaten tambrauw sebelum pemekaran masyrakat setempat masih gabung di distrik senopi setelah pemekaran maka dibangun kantor distrik mawabuan terpisah dari distrik senopi .
                    </p>
                    <p class="card-text">
                        Tujuan  adalah untuk meningkatkan kesejahteraan masyarakat dalam bidang pendidikan, ekonomi, dan sosial.
                    </p>
                    <p class="card-text">
                        Anda dapat menghubungi kami melalui email <?php echo $email ?> atau telepon ke nomor telepon ini <?php echo $call ?> .
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php include "partials/footer.html"?>