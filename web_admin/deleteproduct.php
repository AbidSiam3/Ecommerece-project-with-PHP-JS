<!DOCTYPE html>

<?php
session_start();
include "db.php";
$product_id = $_GET["ido"];
$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
$run_query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($run_query);
$product_price = $row["product_price"];
$proid = $row["product_id"];
$product_title = $row["product_title"];

if(isset($_POST["submit"])) {
                    $proofid = $_POST["proofid"];
                    $sql1 = "DELETE FROM products WHERE product_id=$proofid";
                    $run_query2 = mysqli_query($con, $sql1);
					
                    if ($run_query2) {
                        header('location: adminproductlist.php');
                    }
                    else{
                        echo  "
                            <div class='alert alert-success'>
				        	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				            <b>Delete Unsuccessful..!</b>
				            </div>";
                    }
					//header('location: adminproductlist.php');
                }



?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bazar Shodai</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>

    <style>



        @media screen and (max-width:480px){
            #search{width:80%;}
            #search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}

            .red
            {
                color: white;
                background-color: red;
            }
            .green
            {
                color: white;
                background-color: green;
            }
            .blue
            {
                color: white;
                background-color: blue;
            }



            .modal-header, h4, .close {
                background-color: #5cb85c;
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-footer {
                background-color: #f9f9f9;
            }



    </style>
    <script>
        $(document).ready(function(){
            $("#myBtn").click(function(){
                $("#myModal").modal();
            });
        });
    </script>
</head>
<body>


<!--    NOTE

	1. admin login signup signin er hover color change kora lagbe DONE
	2. green er vitor white text DONE







-->



<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #FFFAFA">     <!-- Headbar background color -->
    <!--<h1 style="float:right"><a href="index.php">Techies <span class="logo_colour">Online Store</span></a></h1>-->

    <div style="float: left;width: 150px" class="container-fluid">
        <div  class="navbar-header">
            <div id="logo">
                <div id="logo_image"><a href="index.php"> <img src="images/5.png" class="img-rounded" alt="Cinque Terre" style="height:60px;   width:138px"></a><!--<h3 style="color:#65c9f7"><em>SEEK. FIND. ENJOY!</em></h3>--></div>
                <div id="logo_text">

                </div>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                <span class="sr-only">navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
    </div>




    <!--<div style="float: left" class="container-fluid">
        <div  class="navbar-header">
            <div id="get_category">
            </div>
            </div>

        </div>
-->



    <div class="collapse navbar-collapse" id="collapse">

       <nav class="nav navbar-left">
            <li> <div style="width:500px;left:10px;top:10px; padding-top: 9px; padding-left: 30px"><input style="width: 300px; float: left;" type="text" class="form-control" id="search"><button style="width: 70px; float: left; background-color: #4CAF50" class="btn btn-primary" id="search_btn">Search</button></div></li>
            
        </nav>
        <nav class="nav navbar-nav navbar-right" style="padding-right: 50px; padding-top:9px">
            <!--<li> <div style="width:300px;left:10px;top:10px; padding-top: 9px"><input style="width: 200px; float: left;" type="text" class="form-control" id="search"><button style="width: 70px" class="btn btn-primary" id="search_btn" style=" float:right">Search</button></div>
            </li>-->
            <!--<li><a href="cart.php" style="background-color: #00ACE6; border-radius: 25px;height:42px; width:140px;text-align: center; padding-top:11px"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
-->

            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #e6e6e6;text-align: center; border-radius: 25px;height:42px; width:140px; padding-top:11px"><span class="glyphicon glyphicon-triangle-bottom"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php" style=" height:42px; width:140px; text-align: center; padding-top: 14px"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                </ul>
            </li>


        </nav>
        <br><br>
    </div>
</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<p><br/></p>

<div class="container-fluid">
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="signup_msg">
            <!--Alert from signup form-->
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Product Price Update</div>
                <div class="panel-body">

                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden"  id="proofid" name="proofid" value="<?php echo $product_id; ?>" class="form-control">
                            </div>
                            <p><br/></p>
                            <div class="col-md-6">
                                <p><b><h3>Do you really want to delete <?php echo $product_title; ?>?</h3></b></p>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <input style="float:right;" value="Delete" type="submit" id="delete_button" name="submit"class="btn btn-success btn-lg">
                                    <a href='adminproductlist.php'><input style="float:right;" value="Cancel" type="button" id="cancelbuttonadmin" name="cancel_button"class="btn btn-success btn-lg"></a>
                                </div>
                            </div>
                            <div class="row">
                                <a class="col-md-12">

                            </div>
                        </div>
                </div>
                </form>


              
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>



















