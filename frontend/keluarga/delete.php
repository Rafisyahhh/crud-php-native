<?php
require_once('../../system/connection.php');

$id_keluarga = $_GET['id_keluarga'];
$sql = "DELETE FROM keluarga WHERE id_keluarga = $id_keluarga";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: keluarga.php?msgdelete=Berhasil Hapus data");
} else {
    echo "Failed: " . mysqli_error($conn);
}
