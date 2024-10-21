<?php
require_once('../../system/connection.php');


if (isset($_POST['update'])) {
    $id = $_POST['id_alamat'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM alamat WHERE alamat='$alamat' and not id_alamat = $id";
    $rslt = $conn->query($sqll);
    if (empty($alamat) || empty($deskripsi)) {
        header("Location: alamat.php?empty=Ubah gagal, terdapat form yang kosong");
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: alamat.php?msgadaa=Ubah gagal, data yang anda ubah sudah ada");
        } else {
            $sql = "UPDATE alamat SET alamat = '$alamat', deskripsi = '$deskripsi' WHERE id_alamat = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: alamat.php?msgupdate=Berhasil mengubah data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
