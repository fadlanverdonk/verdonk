<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
       <div class="col-md-12">
           <form method="post">
               <?php
               if(isset($_POST['submit'])) {
                 $id_kategori = $_POST['id_kategori'];
                 $judul = $_POST['judul'];
                 $penulis = $_POST['penulis'];
                 $penerbit = $_POST['penerbit'];
                 $tahun_terbit = $_POST['tahun_terbit'];
                 $deskripsi = $_POST['deskripsi'];
                 $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,deskripsi) values ('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi')");

                 if($query) {
                    echo '<script>alert("Tambah data berhasil.");</script>';
                 }else{
                    echo '<script>alert("Tambah data gagal.");</script>';
                 }
            }
        ?>
        <div class="row mb-3">
            <div class="col-md-4">
            <div class="col-md-4">Buku</div>
                 <select name="id_buku" class="form-control">
                     <?php
                         $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                         while($buku = mysqli_fetch_array($buk)) {
                            ?>
                            <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                            <?php
                         }
                     ?>
                </select>
             </div>
        </div>
            <div class="row mb-3">
            <div class="col-md-2">Ulasan</div>
            <textarea name="ulasan" rows="5" class="form-control"></textarea>
        </div>
     </div>
            <div class="row mb-3">
            <div class="col-md-2">Rating</div>
            <select name="rating">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
         </select>
        </div>
     </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">simpan</simpan>
                <button type="reset" class="btn btn-secondary">reset</button>
                <a href="?page=buku" class="btn btn-danger">kembali</a>
        </div>
        </div>
        </form>
        </div>
    </div>
</div>