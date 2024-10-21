<?php
require_once('../system/connection.php');

$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

//kondisi untuk register 
if(empty($username)||empty($password)||empty($repassword)){
    header("location:../frontend/signup.php?failempty=Register gagal, terdapat form yang kosong");
}else{
    if($password != $repassword){
        header("location:../frontend/signup.php?failpassword=Register gagal, password tidak sesuai");
    }else{
        $query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
        if(mysqli_num_rows($query)!=0){
            header("location:../frontend/signup.php?failusername=Register gagal, username sudah terdaftar");
        }else{
            $passwordMd5 = md5($password);
            mysqli_query($conn,"INSERT INTO user (username, password) VALUES ('$username', '$passwordMd5')");
            header("location:../frontend/login.php?success=Register berhasil, silahkan login");
        }
    }
}
?>