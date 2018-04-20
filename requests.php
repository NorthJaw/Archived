<?php
    require 'dbclass.php';
    $db = new Db();



if(!empty($_POST['toll']) &&  !empty($_POST['license']) && isset($_POST['toll']) &&isset($_POST['license']) ){



    $toll = $_POST['toll'];
    $license = $_POST['license'];


    $toll = $db->quote($toll,"'");
    $license = $db->quote($license,"'");

    $rows = $db->select("SELECT * FROM `alpr_data` WHERE `license` =".$license);
    foreach ($rows as $row) {
      $userid = $row['id'];
    }

    $cols = $db->select("SELECT * FROM `toll_data` WHERE `tollid` =".$toll);

    foreach ($cols as $col) {
      $toll_name = $col['location'];
      $toll_charge = $col['charge'];
    }


    $toll_name = $db->quote($toll_name,"'");
    $toll_charge = $db->quote($toll_charge,"'");
    $userid = $db->quote($userid,"'");

    $db->query("INSERT INTO `requests`(`userid`,`toll_name`,`toll_charge`,`license`) VALUES(".$userid.",".$toll_name.",".$toll_charge.",".$license.")");

    echo "Details recieved by the server";
}
?>
