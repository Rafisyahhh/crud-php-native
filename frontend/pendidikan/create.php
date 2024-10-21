<?php
require_once('../../system/connection.php');

if (isset($_POST['create'])) {
    $pendidikan = $_POST['pendidikan'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM pendidikan WHERE pendidikan='$pendidikan'";
    $rslt = $conn->query($sqll);
    if (empty($pendidikan) || empty($deskripsi)) {
        header("Location: pendidikan.php?failempty=Input gagal, terdapat form yang kosong&pendidikan=$_POST[pendidikan]&deskripsi=$_POST[deskripsi]");
        $pendidikan = $_POST['pendidikan'];
        $deskripsi = $_POST['deskripsi'];
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: pendidikan.php?msgada=Input gagal, data yang anda input sudah ada&pendidikan=$_POST[pendidikan]&deskripsi=$_POST[deskripsi]");
            $pendidikan = $_POST['pendidikan'];
            $deskripsi = $_POST['deskripsi'];
        } else {
            $sql = "INSERT INTO pendidikan (pendidikan, deskripsi) VALUES ('$pendidikan', '$deskripsi')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: pendidikan.php?msgcreate=Berhasil menambahkan data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
