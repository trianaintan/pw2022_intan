<?php

require_once "../config.php";

//jika tombol login ditekan

if(isset($_POST["login"])){
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

     {
            header("location:../index.php");
            exit;
        }
    

    
}

?>