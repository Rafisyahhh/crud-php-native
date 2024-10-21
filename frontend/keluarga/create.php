<?php
require_once('../../system/connection.php');

if (isset($_POST['create'])) {
    $kepala_keluarga = $_POST['kepala_keluarga'];
    $alamat = $_POST['alamat'];
    $jumlah_anggota = $_POST['jumlah_anggota'];

    $sqll = "SELECT * FROM keluarga WHERE kepala_keluarga='$kepala_keluarga'";
    $rslt = $conn->query($sqll);
    if (empty($kepala_keluarga) || !isset($jumlah_anggota) || empty($alamat)) {
        header("Location: keluarga.php?failempty=Input gagal, terdapat form yang kosong&kepala_keluarga=$_POST[kepala_keluarga]&jumlah_anggota=$_POST[jumlah_anggota]&alamat=$_POST[alamat]");
        $kepala_keluarga = $_POST['kepala_keluarga'];
        $jumlah_anggota = $_POST['jumlah_anggota'];
        $alamat = $_POST['alamat'];
    } else {
        if ($rslt->num_rows > 0) {
            header("Location: keluarga.php?msgada=Input gagal, data yang anda input sudah ada&kepala_keluarga=$_POST[kepala_keluarga]&jumlah_anggota=$_POST[jumlah_anggota]&alamat=$_POST[alamat]");
            $kepala_keluarga = $_POST['kepala_keluarga'];
            $jumlah_anggota = $_POST['jumlah_anggota'];
            $alamat = $_POST['alamat'];
        } else {
            if ($jumlah_anggota < 1) {
                header("Location: keluarga.php?msgangka=Input harus lebih besar dari 1");
            } else {
                $sql = "INSERT INTO keluarga (kepala_keluarga, id_alamat, jumlah_anggota) VALUES ('$kepala_keluarga', '$alamat', '$jumlah_anggota')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: keluarga.php?msgcreate=Berhasil menambahkan data");
                } else {
                    echo "Failed :" . mysqli_error($conn);
                }
            }
        }
    }
}
