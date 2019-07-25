<?php
include "db.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}






if(isset($_POST["submit"])){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if($count > 0){

        while($row=mysqli_fetch_array($run_query)){
            $id = $row["id"];
            $pro_id = $row["p_id"];
            $pro_name = $row["product_title"];
            $pro_image = $row["product_image"];
            $qty = $row["qty"];
            $sql2= "SELECT * FROM products WHERE product_id = '$pro_id'";
            $run_query2 = mysqli_query($con,$sql2);
            if($run_query2){
                $row=mysqli_fetch_array($run_query2);

                $product_qty = $row["product_qty"];
                $updateqty = $product_qty - $qty;
                $sql3= "UPDATE products SET product_qty= $updateqty WHERE  product_id = '$pro_id'";
                $run_query3 = mysqli_query($con,$sql3);
                if($run_query3){
                    header("location: cartcheckoutpage.php");
                }
                else{
                    echo "<script type='text/javascript'>alert(<?php echo ERROR2 ?>);</script>";
                }

            }
            else{
                echo "<script type='text/javascript'>alert(<?php echo ERROR ?>);</script>";
            }


        }
    }



}

?>
<!DOCTYPE html>
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
            <li><a href="cart.php" style="background-color: #00ACE6; border-radius: 25px;height:42px; width:140px;text-align: center; padding-top:11px"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>


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

	<div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="cart_msg">
                <!--Cart Message-->
            </div>
            <div class="col-md-2"></div>
        </div>
		<div class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
				<div class="panel panel-primary"  style="border: none">
					<div class=""></div>
					<div class="panel-body">
						<div id="cart_checkout"></div>
						
						</div>
					</div>

				</div>
			</div>


			
		</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>

<div class="panel-footer">
    <footer>
        <div class="footerHeader" ></div>
        <div class="container">
            <div class="col-md-4" >
                <h3>About us</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>

            <div class="col-md-4">
                <h3>Our Location </h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d433868.0837064906!2d35.66744174160663!3d31.836036762053016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b5fb85d7981af%3A0x631c30c0f8dc65e8!2sAmman!5e0!3m2!1sen!2sjo!4v1499168051085" sytle="" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4" >
                <h3>Contact Us</h3>

                <li>Phone : 123 - 456 - 789</li>
                <li>E-mail : bazarshodai@company.com</li>
                <li>Fax : 123 - 456 - 789</li>
                <li>
                    <div class="sm">
                        <a href="#" ><img src=images/if_facebook_313103.png style="width:40px; height: 40px"></a>
                        <a href="#" ><img src=images/if_googleplus_313110.png style="width:40px; height: 40px"></a>
                        <a href="#" ><img src=images/if_twitter_313075.png style="width:40px; height: 40px"></a>
                        <a href="#" ><img src=images/if_instagram_313113.png style="width:40px; height: 40px"></a>

                    </div>
                </li>
            </div>
        </div>
    </footer>
</div>
</body>	
</html>
















		