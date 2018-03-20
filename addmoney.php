<?php
    session_start();
    require 'dbclass.php';

    $db = new Db();

    $rows = $db->select("SELECT * FROM `alpr_data` WHERE `id` =".$_SESSION['id']);

foreach ($rows as $row) {
    $wallet = $row['wallet'];
}

    $wallet = $wallet + $_POST['amount'];

    $db->query("UPDATE `alpr_data` SET `wallet` = ".$wallet." WHERE `id` = ".$_SESSION['id']);

    header('Location: Home.php')
?>


