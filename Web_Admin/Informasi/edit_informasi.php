<?php include "../sessionb.php" ?>
<?php include "header.html" ?>
<div class="container text-center">
    <h2>Edit Informasi Pegawai</h2>
    <?php
    include "../../service/basisdata.php";
    // Ambil data berita dari rowbase
    $id_informasi = $_GET['id'];
    $query = "SELECT * FROM pegawai WHERE id= '$id_informasi'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    ?>
<form method="post" action="ubah_informasi.php" enctype="multipart/form-data">
    <input type="hidden" name="nip" value="<?php echo $row['nip']; ?>">
    <div class="form-group">
        <label for="nip">Ubah nip:</label>
        <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $row['nip']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nama">Ubah Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
    </div>
    <div class="form-group">
        <label for="ttl">ubah Tempat Tanggal Lahir :</label>
        <input type="text" class="form-control" id="ttl" name="ttl" value="<?php echo $row['ttl']; ?>" required>
    </div>
    <div class="form-group">
        <label for="alamat">alamat :</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="button" class="btn btn-danger" onclick="cancelForm()">Batal</button>
</form>
</div>
<script>
function cancelForm() {
    window.location.href = document.referrer; + '?forceReload=true';
}
</script>
<?php include "../partials/footer.html" ?>