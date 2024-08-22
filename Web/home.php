<?php
session_start(); // Mulai sesi

// Check if user is logged in
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    header("Location: login.php");
    exit;
}

// Include database connection
include("../service/basisdata.php");

?>


    <?php include  "partials/header.html"?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Selamat Datang di Website kantor Distrik Mawabuan, <?php echo $_SESSION['username']; ?></h1>
                <p>
                    <?php 
                    // Insert your content here
                    echo "Kantor Distrik Mawabuan berlokasi disamping Jln Trans Papua BaratDaya Kabupaten Tambrauw. Kantor Distrik Mawabuan salah satu distrik yang ada di Kabupaten Tambrauw dari 29 distrik. Pemerintah tambrauw membanggun kantor distrik mawabuan ini untuk mensejahterakanmasyarakat dalam pendidikan, ekonomi dan sosial. Adanya kantor distrikmawabuan meningkatkan kualitas pendidikan,merasakan kebutuhanuntuk mengembangkan sistem informasi dalam pendidikan maupunekonomi sosial.kantor distrik mawabuan membuat website gunamendukung operasi lantor distrik mawabuan yang lebih efisiendanefektif."
                    ?>
                </p>
            </div>
        </div>

<!-- ini footer -->
<?php include "partials/footer.html" ?>    
