<?php
include "db.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
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
           <li><a href="cart.php" style="background-color: #00ACE6; border-radius: 25px;height:42px; width:140px; padding-top:11px"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>


            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #e6e6e6; border-radius: 25px;height:42px; width:140px; padding-top:11px"><span class="glyphicon glyphicon-triangle-bottom"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
                <ul class="dropdown-menu">

                    <li><a href="logout.php" style="background-color: whitesmoke; height:67px; width:150px; text-align: center; padding-top: 20px"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                </ul>
            </li>


        </nav>
        <br><br>
    </div>
</div>








<!--           NAV START           -->




<br><br><br>


<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: 	#4CAF50;
            list-style-type: none;
            text-align: center;
            padding-left: 380px;
        }

        li {
            float: left;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: #d6e9c6;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<ul >



    <?php

    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
    while($row = mysqli_fetch_array($run_query)){
        $cid = $row["cat_id"];
        $cat_name = $row["cat_title"];
        echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";

    }
    ?>


</ul>









</body>
</html>



















<!--                     NAV END                   safsffffffffffff-->








<br>
<br>

<div class="container-fluid">

    <!--
    <div class="thumbnail">

        <div class="w3-content w3-section" style="max-width:500px">

            <img class="mySlides w3-animate-fading" src="images/iphone x.jpg" style="height:480px; width: 1310px">
            <img class="mySlides w3-animate-fading" src="images/s9.jpg" style="height:480px; width: 1310px">
            <img class="mySlides w3-animate-fading" src="images/s9_cover.jpg" style="height:480px; width: 1310px">
            <img class="mySlides w3-animate-fading" src="images/Bannert.jpg">
        </div>

        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}
                x[myIndex-1].style.display = "block";
                setTimeout(carousel, 9000);
            }
        </script>

    </div> -->


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2 col-xs-12">
            <!--<div id="sidebar_container">
                <div class="sidebar">
                    <div class="sidebar_top"></div>
                    <div class="sidebar_item">
                        <div id="get_category">
                        </div>
                    </div>
                    <div class="sidebar_base"></div>
                </div>
                <div class="sidebar">
                    <div class="sidebar_top"></div>
                    <div class="sidebar_item">
                        <div id="get_brand">
                        </div>
                    </div>
                    <div class="sidebar_base"></div>
                </div>
                <div class="sidebar">
                    <div class="sidebar_top"></div>
                    <div class="sidebar_base"></div>
                </div>
            </div>-->

        </div>
        <div class="container-fluid" style="background-color: #FFFAFA">
            <div class="col-md-12 col-xs-12">

                <div class="panel panel-info">
                    <div class="col-sm-12" style="background-color:white; padding-bottom: 40px" >
                        <img src="images/grocery.jpg" style="width:100%; height: 350px; float: right">
                    </div>
                    <div class="col-sm-4" style="background-color:white">
                        <img src="images/1.jpg" style="width:100%; height: 250px; float: right">
                    </div>
                    <div class="col-sm-4" style="background-color:white">
                        <img src="images/3.jpg" style="width:100%; height: 250px; float: right">
                    </div>
                    <div class="col-sm-4" style="background-color:white">
                        <img src="images/2.jpg" style="width:100%; height: 250px; float: right">
                    </div>
                    <div class="panel-heading" style="background-color:#4CAF50; text-align:center; padding-top:275px"><h3 style="padding-top:365px; color: white">Products</h3></div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12" id="product_msg"></div>

                    </div>
                    <br>
                    <div class="panel-body" style="background-color:#FFFAFA">

                        <div id="get_product"></div>

                    </div>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <center>
            <ul class="pagination" id="pageno">
                <li><a href="#">1</a></li>
            </ul>
        </center>
    </div>
</div>







<!--     foooooter starts -->





<div class="panel-footer">
    <footer>
        <div class="footerHeader" ></div>
        <div class="container">
            <div class="col-md-4" >
                <h3>About us</h3>
                <p>
                    Bazarshodai.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.
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




<!--     foooooter ends-->






</body>
</html>
















































