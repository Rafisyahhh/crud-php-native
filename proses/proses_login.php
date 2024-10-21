<?php
require_once("../system/connection.php");

session_start();
if (isset($_SESSION['username'])) {
    header("location: ../frontend/dashboard.php");
    exit();
}
//menangkap request 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    //mengecek pengguna
    if (empty($username) || empty($password)) {
        header("location:../frontend/login.php?failempty=Login gagal, username atau password anda tidak boleh kosong");
    } else {
        if (mysqli_num_rows($query) != 0) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $row['username'];
            header("location: ../frontend/dashboard.php");
        } else {
            header("location: ../frontend/login.php?faillogin=Login gagal, username atau password anda salah&username=$_POST[username]");
            $username = $_POST['username'];
        };
    }
}
