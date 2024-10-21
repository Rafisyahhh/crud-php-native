<?php
require_once('../../system/connection.php');

if (isset($_POST['create'])) {
    $pekerjaan = $_POST['pekerjaan'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM pekerjaan WHERE pekerjaan='$pekerjaan'";
    $rslt = $conn->query($sqll);
    if (empty($pekerjaan) || empty($deskripsi)) {
        header("Location: pekerjaan.php?failempty=Input gagal, terdapat form yang kosong&pekerjaan=$_POST[pekerjaan]&deskripsi=$_POST[deskripsi]");
        $pekerjaan = $_POST['pekerjaan'];
        $deskripsi = $_POST['deskripsi'];
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: pekerjaan.php?msgada=Input gagal, data yang anda input sudah ada&pekerjaan=$_POST[pekerjaan]&deskripsi=$_POST[deskripsi]");
            $pekerjaan = $_POST['pekerjaan'];
            $deskripsi = $_POST['deskripsi'];
        } else {
            $sql = "INSERT INTO pekerjaan (pekerjaan, deskripsi) VALUES ('$pekerjaan', '$deskripsi')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: pekerjaan.php?msgcreate=Berhasil menambahkan data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
