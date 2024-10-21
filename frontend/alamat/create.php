<?php
require_once('../../system/connection.php');

if (isset($_POST['create'])) {
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $sqll = "SELECT * FROM alamat WHERE alamat='$alamat'";
    $rslt = $conn->query($sqll);
    if (empty($alamat) || empty($deskripsi)) {
        header("Location: alamat.php?failempty=Input gagal, terdapat form yang kosong&alamat=$_POST[alamat]&deskripsi=$_POST[deskripsi]");
        $alamat = $_POST['alamat'];
        $deskripsi = $_POST['deskripsi'];
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: alamat.php?msgada=Input gagal, data yang anda input sudah ada&alamat=$_POST[alamat]&deskripsi=$_POST[deskripsi]");
            $alamat = $_POST['alamat'];
            $deskripsi = $_POST['deskripsi'];
        } else {
            $sql = "INSERT INTO alamat (alamat, deskripsi) VALUES ('$alamat', '$deskripsi')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: alamat.php?msgcreate=Berhasil menambahkan data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
