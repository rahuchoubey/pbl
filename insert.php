<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert new product</title>
    <link rel="stylesheet" href="http://localhost/dbms_tut/style.css">
</head>
<body>
<img class="bg" src="Brownies.jpeg" alt="cupcake">
<?php
    
    $server="localhost";
    $username="root";
    $password="";
    $con5=mysqli_connect($server,$username,$password);

    if(!$con5){
        die("connection to this database failed due to" .mysqli_connect_error());

    }
    echo "<h1> Insert new products </h1>";
    echo "<br>";
?>
   <form action="insert.php" method="post">
   <input type="text" name="id" id="id" placeholder="Enter product id">
   <input type="text" name="name" id="name" placeholder="Enter product name">
   <input type="text" name="price" id="price" placeholder="Enter product price">
   <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter product description"></textarea>
   <button class="btn">Insert</button>
    </form>
    <?php
    $id="";
    $name="";
    $price="";
    $desc="";
    ?>
    <?php
    if(isset($_POST['id']) || isset($_POST['name']) || isset($_POST['price']) || isset($_POST['desc'])){
    ?>
    <?php
        $id=$_POST['id'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $sql="INSERT INTO `tcc`.`products_info`(`product_id`, `product_name`, `price`, `description`) VALUES ('$id','$name','$price','$desc');";
        $run=mysqli_query($con5,$sql);
        echo "<b><h2>Product added successfully!</h2></b>";
        $result1="SELECT * FROM `tcc`.`products_info`";
        $sql1=mysqli_query($con5,$result1);
?>
    <div class="cont">
    <table  border="1px" style="width:600px; line-height:40px;">
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
    }
    ?>

</body>
<?php
    $con5->close();
    ?>
</html>