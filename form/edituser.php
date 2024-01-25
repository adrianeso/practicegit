<?php
//This file is for process de form and send to database

//echo "This file is for process the form and send to database";

if($_POST){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $conexionMysqli = new mysqli('localhost', 'root', '', 'test');

   if($conexionMysqli)
    {
        $sql = "UPDATE users SET name ='$name', email='$email', phone_number='$phone_number' where id='$id'";

        $save = $conexionMysqli->query($sql);


        if($save)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }else{
            echo "Not Saved !!!! :( ";
        }

    }else{
        echo "No conected !!!  :( ";
    }



}


