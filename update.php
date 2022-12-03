<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update price</title>
    <link rel="stylesheet" href="http://localhost/dbms_tut/in.css">
</head>
<body>
<img class="bg" src="Blueberry muffins.jpeg" alt="cupcake">
<?php
    $server="localhost";
    $username="root";
    $password="";
    $con3=mysqli_connect($server,$username,$password);

    if(!$con3){
        die("connection to this database failed due to" .mysqli_connect_error());

    }
    ?>
    <div class=container>
    <h1>Update price of products</h1>
    <br>
   </div>
    
    <form action="update.php" method="post">
    <input type="text" name="change" id="change" placeholder="Enter product id">
    <input type="int" name="update" id="update" placeholder="Enter new price">

    <button class="btn">Apply</button>
    </form>
    <?php
    $update=0;
    $change=" ";
    ?>
    <?php
    if(isset($_POST['update']) || isset($_POST['change'])){
    ?>
    <?php
        $update=$_POST['update'];
        $change=$_POST['change'];
        $query="UPDATE `tcc`.`products_info` SET `price`='$update' where `product_id`='$change';";
        $run=mysqli_query($con3,$query);
    ?>
    <div class="cont">
        <h2>Value updated successfully!</h2>
    </div>
    <?php
        $result1="SELECT * FROM `tcc`.`products_info`";
        $sql1=mysqli_query($con3,$result1);
?>
    <div class="container">
    <table align="center" border="1px" style="width:600px; line-height:40px;">
        <tr>
        <th colspan="4"><h2>Bakery Products</h2></th>
        </tr>
        <t>
        <th> Product ID </th>
        <th> Product name </th>
        <th> Price </th>
        <th> Description </th>
        </t>
        <?php
        while($rows=mysqli_fetch_assoc($sql1))
        {
        ?>
            <tr>
            <td><?php echo $rows['product_id']; ?></td>;
            <td><?php echo $rows['product_name']; ?></td>;
            <td><?php echo $rows['price']; ?></td>;
            <td><?php echo $rows['description']; ?></td>;
            </tr>
        </div>
        <?php
        }
        ?>
<?php
        $result2="SELECT * FROM `tcc`.`old_product_info`";
        $sql2=mysqli_query($con3,$result2);
?>
    <div class="container">
    <table align="center" border="1px" style="width:600px; line-height:40px;">
        <tr>
        <th colspan="4"><h2>Bakery Products</h2></th>
        </tr>
        <t>
        <th> Product ID </th>
        <th> Product name </th>
        <th> Price </th>
        <th> Description </th>
        </t>
        <?php
        while($rows1=mysqli_fetch_assoc($sql2))
        {
        ?>
            <tr>
            <td><?php echo $rows1['product_id']; ?></td>;
            <td><?php echo $rows1['product_name']; ?></td>;
            <td><?php echo $rows1['price']; ?></td>;
            <td><?php echo $rows1['description']; ?></td>;
            </tr>
        </div>
        <?php
        }
        ?>

        <?php
        }
        ?>
    
</body>
<?php
    $con3->close();
    ?>
</html>