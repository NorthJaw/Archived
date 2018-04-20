<?php
    require 'dbclass.php';
    session_start();


    $db = new Db();

     $id = $_SESSION['id'];



    $user_data = $db->select("SELECT * FROM `alpr_data` WHERE `id` =" .$id);



foreach ($user_data as $ins) {
    $user_name = $ins['name'];
    $user_address = $ins['address'];
    $user_wallet = $ins['wallet'];
    $user_license = $ins['license'];
}

$id = $db->quote($id,"'");

$toll_gate = $db->select("SELECT * FROM  `requests` WHERE `userid` =".$id." ORDER BY `timestamp` DESC LIMIT 1");

$flag = 1;

foreach ($toll_gate as $instance){
        $flag = 0;
        $tg_name = $instance['toll_name'];
        $tg_charge = $instance['toll_charge'];
    }

    if ($flag == 1) {
      echo "Happy riding !!";
    }

    $_SESSION['money_to_deduct'] = $tg_charge;
    $_SESSION['location'] = $tg_name;

    $id = $db->quote($id,"'");
    $booms = $db->query("SELECT * FROM `history` WHERE `userid` =".$id." ORDER BY `timestamp` DESC LIMIT 10");

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

		<link rel="stylesheet" href="LoginPage.css">

    <title>Hello, world!</title>
  </head>


  <body>

<!-- dark -->
    <ul class="nav nav-tabs bg-dark">
          <li class="nav-item">
            <a class="nav-link active" id = "Home_Btn" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "Balance_Btn" href="#">Balance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "History_Btn" href="#">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id = "Profile_Btn" href="#">Profile</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" id = "AddMoney_Btn" href="#">Add Money</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
    </ul>
 <!-- dark -->


 <div class="card" id="Payment" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Payment!</h5>
    <p class="card-text">Pay amount: <?php echo $tg_charge; ?> Rs at <?php echo $tg_name; ?> toll gate</p>
    <a href="makepayment.php" class="card-link">Pay</a>
    <a href="#" class="card-link">Close</a>
  </div>
</div>


<div class="card" id="Balance" style="width: 18rem;">
 <div class="card-body">
   <h5 class="card-title">Account</h5>
   <p class="card-text">Your account balance is: Rs. <?php echo $user_wallet ?> </p>
 </div>
</div>





<div class="card" id="Profile" style="width: 18rem;">
 <div class="card-body">
   <h5 class="card-title">Profile</h5>
   <p class="card-text">Name: <?php echo $user_name ?></p>
   <p class="card-text">License number: <?php echo $user_license ?></p>
   <p class="card-text">Address: <?php echo $user_address ?></p>
 </div>
</div>


<div class="card" id="addMoney" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Add Money</h5>
        <form id="Login" action="addmoney.php" method="post">
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" id="amount" aria-describedby="emailHelp" placeholder="Enter Amt">
                <small id="emailHelp" class="form-text text-muted">Amount will be directly added from your bank account.</small>
            </div>
            <button type="submit" class="btn btn-primary">Add Money</button>
        </form>
    </div>
</div>

<div class="card" id="History" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Last 10 transactions</h5>

        <?php

        if(!empty($booms)){
            echo "<table border='1'><tr><th>Toll Name</th><th>Amount Paid</th><th>Time</th>";
            foreach($booms as $instance){
                echo "<tr><td>".$instance['toll_name']."</td><td>".$instance['toll_charge']."</td><td>".$instance['timestamp']."</td></tr>";
            }
            $disp=0;
        }

        ?>

    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script src="Home.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>


</html>
