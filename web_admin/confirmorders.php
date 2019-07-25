<?php
include("check_session.php");
include("connection.php");
if(isset($_POST["submit"])){
    $order_id2 = $_POST["orderid"];
    $sql2 =  "INSERT INTO cart SELECT * FROM orders where id = '$order_id2'";
    $sql =  "delete from orders where id = '$order_id2'";
    $run_sql2= mysqli_query($connection,$sql2);
    $run_sql= mysqli_query($connection , $sql);

    if($run_sql){
        header("location: /ecommerceweb/web_admin/confirmorders.php?success=1");
    }




}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/k.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
<?php include("include/header.php");?>
<div class="container-fluid main-container">
    <?php include("include/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
        <div class="panel-heading" style="background-color:#c4e17f">
            <h1>Orders </h1></div><br>
        <div class='table-responsive'>
            <div style="overflow-x:scroll;">
                <table class="table  table-hover table-striped" style="font-size:18px">
                    <tr><th>Order Id</th><th>User_name</th><th>User_Address</th><th>Mobile Number</th><th>Product Title</th><th>Quantity</th><th>Total Amount</th><th>Order Status</th><th>Operation</th></tr>
                    <?php
                    $result=mysqli_query($connection,"select id,user_id,product_title,qty,total_amt from orders ")or die ("query 1 incorrect.....");

                    while(list($order_id,$user_id,$product_title,$quantity,$totalamt)=mysqli_fetch_array($result))
                    {
                        $sql5= "select * from user_info where user_id = '$user_id'";
                        $run_sql5 = mysqli_query($connection, $sql5);
                        $row = mysqli_fetch_array($run_sql5);
                        $user_name = $row["first_name"];
                        $mbl_no = $row["mobile"];
                        $user_address = $row["address1"];
                        echo "<tr>
 <td>$order_id </td>
 <td>$user_name</td>
 <td>$user_address</td>
 <td>$mbl_no</td>
 <td>$product_title</td>
 <td>$quantity</td>
 <td>$$totalamt</td>
 <td>Confirmed</td> 
 <td>
 <form method='post'>
 <input style='width: 50px' value='$order_id' name='orderid' id='orderid' type='hidden'>
    <input type='submit' id='submit' name='submit' value='Cancel Delivery'>
    
</form>
</td>
</tr>";
                    }
                    ?>
                </table>
            </div></div>
        <nav align="center">

        </nav>
    </div></div>
<?php include("include/js.php");?>
</body>
</html>