<?php
    require 'dbclass.php';
    $db = new Db();
    $toll_gate = $db->select("SELECT * FROM  `toll_data` ORDER BY RAND() LIMIT 1");

    foreach ($toll_gate as $instance){
        $tg_name = $instance['location'];
        $tg_charge = $instance['charge'];
    }

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
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Balance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">History</a>
          </li>
    </ul>
 <!-- dark -->


 <div class="card" id="Payment" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Payment!</h5>
    <p class="card-text">Pay amount: <?php echo $tg_charge; ?> Rs at <?php echo $tg_name; ?> toll gate</p>
    <a href="#" class="card-link">Pay</a>
    <a href="#" class="card-link">Close</a>
  </div>
</div>


<div class="card" id="Balance" style="width: 18rem;">
 <div class="card-body">
   <h5 class="card-title">Account</h5>
   <p class="card-text">Your account balance is: Rs. --- </p>
 </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>


</html>
