<?php 

include "libs/inc.php";

$action = isset($_GET["ac"]) ? $_GET["ac"] :  "";
$user = new Muser();


switch($action){
    case "add":
        try {
           $result =  $user->insert([
            
                    "nm_user" => $_POST["nm_user"],
                    "email_user" => $_POST["email_user"],
                    "password_user" => md5($_POST["password_user"]),
                    "level_user" => $_POST["level_user"],
                    "status" => $_POST["status"],
            ]);
            
            header("location:data_jurusan.php?pesan=Data berhasil di tambah");
        }catch(PDOException $err){
            header("location:form_jurusan.php?pesan=Data gagal di tambah !".$err->getMessage());
        }
       
        break;
        case "edit":
        try {
            $user->update(
                $_POST["id_user"],
                [
                    "nm_user" => $_POST["nm_user"],
                    "email_user" => $_POST["email_user"],
                    "password_user" => $_POST["password_user"] == "" ? $_POST["old_user"] : md5($_POST["password_user"]),
                    "level_user" => $_POST["level_user"],
                    "status" => $_POST["status"],
                ]
            );
            header("location:data_user.php?pesan=Data berhasil di Edit");
        }catch(PDOException $err){
            header("location:form_user.php?pesan=Data gagal di Edit !".$err->getMessage());
        }
        break;

    case "delete":
        try {
            $user->Delete($_GET["id"]);
                header("location:data_user.php?pesan=Data berhasil di dihapus");
            
        }catch(PDOException $err){
            header("location:form_user.php?pesan=Data gagal di dihapus !".$err->getMessage());
        }
        break;
    
    default:
        header("location:404.php");
        break;
}


