<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $id_petugas     = $_POST['id_petugas'];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $nama_petugas   = $_POST['nama_petugas'];
    $level          = $_POST['level'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($id_petugas)==""){
        $pesanError[] = "Data <b> ID petugas</b> tidak boleh kosong";
    }
    if (trim($username)==""){
        $pesanError[] = "Data <b> Username</b> tidak boleh kosong !";
    }
    if (trim($password)==""){
        $pesanError[] = "Data <b> Password</b> tidak boleh kosong !";
    }
    if (trim($nama_petugas)==""){
        $pesanError[] = "Data <b> Nama Petugas </b> tidak boleh kosong !";
    }
    if (trim($level)==""){
        $pesanError[] = "Data <b> Level </b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error Dari Form
    if (count($pesanError)>=1){
        $noPesan=0;
        foreach ($pesanError as $indeks=>$pesan_tampil){
            $noPesan++;
                echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "<br>";
    }
    else {
        // Skrip Simpan data ke Database
        $sqlEdit = mysqli_query($koneksi, "UPDATE petugas set username='$username', password='$password',
        nama_petugas='$nama_petugas', level='$level' WHERE id_petugas='$id_petugas'");
        if($sqlEdit){
            echo "<center> <b> <font color = 'red' size = '4'> <p> Data Berhasil Diubah </p>
            </font></b></center> </br>
            <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
        }
        else{
            echo "<center> <b> <font color = 'red' size = '4'> <p> Data Gagal diubah !!
            <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
$id_petugas     = $_GET['id_petugas'];
$sql            = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
$data           = mysqli_fetch_array($sql);

?>
<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
    <table cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong> EDIT DATA PETUGAS</strong></td>
        </tr>
        <tr>
            <td>ID Petugas</td>
            <td>:</td>
            <td><input name="id_petugas" type="text" size="10" maxlength="10"
                value="<?php echo $data['id_petugas']; ?>" redonly = "true" /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input name="username" type="text" size="50" maxlength="50"
                value="<?php echo $data['username']; ?> " /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input name="password" type="password" size="50" maxlength="50"
                value="<?php echo $data['password']; ?>" /></td>
        </tr>
        <tr>
            <td>Nama Petugas</td>
            <td>:</td>
            <td><input name="nama_petugas" type="text" size="50" maxlength="50"
                value="<?php echo $data['nama_petugas']; ?>" /></td>
        </tr>
        <tr>
            <td>Level</td>
            <td>:</td>
            <td>
                <select name="level">
                    <option value="Kosong"> -- Pilih Level --</option>
                    <option value="Admin"> Admin </option>
                    <option value="Petugas"> Petugas </opion>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td> <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" value="Simpan" /></td>
        </tr>
    </table>
</form>