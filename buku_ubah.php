<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];

                    // Retrieve the book data based on the ID
                    $result = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = $id");
                    $data = mysqli_fetch_array($result);

                    if(isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $deskripsi = $_POST['deskripsi'];

                        // Prepare and execute the update query
                        $stmt = $koneksi->prepare("UPDATE buku SET id_kategori = ?, judul = ?, penulis = ?, penerbit = ?, tahun_terbit = ?, deskripsi = ? WHERE id_buku = ?");
                        $stmt->bind_param("isssisi", $id_kategori, $judul, $penulis, $penerbit, $tahun_terbit, $deskripsi, $id);

                        if($stmt->execute()) {
                            echo '<script>alert("Update data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Update data gagal.");</script>';
                        }
                        $stmt->close();
                    }
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while($kategori = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>" <?php if($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?>>
                                        <?php echo $kategori['kategori']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo htmlspecialchars($data['judul']); ?>" class="form-control" name="judul" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo htmlspecialchars($data['penulis']); ?>" class="form-control" name="penulis" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo htmlspecialchars($data['penerbit']); ?>" class="form-control" name="penerbit" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8">
                            <input type="number" value="<?php echo htmlspecialchars($data['tahun_terbit']); ?>" class="form-control" name="tahun_terbit" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" rows="5" class="form-control" required><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
