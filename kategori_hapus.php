<?php
if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");
}
?>

<script>
    alert("hapus data berhasil");
    location.href="?page=kategori";
</script>