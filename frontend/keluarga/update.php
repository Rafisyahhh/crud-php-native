<?php
require_once('../../system/connection.php');


if (isset($_POST['update'])) {
    $id = $_POST['id_keluarga'];
    $kepala_keluarga = $_POST['kepala_keluarga'];
    $alamat = $_POST['alamat'];
    $jumlah_anggota = $_POST['jumlah_anggota'];

    $sqll = "SELECT * FROM keluarga WHERE kepala_keluarga='$kepala_keluarga' and not id_keluarga = $id";
    $rslt = $conn->query($sqll);
    if (empty($keluarga) || empty($deskripsi)) {
        header("Location: keluarga.php?empty=Ubah gagal, terdapat form yang kosong");
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: keluarga.php?msgadaa=Ubah gagal, data yang anda ubah sudah ada");
        } else {
            $sql = "UPDATE keluarga SET kepala_keluarga = '$kepala_keluarga', id_alamat = '$alamat', jumlah_anggota = '$jumlah_anggota' WHERE id_keluarga = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: keluarga.php?msgupdate=Berhasil mengubah data");
            } else {
                echo "Failed :" . mysqli_error($conn);
            }
        }
    }
}
