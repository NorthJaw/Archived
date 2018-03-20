<?php
    require 'dbclass.php';
    session_start();
    $db = new Db();

    if(!empty($_POST['username']) &&  isset($_POST['username']) && !empty($_POST['password']) &&  isset($_POST['password']) ){

        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        $password = $_POST['password'];

        $username = $db->quote($username,"'");
        $password = $db->quote($password,"'");

        $rows = $db->select("SELECT * FROM `alpr_data` WHERE `username` = ".$username."AND `password` = ".$password);
        #$rows = $db->select("SELECT * FROM `alpr_data` WHERE `id` = 7");

        $id = 69;



        if(empty($rows)){
            header("Location: LoginPage.php?type=1");

        }else{

            foreach ($rows as $row){
                $id = $row['id'];
            }
            $_SESSION['id'] = $id;
            header("Location: Home.php");
        }


    }else{

        header("Location: LoginPage.php?type=2");
    }






?>


