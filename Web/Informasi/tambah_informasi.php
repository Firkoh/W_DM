<?php include "header.html" ?>

<div class="container">
    <h2>Tambah Informasi</h2>
    <form method="post" action="simpan_informasi.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nip">NIP:</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="ttl">Tanggal Lahir:</label>
            <input type="text" class="form-control" id="ttl" name="ttl" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" onclick="cancelForm()">Batal</button>
    </form>
</div>

<script>
function cancelForm() {
    window.location.href = document.referrer;
}
</script>
<?php include "../partials/footer.html" ?>