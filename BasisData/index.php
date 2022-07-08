<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basis Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div>
        <br>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <p class="fw-bold">Pencarian</p>
                    <form action="index.php" method="get" style="width: 30em;">
                        <div class="input-group mb-3">
                            <input type="text" name="cari" class="form-control" placeholder="Masukkan nama pegawai" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <p></p>
                    <div class="float-end">
                        <a href="form-input.php" type="button" class="btn btn-primary">Input Pegawai</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cari = "";
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
        }
        ?>
        <br>
        <table class="table table-success">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">UNIT KERJA</th>
                    <th scope="col">JABATAN</th>
                    <th scope="col">NAMA PEGAWAI</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">BULAN (MULAI KERJA)</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">GAJI</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $perpage = 2;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $start = $perpage * ($page - 1);
                $get = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) total FROM pegawai"));
                $total = $get['total'];

                $pages = ceil($total / $perpage);
                if ($cari != "") {
                    $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai a JOIN jabatan b ON a.id_jabatan=b.id_jabatan JOIN unit_kerja c 
                    ON a.id_unitkerja=c.id_unitkerja JOIN jeniskelamin d ON a.id_jeniskelamin=d.id_jeniskelamin 
                    JOIN statuskerja e ON a.id_status=e.id_status JOIN gaji f ON a.id_gaji=f.id_gaji JOIN mulaikerja g ON a.id_mulai=g.id_mulai WHERE a.nama_pegawai LIKE '%" . $cari . "%' ");
                } else {
                    $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai a JOIN jabatan b ON a.id_jabatan=b.id_jabatan JOIN unit_kerja c 
                    ON a.id_unitkerja=c.id_unitkerja JOIN jeniskelamin d ON a.id_jeniskelamin=d.id_jeniskelamin 
                    JOIN statuskerja e ON a.id_status=e.id_status JOIN gaji f ON a.id_gaji=f.id_gaji JOIN mulaikerja g ON a.id_mulai=g.id_mulai LIMIT $start, $perpage");
                }
                $no = 1;
                foreach ($pegawai as $row) {
                    echo "<tr>
                    <td>$no</td>
                    <td>" . $row['nip'] . "</td>
                    <td>" . $row['nama_unitkerja'] . "</td>
                    <td>" . $row['nama_jabatan'] . "</td>
                    <td>" . $row['nama_pegawai'] . "</td>
                    <td>" . $row['tempat_lahir'] . "</td>
                    <td>" . $row['tanggal_lahir'] . "</td>
                    <td>" . $row['nama_jeniskelamin'] . "</td>
                    <td>" . $row['mulai_kerja'] . "</td>
                    <td>" . $row['nama_status'] . "</td>
                    <td><img src='files/" . $row['foto'] . "' width='150'></td>
                    <td>" . $row['gaji'] . "</td>
                    <td><a class='btn btn-warning btn-sm' href='form-edit.php?nip=" . $row['nip'] . "'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?nip=" . $row['nip'] . "'>Hapus</a>
                    </td>
                  </tr>";
                    $no++;
                }
                ?>

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col text-center">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                    echo "<a href='?page=" . $i . "' type='button' class='btn btn-primary'>" . $i . "</a>";
                }
                ?>
                <!-- <button type="button" class="btn btn-primary">1</button>
                <button type="button" class="btn btn-primary">2</button>
                <button type="button" class="btn btn-primary">3</button>
                <button type="button" class="btn btn-primary">4</button> -->
            </div>
        </div>
    </div>
</body>

</html>