<?php
//This file is for process de form and send to database

//echo "This file is for process the form and send to database";

if($_POST){

    $name =  $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phoneNumber = $_POST['phone_number'];

    $conexionMysqli = new mysqli('localhost', 'root', '', 'test');

    if($conexionMysqli)
    {
        $sql = "INSERT INTO users  VALUES (NULL, '$name', '$email', '$phoneNumber', '$message', NULL, NULL, NULL)";

        $save = $conexionMysqli->query($sql);

        if($save)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER'].'?error="not saved');
        }




    }else{
        echo "No conected !!!  :( ";
    }

//    $mbd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
//
//    if($mbd){
//        echo "Connected with pdo";
//    }else{
//        echo "No connected";
//    }



}


