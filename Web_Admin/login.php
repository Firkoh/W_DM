<?php
if (!isset($_SESSION)) {
    session_start(); // Mulai sesi jika belum aktif
}

include "../service/basisdata.php";

// Proses Login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $hashPass=hash("sha256",$password);


    $sele = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $sele->bind_param("ss", $username, $password); // Ikat parameter
    $sele->execute();
    $result = $sele->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $_SESSION['login'] = true; 
        $_SESSION['username'] = $row['username']; // Simpan username dalam sesi
        $_SESSION['id'] = $row['id']; // Simpan ID pengguna dalam sesi
        header("Location: home.php"); // Arahkan ke dasbor
        exit;
    } else {
        $_SESSION['error'] = "Username atau password salah"; // Simpan pesan kesalahan dalam sesi
    }

    $sele->close();
}
// Proses Logout 
if (isset($_GET['logout'])) {
    session_destroy(); // Hancurkan sesi
    header("Location: login.php");
    exit;
}
?>

<!-- Login form here -->
<?php include "partials/headeradmin.html" ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="post" action="login.php">
                    <h2 class="text-center ">Login</h2>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="row">
    <div class="col-6">
        <button type="submit" class="btn btn-primary form-control" name="login">Login</button>
    </div>
    <div class="col-6">
        <button type="submit" class="btn btn-danger form-control" name="cancel">Cancel</button>
    </div>
</div>
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger" role="alert" id="error-message">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']); ?> <!-- Hapus pesan kesalahan dari sesi -->
                        <script>
                            setTimeout(function() {
                                document.getElementById("error-message").style.display = "none";
                            }, 3000); // Hide error message after 3 seconds
                        </script>
                    <?php } ?>
                </form>
            </div>
        </div>
<?php include "partials/footer.html"?>