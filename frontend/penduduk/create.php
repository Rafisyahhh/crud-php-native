<?php
require_once('../../system/connection.php');

// var_dump($_POST);
// var_dump($_FILES);
if (isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $foto = $_FILES['foto']['name'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $keluarga = $_POST['keluarga'];
    $status_warga = $_POST['status_warga'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];

    $img = "../../img/";
    $tmpFile = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpFile, $img . $foto);

    $sqll = "SELECT * FROM penduduk WHERE nama='$nama'";
    $rslt = $conn->query($sqll);
    if (empty($nama) || empty($foto) || empty($tempat_lahir) || empty($tgl_lahir) || empty($jenis_kelamin) || empty($alamat) || empty($keluarga) || empty($status_warga) || empty($pendidikan) || empty($pekerjaan)) {
        header("location: datapenduduk.php?failempty=Input gagal, terdapat form yang kosong&nama=$_POST[nama]&foto=$_POST[foto]&tempat_lahir=$_POST[tempat_lahir]&tgl_lahir=$_POST[tgl_lahir]&jenis_kelamin=$_POST[jenis_kelamin]&alamat=$_POST[alamat]&keluarga=$_POST[keluarga]&status_warga=$_POST[status_warga]&pendidikan=$_POST[pendidikan]&pekerjaan=$_POST[pekerjaan]");
        $nama = $_POST['nama'];
        $foto = $_FILES['foto']['name'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $keluarga = $_POST['keluarga'];
        $status_warga = $_POST['status_warga'];
        $pendidikan = $_POST['pendidikan'];
        $pekerjaan = $_POST['pekerjaan'];
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: datapenduduk.php?msgada=Input gagal, data yang anda input sudah ada&nama=$_POST[nama]&foto=$_POST[foto]&tempat_lahir=$_POST[tempat_lahir]&tgl_lahir=$_POST[tgl_lahir]&jenis_kelamin=$_POST[jenis_kelamin]&alamat=$_POST[alamat]&keluarga=$_POST[keluarga]&status_warga=$_POST[status_warga]&pendidikan=$_POST[pendidikan]&pekerjaan=$_POST[pekerjaan]");
            $nama = $_POST['nama'];
            $foto = $_FILES['foto']['name'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            $keluarga = $_POST['keluarga'];
            $status_warga = $_POST['status_warga'];
            $pendidikan = $_POST['pendidikan'];
            $pekerjaan = $_POST['pekerjaan'];
        } else {
            $sql = "INSERT INTO penduduk (nama, foto, tempat_lahir, tgl_lahir, jenis_kelamin, id_alamat, id_keluarga, id_status, id_pendidikan, id_pekerjaan) VALUES ('$nama', '$foto', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$keluarga', '$status_warga', '$pendidikan', '$pekerjaan')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: datapenduduk.php?msgcreate=Berhasil menambahkan data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
