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
    <title>Pendidikan - Penduduk Desa</title>   
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
                        <li class="sidebar-item">
                            <a href="../penduduk/datapenduduk.php" class='sidebar-link'>
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
                        <li class="sidebar-item  has-sub active">
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
                                <li class="submenu-item  active">
                                    <a href="pendidikan.php" class="submenu-link">Pendidikan</a>
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
                <h3>Pendidikan</h3>
            </div>
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pendidikan
                            <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>
                        </h4>
                    </div>
                    <!-- table head dark -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../../system/connection.php');
                                $sql = "SELECT * FROM pendidikan";
                                $result = mysqli_query($conn, $sql);
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row['pendidikan'] ?></td>
                                        <td><?= $row['deskripsi'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_pendidikan'] ?>">Ubah</button>
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
                                                            window.location.href = "delete.php?id_pendidikan=<?= $row['id_pendidikan'] ?>";
                                                        }
                                                    })
                                                }
                                            });
                                        }
                                    </script>

                                <?php
                                $no++; } ?>
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Tingkat Pendidikan</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="create.php" method="post">
                    <div class="modal-body">
                        <label for="alamat">Tingkat Pendidikan: </label>
                        <div class="form-group">
                            <input id="alamat" name="pendidikan" value="<?= isset($_GET['pendidikan']) ? $_GET['pendidikan'] : "" ?>" type="text" placeholder="Masukkan Tingkat Pendidikan" class="form-control">
                        </div>
                        <label for="deskripsi">Deskripsi: </label>
                        <div class="form-group">
                            <input id="deskripsi" name="deskripsi" value="<?= isset($_GET['deskripsi']) ? $_GET['deskripsi'] : "" ?>" type="text" placeholder="Masukkan Deskripsi" class="form-control">
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
    $sql = "SELECT * FROM pendidikan";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="modal fade text-left" id="editModal<?= $row['id_pendidikan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Tingkat Pendidikan</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="update.php" method="post">
                        <div class="modal-body">
                            <label for="alamat">Pendidikan: </label>
                            <div class="form-group">
                                <input id="alamat" name="pendidikan" type="text" placeholder="Masukkan Tingkat Pendidikan" value="<?= $row['pendidikan'] ?>" class="form-control">
                            </div>
                            <label for="deskripsi">Deskripsi: </label>
                            <div class="form-group">
                                <input id="deskripsi" name="deskripsi" type="text" placeholder="Masukkan Deskripsi" value="<?= $row['deskripsi'] ?>" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="id_pendidikan" value="<?= $row['id_pendidikan'] ?>">
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
    if (isset($_GET['msgadaa'])) {
        $msgadaa = $_GET['msgadaa'];
    ?>
        <script>
            Swal.fire({
                title: "<?= $msgadaa ?>",
                icon: "error"
            });
        </script>
    <?php } 
    if (isset($_GET['empty'])) {
        $empty = $_GET['empty'];
    ?>
        <script>
            Swal.fire({
                title: "<?= $empty ?>",
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
    <?php }?>

    <script src="../../dist-template/assets/static/js/components/dark.js"></script>
    <script src="../../dist-template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="../../dist-template/assets/compiled/js/app.js"></script>



    <!-- Need: Apexcharts -->
    <script src="../../dist-template/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="../../dist-template/assets/static/js/pages/dashboard.js"></script>

</body>

</html>