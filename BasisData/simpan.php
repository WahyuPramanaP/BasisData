<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$tempatlahir = $_POST['tempatlahir'];
$tanggallahir = $_POST['tanggallahir'];
$jabatan = $_POST['jabatan'];
$unitkerja = $_POST['unitkerja'];
$jeniskelamin = $_POST['jeniskelamin'];
$temp = $_FILES['foto']['tmp_name'];
$foto = $_FILES['foto']['name'];
$statuskerja = $_POST['statuskerja'];
$mulaikerja = $_POST['mulaikerja'];
$gaji = $_POST['gaji'];
$folder = "files/";

move_uploaded_file($temp, $folder.$foto);

$query = "INSERT INTO pegawai(nip, id_unitkerja, id_jabatan, nama_pegawai, tempat_lahir, tanggal_lahir, id_jeniskelamin, id_mulai, id_status, foto, id_gaji) 
VALUES  (NULL, '$unitkerja', '$jabatan', '$nama', '$tempatlahir', '$tanggallahir', '$jeniskelamin','$mulaikerja', '$statuskerja','$foto', '$gaji')";

mysqli_query($koneksi, $query);

header("location:index.php");
