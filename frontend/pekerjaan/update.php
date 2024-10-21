<?php
require_once('../../system/connection.php');


if (isset($_POST['update'])) {
    $id = $_POST['id_pekerjaan'];
    $pekerjaan = $_POST['pekerjaan'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM pekerjaan WHERE pekerjaan='$pekerjaan' and not id_pekerjaan = $id";
    $rslt = $conn->query($sqll);
    if (empty($pekerjaan) || empty($deskripsi)) {
        header("Location: pekerjaan.php?empty=Ubah gagal, terdapat form yang kosong");
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: pekerjaan.php?msgadaa=Ubah gagal, data yang anda ubah sudah ada");
        } else {
            $sql = "UPDATE pekerjaan SET pekerjaan = '$pekerjaan', deskripsi = '$deskripsi' WHERE id_pekerjaan = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: pekerjaan.php?msgupdate=Berhasil mengubah data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
