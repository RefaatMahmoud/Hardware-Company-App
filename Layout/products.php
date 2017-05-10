<?php 
include "../Admin/connect.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta Files -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>

    <!-- Style Files -->
    <link href="CSS/font-awesome.min" rel="stylesheet">
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/slider.css">
    <link href="CSS/products.css" rel="stylesheet" />
    <link href="CSS/index.css" rel="stylesheet" />
    <link href="CSS/font-awesome.min.css" rel="stylesheet">
    <!-- Scripting Files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/jquery-3.1.1.min.js"></script>
    <script src="JS/jquery.easing.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/products.js"></script>
    <script src="JS/buyform.js" async></script>
    <script src="JS/slider.js" async></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!--=================================== Navigatin Bar ================================-->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="container">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Technology</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                   
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="Images/logos/Tecnoshop3.png" height="30" width="200" class="logo" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="home.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="products.php">Products</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" size="10">
                    </div>
                    <button type="submit" class="btn btn-default">Go</button>
                </form>

                <?php
                    if(isset($_SESSION['user'])){
                        ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php" class="page-scroll"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["user"]?></a></li>
                        <li><a href="logout.php" class="page-scroll"><span class="glyphicon glyphicon-log-in"></span>log out</a></li>
                    </ul>

                    <?php
                    }
                else{?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="login_signup.php" class="page-scroll"><span class="glyphicon glyphicon-user"></span>Login/Sign Up</a></li>
                        </ul>
                        <?php }?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--/.navigation bar -->

    <!--Cover photo-->
    <!--    <img src="Images/Covers/cover.jpg" class="cover" height="550">-->
    <div class="slider-container">
        <div class="slider">
            <!--slide one-->
            <div class="slide hide">
                <img src="Images/slider/1.jpg" alt="">
                <div class="description">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <!--slide Two-->
            <div class="slide hide">
                <img src="Images/slider/2.jpg" alt="">
                <div class="description">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <!--slide Three-->
            <div class="slide hide">
                <img src="Images/slider/3.jpg" alt="">
                <div class="description">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <!--slide Four-->
            <div class="slide
				 hide">
                <img src="Images/slider/4.jpg" alt="">
                <div class="description">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <!--slide Five-->
            <div class="slide hide">
                <img src="Images/slider/5.jpg" alt="">
                <div class="description">
                    <h2>slide five</h2>

                    <p>hello my name is hazem tarek hemaily , i'm a student in the faculty of computers and infomatics at suez canal university
                    </p>
                </div>
            </div>
            <div class="dots">
                <a class=""></a>
                <a></a>
                <a></a>
                <a></a>
                <a></a>
            </div>
        </div>
    </div>
    <!--================================ Search ======================================= -->

    <div class="container search">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group" id="adv-search">
                    <input type="text" class="form-control" placeholder="Search for snippets" />
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <div class="dropdown dropdown-lg">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                        <div class="form-group">
                                            <label for="filter">Filter by</label>
                                            <select class="form-control" name="choose">
                                                <option value="0" selected>All Snippets</option>
                                                <option value="Labtop">Labtops</option>
                                                <option value="Mobile">Mobiles</option>
                                                <option value="Computers">Computers</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="contain">Price</label>
                                            <span id="price"></span>
                                            <input id="slider" type="range" min="1000" max="20000" step="100" name="price" />

                                        </div>


                                        <!--div class="form-group">
                                        <label for="contain">Contains the words</label>
                                        <input class="form-control" type="text" />
                                      </!--div-->
                                        <button type="submit" class="btn btn-primary" name="search-form"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                                    </form>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End Search-->

    <!--======================================Products===============================-->
    <div class="container">

        <div class="col-md-8 ">
            <h2 class="p4 section">Products</h2>



            <div class="container">


                <!--First product-->
                <div class="row product">
                    <!--div class="product-top"-->
                    <div class="col-md-10">

                        <?php
      if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['buyForm'])){
     if(!isset($_SESSION['user'])){
        header('Location:login_signup.php');
    }
          else{
   $formErrors = array();
    $namecard       = $_POST['namecard'];
    for($i=0;$i<strlen($_POST['cardNo']);$i++){
        if(isset($_POST['cardNo'])){
            $cardNo     = $_POST['cardNo'];
            if(is_numeric($cardNo)==false){
                $formErrors[]= "Card Number must be Numeric!";
            }
        }
    }
    for($i=0;$i<strlen($_POST['phone']);$i++){
        if(isset($_POST['phone'])){
            $phone     = $_POST['phone'];
            if(is_numeric($phone)==false){
                $formErrors[]= "Phone must be Numeric!";
            }
        }
    }
    if(isset($_POST['address'])){
        $address     = $_POST['address'];
        if(is_numeric($address)){
            $formErrors[]= "Address can't be Numeric!";
        }
    }
    $name       = $_POST['name'];
    $price       = $_POST['price']; 
    $hashCardNo = sha1($cardNo);
    if(empty($formErrors)){   
    $stmt = $con->prepare("INSERT INTO buy (namecard ,cardnumber ,phone ,address ,name,price)
                           VALUES (?,?,?,?,?,?)");
    $stmt->execute(array($namecard,$hashCardNo,$phone,$address,$name,$price));
    $stmt = $con->prepare('DELETE FROM items WHERE name = ? AND price =? LIMIT 1');
    $stmt->execute(array($name,$price));
    $stmt = $con->prepare('DELETE FROM uploaditems WHERE name = ? AND price =? LIMIT 1');
    $stmt->execute(array($name,$price));
    header('Location:products.php');
    }else{
                echo "<div class='container'>";
                echo "<div class='alert alert-danger text-center'>" . '<h3>You can not Buy by these Data<br> please Enter correct Data </h3></div>';
                echo "</div>";
            }
     }
    }

					      
                        
                        
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['search-form'])){
            $your_choose = $_POST['choose'];
               $price = $_POST['price'];
               $stmt = $con->prepare('select * from items where Price <='.$price);
               $stmt->execute();
               $rows = $stmt->fetchAll();
                foreach($rows as $row)
                {
                echo '<div class="col-md-3 product-left ">';
                echo '<div class="product-main simpleCart_shelfItem">';
                echo '<a href="buy.html" class="mask">';
                echo "'<img class='img-responsive zoom-img' src='../Admin/Layout/images/".$row['image']."' /></a>";
                echo '<div class="product-bottom">';
                echo '<div class="row">';
                echo '<h3>'.$row['Name'].'</h3>';
                echo '</div>';
                echo '<h4><a>';
                echo '<img src="images/images/cart-2.png" alt="" class="cart-img"></a>';
                echo '<span class="item_price">'.$row['Price'].'</span></h4>"';
                echo  "</div>";
                echo "</div>";
                echo "</div>";                    
                }}

