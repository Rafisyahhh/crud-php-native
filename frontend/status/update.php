<?php
require_once('../../system/connection.php');


if (isset($_POST['update'])) {
    $id = $_POST['id_status'];
    $status_warga = $_POST['status_warga'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM status_warga WHERE status_warga='$status_warga' and not id_status = $id";
    $rslt = $conn->query($sqll);
    if (empty($status_warga) || empty($deskripsi)) {
        header("Location: status.php?empty=Ubah gagal, terdapat form yang kosong");
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: status.php?msgadaa=Ubah gagal, data yang anda ubah sudah ada");
        } else {
            $sql = "UPDATE status_warga SET status_warga = '$status_warga', deskripsi = '$deskripsi' WHERE id_status = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: status.php?msgupdate=Berhasil mengubah data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
