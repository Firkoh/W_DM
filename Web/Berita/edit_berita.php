<?php include "header.html" ?>
<div class="container text-center">
    <h2>Edit Berita</h2>
    <?php
    include "../service/basisdata.php";
    // Ambil data berita dari rowbase
    $id_berita = $_GET['id'];
    $query = "SELECT * FROM berita WHERE id= '$id_berita'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <form method="post" action="update_berita.php" enctype="multipart/form-row">
        <div class="form-group">
            <label for="judul">Judul Berita:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="isi">Isi Berita:</label>
            <textarea class="form-control" id="news" name="news" rows="5" required><?php echo $row['news']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Pilih Gambar Yang Akan Di Unggah Ke berita</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            <img src="<?php echo $row['image']; ?>" alt="Gambar Berita" width="200px">
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
<?php include "../footer.html" ?>