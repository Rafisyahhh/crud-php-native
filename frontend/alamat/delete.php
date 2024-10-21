<?php
require_once('../../system/connection.php');

$id_alamat = $_GET['id_alamat'];
$sql = "DELETE FROM alamat WHERE id_alamat = $id_alamat";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: alamat.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
