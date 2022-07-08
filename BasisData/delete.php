<?php
include("koneksi.php");
    $id = $_GET['nip'];
    $sql = "DELETE FROM pegawai WHERE nip='$id'";
    $query = mysqli_query($koneksi, $sql);
    if( $query ){
        header('Location: index.php');
    } else {
        die("gagal menghapus");
    }
?>