else{
    echo "";}
            ?>
                    </div>
                    <!--/.col-md-10-->
                </div>

            </div>
        </div>
    </div>
    <!--/.container-->

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>BUY FORM</h2>
            </div>
            <div class="modal-body">


                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <input type="hidden" class="price" value="" name="price">
                    <input type="hidden" class="label" value="" style="display : block; color : black !important ;" name="name">

                    <div class='form-row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label>
                            <select class='form-control' name="namecard">
                                    <option value="Payoneer">Payoneer</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Skrill">Skrill</option>
                                </select>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Card Number</label>
                            <input autocomplete='off' class='form-control card-number' size='20' type='text' name='cardNo'>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Enter Your Phone</label>
                            <input autocomplete='off' class='form-control card-number' type='phone' name='phone'>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Enter Your Address</label>
                            <input autocomplete='off' class='form-control card-number' type='text' name='address'>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-md-12'>
                            <div class='text-center total'>
                                Total:
                                <span class='Price'></span>
                            </div>
                        </div>
                    </div>

                    <input class=' btn btn-primary submit-button' type='submit' name="buyForm" value='Pay'>

                    <div class='form-row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>
                                Please correct the errors and try again.
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!--/.modal-body-->

        </div>
        <!--/.modal-content-->
    </div>
    <!--/.modal-->


    <!--===========================footer start=================================-->
    <div id="footer">
        <div class="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="title">ABOUT US</h2>
                        <div class="">
                            <blockquote>
                                <h1>Welcome to Technoshop</h1>
                                <ul>
                                    <li>
                                        <p><i>the Middle East’s online marketplace. We connect people and products – opening up a world of possibility.we give you access to everything you need and want. Our range is unparalleled, and our prices unbeatable. This is Technoshop – the power is in your hands.</i></p>
                                    </li>

                                </ul>
                            </blockquote>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <h2 class="title">Contact Us</h2>
                        <form role="form" action="#" method="post">
                            <div class="form-group"><input class="form-control" type="text" name="name" id="name" value="Name" onFocus="if (this.value == 'Name') this.value = '';" onBlur="if (this.value == '') this.value = 'Name';" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" id="email" value="Email" onFocus="if (this.value == 'Email') this.value = '';" onBlur="if (this.value == '') this.value = 'Email';" /></div>

                            <textarea name="message" id="message" class="form-control" onFocus="if (this.value == 'Message') this.value = '';" onBlur="if (this.value == '') this.value = 'Message';">Message</textarea>

                            <div class="clear"></div>
                            <br>
                            <input type="reset" class="btn-default" value="Cancel!" />
                            <input type="submit" class="btn-default" value="Send!" name="save" />

                            <?php
                                
                                
                                if(isset($_POST['save']))
                                {
                                    $name = $_POST['name'];
                                $email = $_POST['email'];
                                $message = $_POST['message'];
                                     $stmt = $con->prepare("Insert into contacts (Name,email,message) values(:name , :email ,:message)");
                                    
                                    $stmt->execute(array(
                                        'name' => $name ,
                                        'email' => $email,
                                        'message' => $message 
    ));    
                                }
                                
                                
                                ?>

                                <div class="clear"></div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="foot">

                        <a href="https://www.instagram.com/"> <img src="Images/Social/F.png" height="50" width="50" /> </a>

                        <a href="https://www.instagram.com/"> <img src="Images/Social/T.png" height="50" width="50" /> </a>


                        <a href="https://www.facebook.com"> <img src="Images/Social/email.png" height="50" width="50" /> </a>


                        <a href="https://www.Twitter.com"> <img src="Images/Social/gplus.png" height="50" width="50" /></a>


                        <a href="https://www.instagram.com/"> <img src="Images/Social/rss.png" height="50" width="50" /> </a>


                    </div>


                    <!--/.span3-->

                    <!--/.row-->
                    <div class="row">
                        <hr class="featurette-divider">
                        <div class="clear_fix"></div>
                        <div class="top">&#94;</div>
                        <script src="js/scrolling-nav.js"></script>
                    </div>
                </div>
                <!--/.container -->
            </div>
            <!--/.wrap-->
        </div>

        <script src="JS/index.js"></script>

        <!--=========================== footer end==========================-->

</body>

</html>
