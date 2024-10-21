<?php
require_once('../../system/connection.php');

$id_pendidikan = $_GET['id_pendidikan'];
$sql = "DELETE FROM pendidikan WHERE id_pendidikan = $id_pendidikan";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: pendidikan.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
