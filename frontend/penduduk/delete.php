<?php
require_once('../../system/connection.php');

$iid = $_GET['id'];
$queryshow ="SELECT * FROM penduduk WHERE id = $iid";
$sqlshow = mysqli_query($conn, $queryshow);
$resultt = mysqli_fetch_array($sqlshow);

unlink("../../img/".$resultt['foto']);

$id = $_GET['id'];
$sql = "DELETE FROM penduduk WHERE id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: datapenduduk.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
