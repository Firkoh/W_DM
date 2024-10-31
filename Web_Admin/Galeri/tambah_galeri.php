<?php include "../sessionb.php" ?>        
<?php include "header.html" ?>
    <div class="container">
        <h2>Tambah Gambar</h2>
            <div class="preview mx-auto">
                <img id="preview" src="#" alt="preview image" class="img-thumbnail d-block mx-auto" style="display: none; width: 200px; height: 150px; border-radius: 5px;"/>
            </div>
            <form method="post" action="simpan_galeri.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gambar">Pilih Gambar Yang Akan Di Unggah Ke Galeri</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" required onchange="previewImage()">
            </div>
            <div class="form-group">
                <label for="judul">Judul Gambar:</label>
                <input type="text" class="form-control" id="judul" name="judul" required placeholder="Masukan Judul Gambar">
            </div>
            <div class="form-group">
                <label for="isi">Keterangan Gambar:</label>
               <textarea class="form-control" id="isi" name="isi" rows="5" required placeholder="Masukan Keterangan Gambar"></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Simpan</button>

           <button type="button" class="btn btn-danger" onclick="cancelForm()">Batal</button>
        </form>
    </div>
<script>
                function previewImage() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

                    oFReader.onload = function (oFREvent) {
                        document.getElementById("preview").src = oFREvent.target.result;
                        document.getElementById("preview").style.display = "block";
                    };
                };
function cancelForm() {
    window.location.href = document.referrer; + '?forceReload=true';
}
</script>
<?php include "../partials/footer.html" ?>
