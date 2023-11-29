<?php
session_start();
include "libs/inc.php";

$user = new Muser();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM tb_user WHERE email_user = '$email'";
$duser = $user->select($sql);

if(count($duser)>0){
    $ruser = $duser[0];
    if(md5($password)==$ruser["password_user"]){
        $_SESSION["login"] = $ruser;
        header("location:dashboard.php");
    }else {
        header("location:index.php?pesan=maaf password salah  !");
    }
}else {
    header("location:index.php?pesan=maaf email tidak ditemukan  !");
}