<?php
require_once('../../system/connection.php');

if (isset($_POST['create'])) {
    $status_warga = $_POST['status_warga'];
    $deskripsi = $_POST['deskripsi'];
    $sqll = "SELECT * FROM status_warga WHERE status_warga='$status_warga'";
    $rslt = $conn->query($sqll);
    if (empty($status_warga) || empty($deskripsi)) {
        header("Location: status.php?failempty=Input gagal, terdapat form yang kosong&status_warga=$_POST[status_warga]&deskripsi=$_POST[deskripsi]");
        $status_warga = $_POST['status_warga'];
        $deskripsi = $_POST['deskripsi'];
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: status.php?msgada=Input gagal, data yang anda input sudah ada&status_warga=$_POST[status_warga]&deskripsi=$_POST[deskripsi]");
            $status_warga = $_POST['status_warga'];
            $deskripsi = $_POST['deskripsi'];
        } else {
            $sql = "INSERT INTO status_warga (status_warga, deskripsi) VALUES ('$status_warga', '$deskripsi')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: status.php?msgcreate=Berhasil menambahkan data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
