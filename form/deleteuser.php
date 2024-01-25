<?php
//This file is for process de form and send to database

//echo "This file is for process the form and send to database";

if($_POST){

    $id = $_POST['user_id'];

    $conexionMysqli = new mysqli('localhost', 'root', '', 'test');

    if($conexionMysqli)
    {
        $sql = "DELETE from users where id='$id'";

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


