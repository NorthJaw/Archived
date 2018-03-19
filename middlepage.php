<?php

    session_start();

    if(!empty($_POST['id']) &&  isset($_POST['id']) ){

        $id = $_POST['id'];
        $_SESSION['id'] = $id;
        header("Location: Home.php");

    }else{
        echo "<script> alert(\"Invalid Login\");</script>";
        header("Location: LoginPage.php");
    }






?>


