        <?php include "header.html" ?>
    <div class="container">
        <h2>Tambah Berita</h2>
            <form method="post" action="simpan_berita.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul Berita:</label>
                <input type="text" class="form-control" id="judul" name="judul" required value="ini Judul">
            </div>
            <div class="form-group">
                <label for="isi">Isi Berita:</label>
               <textarea class="form-control" id="isi" name="isi" rows="5" required>Ini Berita</textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Pilih Gambar Yang Akan Di Unggah Ke berita</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
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