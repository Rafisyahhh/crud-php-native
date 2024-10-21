<?php
require_once('../../system/connection.php');


if (isset($_POST['update'])) {
    $id = $_POST['id_pendidikan'];
    $pendidikan = $_POST['pendidikan'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM pendidikan WHERE pendidikan='$pendidikan' and not id_pendidikan = $id";
    $rslt = $conn->query($sqll);
    if (empty($pendidikan) || empty($deskripsi)) {
        header("Location: pendidikan.php?empty=Input gagal, terdapat form yang kosong");
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: pendidikan.php?msgadaa=Ubah gagal, Data yang anda input sudah ada");
        } else {
            $sql = "UPDATE pendidikan SET pendidikan = '$pendidikan', deskripsi = '$deskripsi' WHERE id_pendidikan = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: pendidikan.php?msgupdate=Berhasil mengubah data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
