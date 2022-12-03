<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Purchace</title>
    <link rel="stylesheet" href="http://localhost/dbms_tut/in.css">
</head>
<body>
    <img class="bg" src="Benoto Cake.jpeg" alt="cupcake">
<?php
    $server="localhost";
    $username="root";
    $password="";
    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database failed due to" .mysqli_connect_error());

    }
    $name='Raj';
    $gender='M';
    $phone=0;
    $email='abc@gmail.com';
    
    
    if(isset($_POST['name']) || isset($_POST['gender']) || isset($_POST['phone']) || isset($_POST['email'])){
        $name=$_POST['name'];
        session_start();
        $_SESSION['name']=$name;
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        
        
     }
       
    $sql="INSERT INTO `tcc`.`customer_info` (`Name`, `Email`, `Contact`, `Gender`) VALUES ('$name','$email','$phone','$gender');";
    if($con->query($sql)==true){
        echo "<h2> Welcome !</h2> ","<h2>",$name,"</h2>";
        echo "<br>";

    }
    else{
        echo "ERROR : $sql <br> $con->error";
    }
   
    $result="SELECT * FROM `tcc`.`products_info`";
    $sql1=mysqli_query($con,$result);
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
        <?php
        }
        ?>
    </table>
    </div>
    <br><br>
    <form action="bill.php" method="post">
       <input type="text" name="fname" id="fname" placeholder="Enter product id">
       <button class="btn">Buy</button>
    </form>  
    
</body>
</html>
  
</body>
    <?php
    $con->close();
    ?>
</html>

