<?php
require_once('../../system/connection.php');

$id_pekerjaan = $_GET['id_pekerjaan'];
$sql = "DELETE FROM pekerjaan WHERE id_pekerjaan = $id_pekerjaan";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: pekerjaan.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
