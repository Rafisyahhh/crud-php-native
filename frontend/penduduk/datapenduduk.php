<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penduduk - Penduduk Desa</title>
    <link rel="shortcut icon" href="../../dist-template/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    <link rel="stylesheet" href="../../dist-template/assets/compiled/css/app.css">
    <link rel="stylesheet" href="../../dist-template/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="../../dist-template/assets/compiled/css/iconly.css">
</head>

<body>
    <script src="../../dist-template/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-12">
                            <a href="../dashboard.php" class="fw-bold fs-5">Penduduk Desa</a>
                            <a href="../../proses/proses_logout.php" class="btn btn-primary btn-sm">Logout</a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item ">
                            <a href="../dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="datapenduduk.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Data Penduduk</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../keluarga/keluarga.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Keluarga</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Kategori</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item  ">
                                    <a href="../alamat/alamat.php" class="submenu-link">Alamat</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="../pekerjaan/pekerjaan.php" class="submenu-link">Pekerjaan</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="../pendidikan/pendidikan.php" class="submenu-link">Pendidikan</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="../status/status.php" class="submenu-link">Status</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Penduduk</h3>
            </div>
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Penduduk
                            <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>
                        </h4>
                    </div>
                    <!-- table head dark -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Foto Identitas</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Status</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../../system/connection.php');
                                $sql = "SELECT * FROM penduduk
                                        INNER JOIN alamat ON penduduk.id_alamat = alamat.id_alamat
                                        INNER JOIN keluarga ON penduduk.id_keluarga = keluarga.id_keluarga
                                        INNER JOIN pendidikan ON penduduk.id_pendidikan = pendidikan.id_pendidikan
                                        INNER JOIN status_warga ON penduduk.id_status = status_warga.id_status
                                        INNER JOIN pekerjaan ON penduduk.id_pekerjaan = pekerjaan.id_pekerjaan order by `id` asc";
                                $result = mysqli_query($conn, $sql);
                                $no = 1;
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><img src="../../img/<?= $row['foto'] ?>" alt="" width="100"></td>
                                        <td><?= $row['tempat_lahir'] ?></td>
                                        <td><?php $tgl = $row['tgl_lahir'];
                                            $tanggal = date("d-m-Y", strtotime($tgl));
                                            echo $tanggal ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td><?= $row['kepala_keluarga'] ?></td>
                                        <td><?= $row['status_warga'] ?></td>
                                        <td><?= $row['pendidikan'] ?></td>
                                        <td><?= $row['pekerjaan'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id'] ?>">Lihat</button>
                                            <!-- Modal Lihat -->
                                            <div class="modal fade text-left" id="viewModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel1">Lihat Data Penduduk</h5>
                                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Nama <br>
                                                                    Tempat Lahir <br>
                                                                    Tanggal Lahir <br>
                                                                    Jenis Kelamin <br>
                                                                    Alamat <br>
                                                                    Kepala Keluarga <br>
                                                                    Status <br>
                                                                    Pendidikan <br>
                                                                    Pekerjaan <br>
                                                                </div>
                                                                <div class="col-4">
                                                                    : <?= $row['nama'] ?> <br>
                                                                    : <?= $row['tempat_lahir'] ?> <br>
                                                                    : <?= $row['tgl_lahir'] ?> <br>
                                                                    : <?= $row['jenis_kelamin'] ?> <br>
                                                                    : <?= $row['alamat'] ?> <br>
                                                                    : <?= $row['kepala_keluarga'] ?> <br>
                                                                    : <?= $row['status_warga'] ?> <br>
                                                                    : <?= $row['pendidikan'] ?> <br>
                                                                    : <?= $row['pekerjaan'] ?> <br>
                                                                </div>
                                                                <div class="col-4">
                                                                    <img src="../../img/<?= $row['foto'] ?>" alt="" width="200">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            <button type="button" class="btn btn-sm btn-warning fw-bold" name="ubah" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Ubah</button>
                                            <button onclick="hapus()" class="btn btn-sm btn-danger fw-bold">Hapus</button>
                                        </td>
                                    </tr>
                                    <script type="text/javascript">
                                        function hapus() {
                                            Swal.fire({
                                                title: "Apakah kamu yakin ingin menghapus data ini?",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Iya aku yakin!"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    Swal.fire({
                                                        title: " Berhasil menghapus data",
                                                        icon: "success"
                                                    }).then((i) => {
                                                        if (i.isConfirmed) {
                                                            window.location.href = "delete.php?id=<?= $row['id'] ?>";
                                                        }
                                                    })
                                                }
                                            });
                                        }
                                    </script>

                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Penduduk Desa</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Rafisyah Aji</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade text-left" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Data Penduduk</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <label for="alamat">Nama Penduduk: </label>
                                    <div class="form-group">
                                        <input id="alamat" name="nama" value="<?= isset($_GET['nama']) ? $_GET['nama'] : "" ?>" type="text" placeholder="Masukkan Nama Penduduk" class="form-control">
                                    </div>
                                    <label for="deskripsi">Tempat Lahir: </label>
                                    <div class="form-group">
                                        <input id="deskripsi" name="tempat_lahir" value="<?= isset($_GET['tempat_lahir']) ? $_GET['tempat_lahir'] : "" ?>" type="text" placeholder="Masukkan Tempat Lahir" class="form-control">
                                    </div>
                                    <label for="deskripsi">Tanggal Lahir: </label>
                                    <div class="form-group">
                                        <input id="deskripsi" name="tgl_lahir" value="<?= isset($_GET['tgl_lahir']) ? $_GET['tgl_lahir'] : "" ?>" type="date" placeholder="Masukkan Tanggal Lahir" class="form-control">
                                    </div>
                                    <label for="deskripsi">Jenis Kelamin: </label>
                                    <div class="d-flex gap-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki laki" <?php
                                                                                                                                $radioValue = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : "";
                                                                                                                                $checked = ($radioValue == 'Laki laki') ? 'checked' : '';
                                                                                                                                echo $checked;
                                                                                                                                ?> id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?php
                                                                                                                                $radioValue = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : "";
                                                                                                                                $checked = ($radioValue == 'Perempuan') ? 'checked' : '';
                                                                                                                                echo $checked;
                                                                                                                                ?> id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <label for="deskripsi" class="mt-2">Foto Identitas: </label>
                                    <div class="form-group">
                                        <input id="deskripsi" name="foto" type="file" placeholder="Masukkan Foto Identitas" class="form-control">
                                        <img src="" id="foto-preview" style="display: none; margin-top: 10px; max-width: 100px;" alt="Preview Foto">
                                    </div>
                                    <script>
                                        const inputFoto = document.querySelector('input[name="foto"]');
                                        const previewFoto = document.querySelector('#foto-preview');
                                        inputFoto.addEventListener('change', function() {
                                            const file = this.files[0];
                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    previewFoto.src = e.target.result;
                                                    previewFoto.style.display = 'block';
                                                }
                                                reader.readAsDataURL(file);
                                            } else {
                                                previewFoto.src = "";
                                                previewFoto.style.display = 'none';
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="col-6">
                                    <label for="deskripsi">Alamat: </label>
                                    <select name="alamat" class="form-select" id="basicSelect">
                                        <option>Alamat</option>
                                        <?php
                                        $value = isset($_GET['alamat']) ? $_GET['alamat'] : "";
                                        $sql = "SELECT * FROM alamat";
                                        $result = $conn->query($sql);
                                        foreach ($result as $rows) {
                                            $selected = ($rows['id_alamat'] == $value) ? 'selected' : '';
                                            echo '<option value="' . $rows['id_alamat'] . '" ' . $selected . '>' . $rows['alamat'] . '</option>';
                                        };
                                        ?>
                                    </select>
                                    <label for="deskripsi" class="mt-2">Kepala Keluarga: </label>
                                    <select name="keluarga" class="form-select" id="basicSelect">
                                        <option>Kepala Keluarga</option>
                                        <?php
                                        $value = isset($_GET['keluarga']) ? $_GET['keluarga'] : "";
                                        $sql = "SELECT * FROM keluarga";
                                        $result = $conn->query($sql);
                                        foreach ($result as $rows) {
                                            $selected = ($rows['id_keluarga'] == $value) ? 'selected' : '';
                                            echo '<option value="' . $rows['id_keluarga'] . '"' . $selected . '>' . $rows['kepala_keluarga'] . '</option>';
                                        };
                                        ?>
                                    </select>
                                    <label for="deskripsi" class="mt-2">Status: </label>
                                    <select name="status_warga" class="form-select" id="basicSelect">
                                        <option>Status</option>
                                        <?php
                                        $value = isset($_GET['status_warga']) ? $_GET['status_warga'] : "";
                                        $sql = "SELECT * FROM status_warga";
                                        $result = $conn->query($sql);
                                        foreach ($result as $rows) {
                                            $selected = ($rows['id_status'] == $value) ? 'selected' : '';
                                            echo '<option value="' . $rows['id_status'] . '"' . $selected . '>' . $rows['status_warga'] . '</option>';
                                        };
                                        ?>
                                    </select>
                                    <label for="deskripsi" class="mt-2">Pendidikan: </label>
                                    <select name="pendidikan" class="form-select" id="basicSelect">
                                        <option>Pendidikan</option>
                                        <?php
                                        $value = isset($_GET['pendidikan']) ? $_GET['pendidikan'] : "";
                                        $sql = "SELECT * FROM pendidikan";
                                        $result = $conn->query($sql);
                                        foreach ($result as $rows) {
                                            $selected = ($rows['id_pendidikan'] == $value) ? 'selected' : '';
                                            echo '<option value="' . $rows['id_pendidikan'] . '"' . $selected . '>' . $rows['pendidikan'] . '</option>';
                                        };
                                        ?>
                                    </select>
                                    <label for="deskripsi" class="mt-2">Pekerjaan: </label>
                                    <select name="pekerjaan" class="form-select" id="basicSelect">
                                        <option>Pekerjaan</option>
                                        <?php
                                        $value = isset($_GET['pekerjaan']) ? $_GET['pekerjaan'] : "";
                                        $sql = "SELECT * FROM pekerjaan";
                                        $result = $conn->query($sql);
                                        foreach ($result as $rows) {
                                            $selected = ($rows['id_pekerjaan'] == $value) ? 'selected' : '';
                                            echo '<option value="' . $rows['id_pekerjaan'] . '"' . $selected . '>' . $rows['pekerjaan'] . '</option>';
                                        };
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal" name="create">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end -->
    <!-- Modal Ubah -->
    <?php
    include('../../system/connection.php');
    $sql = "SELECT * FROM penduduk";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $row) {
    ?>
        <div class="modal fade text-left" id="editModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Data Penduduk</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php
                    $v_alamat = $row['id_alamat'];
                    $v_keluarga = $row['id_keluarga'];
                    $v_status = $row['id_status'];
                    $v_pendidikan = $row['id_pendidikan'];
                    $v_pekerjaan = $row['id_pekerjaan'];
                    ?>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="alamat">Nama Penduduk: </label>
                                        <div class="form-group">
                                            <input id="alamat" name="nama" type="text" placeholder="Masukkan Nama Penduduk" value="<?= $row['nama'] ?>" class="form-control">
                                        </div>
                                        <label for="deskripsi">Tempat Lahir: </label>
                                        <div class="form-group">
                                            <input id="deskripsi" name="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir" value="<?= $row['tempat_lahir'] ?>" class="form-control">
                                        </div>
                                        <label for="deskripsi">Tanggal Lahir: </label>
                                        <div class="form-group">
                                            <input id="deskripsi" name="tgl_lahir" type="date" placeholder="Masukkan Tanggal Lahir" value="<?= $row['tgl_lahir'] ?>" class="form-control">
                                        </div>
                                        <label for="deskripsi">Jenis Kelamin: </label>
                                        <div class="d-flex gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki laki" <?php if ($row['jenis_kelamin'] == 'Laki laki') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Laki laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <label for="deskripsi" class="mt-2">Foto Identitas: </label>
                                        <div class="form-group">
                                            <input id="deskripsi" name="foto" type="file" placeholder="Masukkan Foto Identitas" class="form-control" onchange="previewImage(this, '<?= $row['id'] ?>')">
                                            <?php if ($row['foto'] != null) : ?>
                                                <img id="previewImg<?= $row["id"] ?>" src="../../img/<?= $row['foto'] ?>" alt="foto" width="100" style="display: <?= ($row['foto'] != null) ? 'block' : 'none' ?>; margin-top: 10px;">
                                            <?php else : ?>
                                                <img id="previewImg<?= $row["id"] ?>" src="" alt="foto" width="100" style="display: none; margin-top: 10px;">
                                            <?php endif; ?>
                                        </div>
                                        <script>
                                            function previewImage(input, id) {
                                                // console.log(id);
                                                var previewImg = document.getElementById(`previewImg${id}`);
                                                var previewImgBox = document.getElementById(`previewImg${id}`);
                                                var file = input.files[0];
                                                if (file) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        previewImg.src = e.target.result;
                                                        previewImgBox.style.display = 'block';
                                                    }
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    previewImg.src = "";
                                                    previewImgBox.style.display = 'none';
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="col-6">
                                        <label for="deskripsi">Alamat: </label>
                                        <select name="alamat" class="form-select" id="basicSelect">
                                            <option>Alamat</option>
                                            <?php
                                            $query = "SELECT * FROM alamat";
                                            $rslt = $conn->query($query);
                                            while ($rows = $rslt->fetch_assoc()) {
                                                $selected = ($rows['id_alamat'] == $v_alamat) ? 'selected' : '';
                                                echo '<option value="' . $rows['id_alamat'] . '"' . $selected . '>' . $rows['alamat'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="deskripsi" class="mt-2">Kepala Keluarga: </label>
                                        <select name="keluarga" class="form-select" id="basicSelect">
                                            <option>Kepala Keluarga</option>
                                            <?php
                                            $query = "SELECT * FROM keluarga";
                                            $rslt = $conn->query($query);
                                            while ($rows = $rslt->fetch_assoc()) {
                                                $selected = ($rows['id_keluarga'] == $v_keluarga) ? 'selected' : '';
                                                echo '<option value="' . $rows['id_keluarga'] . '"' . $selected . '>' . $rows['kepala_keluarga'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="deskripsi" class="mt-2">Status: </label>
                                        <select name="status_warga" class="form-select" id="basicSelect">
                                            <option>Status</option>
                                            <?php
                                            $query = "SELECT * FROM status_warga";
                                            $rslt = $conn->query($query);
                                            while ($rows = $rslt->fetch_assoc()) {
                                                $selected = ($rows['id_status'] == $v_status) ? 'selected' : '';
                                                echo '<option value="' . $rows['id_status'] . '"' . $selected . '>' . $rows['status_warga'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="deskripsi" class="mt-2">Pendidikan: </label>
                                        <select name="pendidikan" class="form-select" id="basicSelect">
                                            <option>Pendidikan</option>
                                            <?php
                                            $query = "SELECT * FROM pendidikan";
                                            $rslt = $conn->query($query);
                                            while ($rows = $rslt->fetch_assoc()) {
                                                $selected = ($rows['id_pendidikan'] == $v_pendidikan) ? 'selected' : '';
                                                echo '<option value="' . $rows['id_pendidikan'] . '"' . $selected . '>' . $rows['pendidikan'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="deskripsi" class="mt-2">Pekerjaan: </label>
                                        <select name="pekerjaan" class="form-select" id="basicSelect">
                                            <option>Pekerjaan</option>
                                            <?php
                                            $query = "SELECT * FROM pekerjaan";
                                            $rslt = $conn->query($query);
                                            while ($rows = $rslt->fetch_assoc()) {
                                                $selected = ($rows['id_pekerjaan'] == $v_pekerjaan) ? 'selected' : '';
                                                echo '<option value="' . $rows['id_pekerjaan'] . '"' . $selected . '>' . $rows['pekerjaan'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal" name="update">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ubah</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_GET['msgcreate'])) {
        $msgcreate = $_GET['msgcreate'];
    ?>
        <script>
            Swal.fire({
                title: "<?= $msgcreate ?>",
                icon: "success"
            });
        </script>
    <?php }
    if (isset($_GET['msgupdate'])) {
        $msgupdate = $_GET['msgupdate'];
    ?>
        <script>
            Swal.fire({
                title: "<?= $msgupdate ?>",
                icon: "success"
            });
        </script>
    <?php }
    if (isset($_GET['msgada'])) {
        $msgada = $_GET['msgada'];
    ?>
        <script>
            Swal.fire({
                title: "<?= $msgada ?>",
                icon: "error"
            });
        </script>
    <?php }
    if (isset($_GET['failempty'])) {
        $failempty = $_GET['failempty'];
    ?>
        <script>
            Swal.fire({
                title: "<?= $failempty ?>",
                icon: "error"
            });
        </script>
    <?php } ?>

    <script src="../../dist-template/assets/static/js/components/dark.js"></script>
    <script src="../../dist-template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="../../dist-template/assets/compiled/js/app.js"></script>



    <!-- Need: Apexcharts -->
    <script src="../../dist-template/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="../../dist-template/assets/static/js/pages/dashboard.js"></script>

</body>

</html>