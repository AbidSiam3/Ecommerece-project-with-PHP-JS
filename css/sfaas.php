<?php
include "db.php";
session_start();
if(isset($_SESSION["uid"])){
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Techies Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
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

    </style>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #dbdbdb">
    <!--<h1 style="float:right"><a href="index.php">Techies <span class="logo_colour">Online Store</span></a></h1>-->

    <div style="float: left;width: 150px" class="container-fluid">
        <div  class="navbar-header">
            <div id="logo">
                <div id="logo_image"><a href="index.php"> <img src="images/techie.png" class="img-rounded" alt="Cinque Terre" style="height:60px;   width:138px"></a><!--<h3 style="color:#65c9f7"><em>SEEK. FIND. ENJOY!</em></h3>--></div>
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

            <li style="float: left; padding-left: 50px"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width: 150px; "><span style=""></span><p style="color: #8c8c8c; "><b>Categories</b></p></a>
                <ul class="dropdown-menu">
                    <div style="width:300px;">
                        <?php
                        $category_query = "SELECT * FROM categories";
                        $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
                        echo "
                        <div class='nav nav-pills nav-stacked dropdown'>
                            <li class='active'><a href='#'><h4>Categories</h4></a></li>
                            ";
                        if(mysqli_num_rows($run_query) > 0){
                            while($row = mysqli_fetch_array($run_query)){
                                $cid = $row["cat_id"];
                                $cat_name = $row["cat_title"];
                                echo "
                            <li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
                            ";
                            }
                            echo "</div>";
                        }
                        ?>
                    </div>
                </ul>
            </li>
            <li style="float: left; padding-left: px"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width: 150px; "><span style=""></span><p style="color: #8c8c8c; "><b>Brands</b></p></a>

                <!--<li style="float: left"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span style=""></span>Brands</a>
                  -->  <ul class="dropdown-menu">
                    <div style="width:300px;">
                        <?php
                        $brand_query = "SELECT * FROM brands";
                        $run_query = mysqli_query($con,$brand_query);
                        echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
                        if(mysqli_num_rows($run_query) > 0){
                            while($row = mysqli_fetch_array($run_query)){
                                $bid = $row["brand_id"];
                                $brand_name = $row["brand_title"];
                                echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
                            }
                            echo "</div>";
                        }
                        ?>
                    </div>
                </ul>
            </li>
        </nav>
        <nav class="nav navbar-nav navbar-right">
            <li> <div style="width:300px;left:10px;top:10px; padding-top: 9px"><input style="width: 200px; float: left;" type="text" class="form-control" id="search"><button style="width: 70px" class="btn btn-primary" id="search_btn" style=" float:right">Search</button></div>
            </li>
            <li><a href="web_admin/index.php"><span class=""></span>Admin Login</a></li>

            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
                <ul class="dropdown-menu">
                    <div style="width:300px;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Login</div>
                            <div class="panel-heading">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required/>
                                <label for="email">Password</label>
                                <input type="password" class="form-control" id="password" required/>
                                <p><br/></p>
                                <a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
                            </div>
                            <div class="panel-footer" id="e_msg"></div>
                        </div>
                    </div>
                </ul>
            </li>
            <li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>

        </nav>
        <br><br>
    </div>
</div>








<!--                       safsffffffffffff-->




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
            background-color: #333;
            list-style-type: none; text-align: center;
            padding-left: 500px;
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
            background-color: red;
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
    echo "
		<div class='nav nav-pills nav-stacked dropdown'>
	";
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $cid = $row["cat_id"];
            $cat_name = $row["cat_title"];
            echo "
					<li><a href='#' class='category' style='float: left' cid='$cid'>$cat_name</a></li>
			";
        }
        echo "</div>";
    }


    ?>
</ul>

</body>
</html>



















<!--                       safsffffffffffff--><!--                       safsffffffffffff-->








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
        <div class="container-fluid" style="background-color: #acc1d4">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-xs-12" id="product_msg"></div>

                </div>
                <div class="panel panel-info">
                    <div class="col-sm-12">
                        <img src="images/img13.jpg" style="width:100%; height: 250px; float: right">
                    </div>
                    <div class="panel-heading" style="background-color:#d9edf7"><h3>Products</h3></div>

                    <div class="panel-body" style="background-color:#acc1d4">

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
                <ul>
                    <li>Phone : 123 - 456 - 789</li>
                    <li>E-mail : techies_store@comapyn.com</li>
                    <li>Fax : 123 - 456 - 789</li>
                </ul>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                </p>
                <div class="sm">
                    <a href="#" ><img src=images/if_facebook_313103.png style="width:40px; height: 40px"></a>
                    <a href="#" ><img src=images/if_googleplus_313110.png style="width:40px; height: 40px"></a>
                    <a href="#" ><img src=images/if_twitter_313075.png style="width:40px; height: 40px"></a>
                    <a href="#" ><img src=images/if_instagram_313113.png style="width:40px; height: 40px"></a>

                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
















































