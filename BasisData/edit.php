<?php
include("koneksi.php");
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $jabatan = $_POST['jabatan'];
    $unitkerja = $_POST['unitkerja'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $temp = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];
    $folder = "files/";
    $statuskerja = $_POST['statuskerja'];
    $mulaikerja = $_POST['mulaikerja'];
    $gaji = $_POST['gaji'];     

    move_uploaded_file($temp, $folder . $foto);


    $sql = "UPDATE pegawai SET nama_pegawai='$nama', tempat_lahir='$tempatlahir', id_jeniskelamin='$jeniskelamin', tanggal_lahir='$tanggallahir', id_jabatan='$jabatan', id_unitkerja='$unitkerja', foto='$foto', id_gaji='$gaji' WHERE pegawai.nip=$nip";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo $sql;

        header('Location: index.php');
    } else {
        die("Gagal menyimpan perubahan");
    }
} else {
    die("Akses dilarang");
}
