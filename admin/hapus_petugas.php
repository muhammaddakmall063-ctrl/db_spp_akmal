<?php
include_once "../src/koneksi.php";

// Membaca variable kode URL (alamat browser)
if(isset($_GET['id_petugas'])){
    $id_petugas   = $_GET['id_petugas'];

    // Hapus data sesuai kode yang terbaca
    $sql = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");
    if($sql){
        //Refresh
        echo "<center> <b> <font color = 'red' size = '4'> <p> Data Berhasil Dihapus </p>
        </font></b></center> </br>
        <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
    }
}
else {
    // Jika tidak ada data kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}
?>