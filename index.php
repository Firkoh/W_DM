
<?php 
include("service/basisdata.php");

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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distrik Mawabuan</title>
    <link rel="stylesheet" href="public/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand col-1" href="#">
                 <img src="public/Lambang_Kabupaten_Tambrauw,_Papua_Barat.png" class="mx-auto " width="50px" height="50px" alt="...">
            </a>
    
            <h2 class="text-light col-11 text-center">Distrik Mawabuan</h2>

                    </div>
            </div>
        </div>
    </nav>
<!-- ini header -->

<div class="container-fluid mt-4 ">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 text-center">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title">Selamat Datang di Website kantor Distrik Mawabuan</h1>
<div>
<a href="#login" class="display-6">Login Sebagai</a>
</div>
<div>
<a href="Web_Admin/login.php " class="btn btn-warning"><i class="bi bi-person" id="login"></i> Admin</a>
<a href="Web_User/home.php" class="btn btn-primary"><i class="bi bi-person me
-2"></i>User</a>
</div>


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
<?php include "Web_User/partials/footer.html" ?>