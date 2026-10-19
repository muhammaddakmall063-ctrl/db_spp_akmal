<?php
include_once "../src/koneksi.php";

//Membaca Variable kode pada URL (alamat browser)
if(isset($_GET['id_kelas'])){
    $id_kelas   = $_GET['id_kelas'];

    //Hapus data sesuai kode yang terbaca
    $sql = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
    if($sql){
        // Refresh halaman
        echo "<center> <b> <font color = 'red' size = '4'> <p> Data Berhasil dihapus </p>
        </font></b></center> </br>
        <meta http-equiv='refresh' content='2; url=?open=data_kelas'>";
    }
}
else {
    // Jika tidak ada data kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}
?>