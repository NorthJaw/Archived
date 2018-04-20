<?php
    session_start();
    require 'dbclass.php';

    $db = new Db();

    $rows = $db->select("SELECT * FROM `alpr_data` WHERE `id` =".$_SESSION['id']);


foreach ($rows as $row) {
    $wallet = $row['wallet'];
    }

    $wallet = $wallet - $_SESSION['money_to_deduct'];

    $id = $_SESSION['id'];
    $tg_name = $_SESSION['location'];
    $tg_charge = $_SESSION['money_to_deduct'];

    $id = $db->quote($id,"'");
    $tg_name = $db->quote($tg_name,"'");
    $tg_charge = $db->quote($tg_charge,"'");

    $db->query("UPDATE `alpr_data` SET `wallet` = ".$wallet." WHERE `id` = ".$_SESSION['id']);
    $db->query("INSERT INTO history(userid,toll_name,toll_charge) VALUES (".$id.",".$tg_name.",".$tg_charge.")");
    $db->query("DELETE FROM `requests` WHERE `userid` =".$_SESSION['id']);

    header('Location: Home.php')
?>
