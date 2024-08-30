<?php
if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM ulasan WHERE id_ulasan = '$id_kategori'");
}
?>

<script>
    alert("hapus data berhasil");
    location.href = "index.php?page=ulasan";
</script>