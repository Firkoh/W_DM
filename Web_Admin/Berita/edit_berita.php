<?php include "../sessionb.php" ?>
<?php include "header.html" ?>
<div class="container text-center">
    <h2>Edit Berita</h2>
    <?php
    include "../../service/basisdata.php";
    // Ambil data berita dari rowbase
    $id_berita = $_GET['id'];
    $query = "SELECT * FROM berita WHERE id= '$id_berita'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    ?>
<form method="post" action="ubah_berita.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="title">Judul Berita:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="slug">Isi Berita:</label>
        <textarea class="form-control" id="slug" name="slug" rows="5" required><?php echo $row['slug']; ?>
        </textarea>
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