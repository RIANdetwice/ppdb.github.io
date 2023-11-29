<?php

include "libs/inc.php";

$user = new Muser();

try {
    $user->insert([
            
        "nm_user" => $_POST["nama"],
        "email_user" => $_POST["email"],
        "password_user" => md5($_POST["password"]),
        "level_user" => "user",
        "status" => 1
    ]);

    header("location:index.php");
} catch(PDOException $err) {
    header("location:registrasi.php?pesan=registrasi gagal !");
}