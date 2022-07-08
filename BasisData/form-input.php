<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="mb-3" style="position: absolute; margin-left: 500px;">
        <h1 class="d-flex justify-content-center">Form Pegawai</h1>
        <br>
        <form action="simpan.php" id="formbox" enctype="multipart/form-data" name="formulir" method="post">
            <!-- Nama Pegawai -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <!-- Tempat Lahir -->
            <div class="mb-3">
                <label for="exampleInputtelepon1" class="form-label fw-bold">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
            </div>
            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="exampleInputtelepon1" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir">
            </div>
            <!-- Jenis Kelamin -->
            <p class="fw-bold">Jenis Kelamin</p>
            <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                <?php
                include 'koneksi.php';
                $jeniskelamin = mysqli_query($koneksi, "SELECT * FROM jeniskelamin");
                foreach ($jeniskelamin as $row) {
                    echo "<option value=" . $row['id_jeniskelamin'] . ">" . $row['nama_jeniskelamin'] . "</option>";
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
                    echo "<option value=" . $row['id_jabatan'] . ">" . $row['nama_jabatan'] . "</option>";
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
                    echo "<option value=" . $row['id_unitkerja'] . ">" . $row['nama_unitkerja'] . "</option>";
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
                    echo "<option value=" . $row['id_mulai'] . ">" . $row['mulai_kerja'] . "</option>";
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
                    echo "<option value=" . $row['id_gaji'] . ">" . $row['gaji'] . "</option>";
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
            <!-- Status -->
            <p class="fw-bold">Status</p>
            <select class="form-select" aria-label="Default select example" name="statuskerja">
                <?php
                include 'koneksi.php';
                $statuskerja = mysqli_query($koneksi, "SELECT * FROM statuskerja");
                foreach ($statuskerja as $row) {
                    echo "<option value=" . $row['id_status'] . ">" . $row['nama_status'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Submit Button -->
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" id="submit" value="simpan" class="btn btn-primary">Submit</button>
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