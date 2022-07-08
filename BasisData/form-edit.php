<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    include("koneksi.php");
    if (!isset($_GET['nip'])) {
        header('Location: list_data.php');
    }
    $nip = $_GET['nip'];
    $sql = "SELECT * FROM pegawai WHERE nip=$nip";
    $query = mysqli_query($koneksi, $sql);
    $pegawai = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) < 1) {
        die("Data Tidak Ditemukan");
    }
    ?>
    <div class="mb-3" style="position: absolute; margin-left: 500px;"> 
        <h1 class="d-flex justify-content-center">Form Edit Pegawai</h1>
        <br>
        <form action="edit.php" id="formbox" enctype="multipart/form-data" name="formulir" method="post">
            <!-- Nama Pegawai -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $pegawai['nama_pegawai'] ?>">
            </div>
            <!-- Tempat Lahir -->
            <div class="mb-3">
                <label for="exampleInputtelepon1" class="form-label fw-bold">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?php echo $pegawai['tempat_lahir'] ?>">
            </div>
            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="exampleInputtelepon1" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $pegawai['tanggal_lahir'] ?>">
            </div>
            <!-- Jenis Kelamin -->
            <p class="fw-bold">Jenis Kelamin</p>
            <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                <?php
                include 'koneksi.php';
                $jeniskelamin = mysqli_query($koneksi, "SELECT * FROM jeniskelamin");
                foreach ($jeniskelamin as $row) {
                    echo "<option value=" . $row['id_jeniskelamin'];
                    echo $pegawai['id_jeniskelamin'] == $row['id_jeniskelamin'] ? " selected" : "";
                    echo ">" . $row['nama_jeniskelamin'] . "</option>";
                }
                ?>

            </select>
            <br>
            <!-- Jabatan -->
            <p class="fw-bold">Jabatan</p>
            <select class="form-select" aria-label="Default select example" name="jabatan">
                <?php
                include 'koneksi.php';
                $jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");
                foreach ($jabatan as $row) {
                    echo "<option value=" . $row['id_jabatan'];
                    echo $pegawai['id_jabatan'] == $row['id_jabatan'] ? " selected" : "";
                    echo ">" . $row['nama_jabatan'] . "</option>";
                }
                ?>

            </select>
            <br>
            <!-- Unit Kerja -->
            <p class="fw-bold">Unit Kerja</p>
            <select class="form-select" aria-label="Default select example" name="unitkerja">
                <?php
                $unitkerja = mysqli_query($koneksi, "SELECT * FROM unit_kerja");
                foreach ($unitkerja as $row) {
                    echo "<option value=" . $row['id_unitkerja'];
                    echo $pegawai['id_unitkerja'] == $row['id_unitkerja'] ? " selected" : "";
                    echo ">" . $row['nama_unitkerja'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Mulai Kerja -->
            <p class="fw-bold">Mulai Kerja</p>
            <select class="form-select" aria-label="Default select example" name="mulaikerja">
                <?php
                $mulaikerja = mysqli_query($koneksi, "SELECT * FROM mulaikerja");
                foreach ($mulaikerja as $row) {
                    echo "<option value=" . $row['id_mulaikerja'];
                    echo $pegawai['id_mulai'] == $row['id_mulai'] ? " selected" : "";
                    echo ">" . $row['mulai_kerja'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Gaji -->
            <p class="fw-bold">Gaji</p>
            <select class="form-select" aria-label="Default select example" name="gaji">
                <?php
                $gaji = mysqli_query($koneksi, "SELECT * FROM gaji");
                foreach ($gaji as $row) {
                    echo "<option value=" . $row['id_gaji'];
                    echo $pegawai['id_gaji'] == $row['id_gaji'] ? " selected" : "";
                    echo ">" . $row['gaji'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Foto -->
            <div class="mb-3">
                <label for="formFile" class="form-label fw-bold">Pas Foto (.jpg, .jpeg, .png)</label>
                <input class="form-control" type="file" id="foto" name="foto" multiple accept=".jpg, .png, .jpeg">
            </div>
            <br>
            <!-- Status Kerja -->
            <p class="fw-bold">Status</p>
            <select class="form-select" aria-label="Default select example" name="statuskerja">
                <?php
                $statuskerja = mysqli_query($koneksi, "SELECT * FROM statuskerja");
                foreach ($statuskerja as $row) {
                    echo "<option value=" . $row['id_status'];
                    echo $pegawai['id_gaji'] == $row['id_status'] ? " selected" : "";
                    echo ">" . $row['nama_status'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Submit Button -->
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <input type="hidden" name="nip" value="<?php echo $nip ?>">
                        <button type="submit" id="submit" value="simpan" name="simpan" class="btn btn-primary">Submit Changes</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 0.5em;">
                    <div class="col text-center">
                        <a href="index.php" type="button" class="btn btn-outline-secondary">cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>