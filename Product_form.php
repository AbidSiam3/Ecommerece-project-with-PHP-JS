<!DOCTYPE html>


<?php
include("check_session.php");
include("db.php");
error_reporting(0);
if(isset($_POST['submit']))
{
    $product_name=$_POST['product_name'];
    $details=$_POST['details'];
    $price=$_POST['price'];
    $brand=$_POST['getBrands'];
    $category=$_POST['getCategories'];
    $quantity = $_POST['quantity'];
    $tags=$_POST['keywords'];

//picture coding
    $picture_name=$_FILES['picture']['name'];
    $picture_type=$_FILES['picture']['type'];
    $picture_tmp_name=$_FILES['picture']['tmp_name'];
    $picture_size=$_FILES['picture']['size'];
    $imagepath = "../product_images/";
    $imagepath2 = "../naimafinal/web_admin/product_images/";

    if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
    {
        if($picture_size<=50000000)
        {
            $pic_name=time()."_".$picture_name;
            move_uploaded_file($picture_tmp_name, $imagepath2 . $pic_name);
            move_uploaded_file($picture_tmp_name, $imagepath . $pic_name);
            mysqli_query($con,"insert into products (product_cat, product_brand,  product_title ,  product_price,  product_desc, product_image, product_qty , product_keywords) values ('$category','$brand','$product_name','$price','$details','$pic_name', '$quantity','$tags')") or die ("query incorrect");

            header("location: /naimafinal/web_admin/index.php?success=1");
        }else
        {

        }
    }else
    {}
    mysqli_close($connection);
}
?>






<html>
	<head>
		<meta charset="UTF-8">
		<title>Khan Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</head>
    
    <body>
   	<div class="container-fluid">
<?php include "web_admin/include/side_bar.php"?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#E6EEEE">
	<h1 style="color:#337ab7;"><span class="glyphicon glyphicon-tag"></span> Add New Product  </h1></div><br>
	<div class="panel-body" style="background-color:#337ab7;">
		<div class="col-lg-7">
        <div class="well">
        <form  method="post" name="form" enctype="multipart/form-data">
        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" autofocus style="width:100%" placeholder="Product Name" required>

<p>Add Image</p>
<div style="background-color:#CCC">
<input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
</div>
<p>Description</p>
<textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>

</div>
<div class="well">

<p>Price</p>
<div class="input-group">
      <div class="input-group-addon">Taka</div>
      <input type="text" class="form-control" name="price" id="price"  placeholder="0.00" required>
    </div><br>
    
    </div>
            
<div align="right"> 
       <a href="index.php"><button type="text" name="text" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button></a>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px; background-color:#1557c1; color:white;"> Add Product</button>
 </div>
            
        </div>  

        <div class="col-lg-5">
        <div class="well">
            
<h3>Other Details</h3>  
<p>Category</p>
<div class="get-cat">
    <?php


    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con,$sql);

    echo "<select name='getCategories'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['cat_id'] ."'>" . $row['cat_title'] ."</option>";
    }
    echo "</select>";
    ?>
</div>
            <br>
<p>Brand</p>
<div class="get-brand">
    <?php


    $sql = "SELECT * FROM brands";
    $result = mysqli_query($con,$sql);

    echo "<select name='getBrands'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['brand_id'] ."'>" . $row['brand_title'] ."</option>";
    }
    echo "</select>";
    ?>
            
</div><br>
            
<p>Keyword</p>
<input type="text" name="keywords" id="keywords" class="form-control" placeholder="Product name, Product type etc">

<br>
            <p>Product Quantity</p>
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="">
</div>
</div>

    </form>
 
	</div>
</div></div></div>

    
    </body>
</html>