<?php
require_once('../../system/connection.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $foto = $_FILES['foto'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $keluarga = $_POST['keluarga'];
    $status_warga = $_POST['status_warga'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];

    $sqlshow = "SELECT * FROM penduduk WHERE id = $id";
    $sqll = mysqli_query($conn, $sqlshow);
    $rslt = mysqli_fetch_assoc($sqll);
    if ($foto["name"] != "") {
        $img = $_FILES['foto'];
        unlink("../../img/" . $rslt['foto']);
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../img/' . $foto["name"]);
    }
    $sqls = "SELECT * FROM penduduk WHERE nama='$nama' and not id = $id";
    $rslts = $conn->query($sqls);
    if (empty($nama) || empty($foto) || empty($tempat_lahir) || empty($tgl_lahir) || empty($jenis_kelamin) || empty($alamat) || empty($keluarga) || empty($status_warga) || empty($pendidikan) || empty($pekerjaan)) {
        header("location: datapenduduk.php?failempty=Ubah gagal, terdapat form yang kosong");
    } else {
        if ($rslts->num_rows > 0) {
            header("Location: datapenduduk.php?msgada=Ubah gagal, data yang anda ubah sudah ada");
        } else {
            $foto = $foto["name"] != "" ? "foto= '$foto[name]', " : "";
            $sql = "UPDATE penduduk SET nama = '$nama',  $foto tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', id_alamat = '$alamat', id_keluarga = '$keluarga', id_status = '$status_warga', id_pendidikan = '$pendidikan', id_pekerjaan = '$pekerjaan' WHERE id = $id";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: datapenduduk.php?msgupdate=Berhasil mengubah data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
