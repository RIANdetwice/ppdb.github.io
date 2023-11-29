<?php 

include "libs/inc.php";

$action = isset($_GET["ac"]) ? $_GET["ac"] :  "";
$Djurusan = new Mdaftar();


switch($action){
    case "add":
        try {
           $result =  $Djurusan->insert([
            
                    "nama_jurusan" => $_POST["nama_jurusan"],
                    "pagu_jurusan" => $_POST["pagu_jurusan"],
                    "status_jurusan" => $_POST["status_jurusan"],
            ]);
            
            header("location:data_daftar.php?pesan=Data berhasil di tambah");
        }catch(PDOException $err){
            header("location:form_jurusan.php?pesan=Data gagal di tambah !".$err->getMessage());
        }
       
        break;
        case "edit":
        try {
            $Djurusan->update(
                $_POST["id_jurusan"],
                [
                    "nama_jurusan" => $_POST["nama_jurusan"],
                    "pagu_jurusan" => $_POST["pagu_jurusan"],
                    "status_jurusan" => $_POST["status_jurusan"],
                ]
            );
            header("location:data_daftar.php?pesan=Data berhasil di Edit");
        }catch(PDOException $err){
            header("location:form_jurusan.php?pesan=Data gagal di Edit !".$err->getMessage());
        }
        break;

    case "delete":
        try {
            $Djurusan->Delete($_GET["id"]);
                header("location:data_daftar.php?pesan=Data berhasil di dihapus");
            
        }catch(PDOException $err){
            header("location:form_jurusan.php?pesan=Data gagal di dihapus !".$err->getMessage());
        }
        break;
    
    default:
        header("location:404.php");
        break;
}


