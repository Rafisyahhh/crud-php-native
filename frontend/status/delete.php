<?php
require_once('../../system/connection.php');

$id_status = $_GET['id_status'];
$sql = "DELETE FROM status_warga WHERE id_status = $id_status";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: status.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
