<?php
include("check_session.php");
include("connection.php");
if(isset($_POST['submit'])){
    $order_id2 = $_POST["orderid"];
    $user_id2 = $_POST["usid"];
    $sql =  "INSERT INTO orders SELECT * FROM cart where id = '$order_id2' and user_id = '$user_id2'";
    $run_sql= mysqli_query($connection , $sql);
    if($run_sql){

        $sql3 =  "delete from cart where id = '$order_id2' and user_id = '$user_id2'";
        $run_sql3= mysqli_query($connection , $sql3);
        if($run_sql){
            header("location: /ecommerceweb/web_admin/orders.php?success=1");
        }


    }

}
if(isset($_POST['submit2'])) {
    $order_id3 = $_POST["orderid2"];
    $user_id3 = $_POST["usid2"];
    $sql3 = "delete from cart where id = '$order_id3' and user_id = '$user_id3'";
    $run_sql3 = mysqli_query($connection, $sql3);
    if ($run_sql3) {
        header("location: /ecommerceweb/web_admin/orders.php?success=1");
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
<tr><th>Order Id</th><th>User_ID</th><th>Product Title</th><th>Quantity</th><th>Total Amount</th><th>Confirm</th><th>Cancel</th></tr>
<?php 
$result=mysqli_query($connection,"select id,user_id,product_title,qty,total_amt from cart ")or die ("query 1 incorrect.....");

while(list($order_id,$user_id,$product_title,$quantity,$totalamt)=mysqli_fetch_array($result))
{	
echo "<tr>
 <td>$order_id </td>
 <td>$user_id</td>
 <td>$product_title</td>
 <td>$quantity</td>
 <td>$$totalamt</td>
 <td>
 <form method='post'>
 <input style='width: 50px' value='$order_id' name='orderid' id='orderid' type='hidden'>
 <input style='width: 50px' value='$user_id' name='usid' id='usid' type='hidden'>
 <input id='submit' name='submit' type='submit' value='Confirm Order'>
</form>
 </td>
 <td>
 <form method='post'>
 <input style='width: 50px' value='$order_id' name='orderid2' id='orderid2' type='hidden'>
 <input style='width: 50px' value='$user_id' name='usid2' id='usid2' type='hidden'>
 <input id='submit2' name='submit2' type='submit' value='Cancel Order'>
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