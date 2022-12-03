<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img  class="bg" src="Brownies.jpeg" alt="">
<div class="container">
<br><h3> Bill</h3>
</div>
    <?php
    $server="localhost";
    $username="root";
    $password="";
    $con1=mysqli_connect($server,$username,$password);

    if(!$con1){
        die("connection to this database failed due to" .mysqli_connect_error());

    }
    session_start();
    $name=$_SESSION['name'];
    $product=0;
    if(isset($_POST['fname'])){
        $product=$_POST['fname'];
    }
    $sql2="INSERT INTO `tcc`.`product_sell` (`name`, `product_id`) VALUES ('$name', '$product');";
    $run1=mysqli_query($con1,$sql2);
    $sql3="SELECT * FROM `tcc`.`products_info` WHERE `product_id`='$product';";
    $run=mysqli_query($con1,$sql3);
    $result=mysqli_fetch_assoc($run);
        echo "<h2> Name:  </h2>","<h2>", $name, "</h2>";
        echo "<br>";
        echo "<h2> Product id: </h2>","<h2>",$product,"</h2>" ;
        echo "<br>";
        echo "<h2> Product name: </h2>","<h2>",$result['product_name'],"</h2>";
        echo "<br>";
        echo "<h2> Amount paid: </h2>","<h2>",$result['price'],"</h2>";

    ?>
<div class="container">
<br><h3> Thankyou!</h3>
</div>
    
</body>
<?php
    $con1->close();
    ?>
</html>
