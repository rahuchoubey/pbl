<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Sell details</title>
    <link rel="stylesheet" href="http://localhost/dbms_tut/in.css">
</head>
<body>
    <img class="bg" src="Brownies.jpeg" alt="cup cake">
<?php
    
    $server="localhost";
    $username="root";
    $password="";
    $con6=mysqli_connect($server,$username,$password);

    if(!$con6){
        die("connection to this database failed due to" .mysqli_connect_error());

    }
?>
<div  class="cont" >
    <br>
    <h2>Product sell details are as follows: </h2>
    <br><br>
</div>
<?php
    $sql="SELECT `tcc`.`customer_info`.`Customer_id`,`tcc`.`customer_info`.`Name`,`tcc`.`customer_info`.`Email`,`tcc`.`customer_info`.`Contact`,`tcc`.`product_sell`.`product_id` FROM `tcc`.`customer_info` INNER JOIN `tcc`.`product_sell` on `tcc`.`customer_info`.`Name`=`tcc`.`product_sell`.`name`;";
    $sql1=mysqli_query($con6,$sql);
?>
<div class="container">
<table class="table" align="center" border="1px" style="width:600px; line-height:40px;">
    <tr>
    <th colspan="5"><h2>Product Sells</h2></th>
    </tr>
    <t>
    <th> Customer ID</th>
    <th> Customer Name</th>
    <th> Email</th>
    <th> Contact</th>
    <th> Product ID </th>
    </t>
    <?php
    while($rows=mysqli_fetch_assoc($sql1))
    {
    ?>
        <tr>
        <td><?php echo $rows['Customer_id']; ?></td>;
        <td><?php echo $rows['Name']; ?></td>;
        <td><?php echo $rows['Email']; ?></td>;
        <td><?php echo $rows['Contact']; ?></td>;
        <td><?php echo $rows['product_id']; ?></td>;

        </tr>
 </div>
    <?php
    }
    ?>
    </div>

    
</body>
<?php
    $con6->close();
    ?>
</html>