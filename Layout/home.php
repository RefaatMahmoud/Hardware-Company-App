<?php
include "../Admin/connect.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <!-- Meta Files -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Style Files -->
        <link href="Css/bootstrap.min.css" rel="stylesheet">

        <link href="Css/products.css" rel="stylesheet" />
        <link href="Css/index.css" rel="stylesheet" />
        <!-- Scripting Files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="JS/jquery-3.1.1.min.js"></script>
        <script src="JS/jquery.easing.min.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/products.js"></script>
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
                    <!--form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" size="10">
                    </div>
                    <button type="submit" class="btn btn-default">Go</button>
                </!--form-->

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="page-scroll"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#" class="page-scroll"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!--/.navigation bar -->

        <!--Cover photo-->
        <img src="Images/Covers/cover.jpg" class="cover" height="550">


        <!--================================ Categories =================================== -->

        <div class="container">
            <!-- This is the content container-->
            <div class="cate">
                <div class="container">
                    <h1 class="section">Products</h1>
                    <hr class="featurette-divider">

                    <!--LAPTOP-->
                    <div class="cate-top grid-1">
                        <br>
                        <div class="col-md-4 cate-left">
                            <h3 class="categories">LAPTOPS</h3>
                            <figure class="effect-bubba">
                                <img class="img-responsive" src="Images/cate/lapto.png" alt="" />
                                <figcaption>
                                    <h4>SHOP NOW!</h4>
                                </figcaption>
                            </figure>
                        </div>

                        <!--Tablets-->
                        <div class="col-md-4 cate-left">
                            <h3 class="categories">TABLETS</h3>
                            <figure class="effect-bubba">
                                <img class="img-responsive" src="images/cate/tablet.png" alt="" />
                                <figcaption>
                                    <h4>SHOP NOW!</h4>
                                </figcaption>
                            </figure>
                        </div>

                        <!--Mobile Phones-->
                        <div class="col-md-4 cate-left">
                            <h3 class="categories">MOBILE PHONES</h3>
                            <figure class="effect-bubba">
                                <img class="img-responsive" src="images/cate/phone.png" alt="" />
                                <figcaption>
                                    <h4>SHOP NOW!</h4>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <!--.cate-top grid-1-->
                </div>
                <!--.container-->
            </div>
            <!--/.cate -->
            <!--End of Products Categories-->

            <!--=================================MOST POPULER PRODUCTS===============================-->
            <div class="product">
                <div class="container">
                    <h1 class="section">MOST POPULER</h1>
                    <hr class="featurette-divider">
                    <!--LEFT ARROW -->
                    <div class="col-md-1 product-left">
                        <a class="btn btn-default btn-lg arr" aria-label="Left Align">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        </a>
                    </div>

                    <!--First product-->
                    <div class="col-md-10">
                        <div class="product-top">
                            <div class="product-one">

                                <div class="col-md-3 product-left ">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a class="mask">
                                            <img class="img-responsive zoom-img" src="images/images/lab4.jpg" alt="" /></a>
                                        <div class="product-bottom">
                                            <div class="row">
                                                <h3>Dell Laptop</h3>
                                            </div>
                                            <p>Model 2012</p>
                                            <h4>
                                                <a>
                                                    <img src="Images/pop.png" class="pop" height="70" /> <img src="images/images/cart-2.png" alt="" class="cart-img"></a><span class=" item_price">4000 LE</span></h4>
                                        </div>
                                        <!--/.product_bottom-->
                                    </div>
                                    <!--/.product-main-->
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.product-one-->


                            <!--Second Product-->
                            <div class="col-md-3 product-left ">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab5.jpeg" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>Hp Laptop</h3>
                                        </div>
                                        <p>Model 2014</p>
                                        <h4>
                                            <a>
                                                <img src="Images/pop.png" class="pop" height="70" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">5000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Third Product -->
                            <div class="col-md-3 product-left ">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab6.png" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3 class="pro">Apple Laptop</h3>
                                        <p class="row">Model 2015</p>
                                        <h4>
                                            <a>
                                                <img src="Images/pop.png" class="pop" height="70" /> <img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">10000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Fourth Product-->
                            <div class="col-md-3 product-left ">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab7.jpg" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>Toshiba Laptop</h3>
                                        </div>
                                        <p>Model 2010</p>
                                        <h4>
                                            <a>
                                                <img src="Images/pop.png" class="pop" height="70" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">7000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->
                           
                            <?php
                            //Now I will Get Data from DB when Device is most popular
                            $stmt = $con->prepare('select * from uploaditems');
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                            foreach($rows as $row)
                            {
                            if($row['status']==2)
                            {
                            echo '<div class="col-md-3 product-left ">';
                            echo '<div class="product-main simpleCart_shelfItem">';
                            echo '<a class="mask">';
                            echo "<img class='img-responsive zoom-img' src='../Admin/Layout/images/".$row['image']."' alt='' /></a>";
                             echo '<div class="product-bottom">';
                            echo '<div class="row">';
                            echo  "<h3>".$row['Name']."</h3>";
                            echo '</div>';
                            echo '<p>'.$row['Model'].'</p>';
                            echo '<h4><a>';
                            echo '<img src="Images/pop.png" class="pop" height="70" />';           
                            echo '<img src="images/images/cart-2.png" alt="" class="cart-img">';
                            echo '</a> <span class=" item_price">'.$row['Price'].'</span></h4>';
                            echo "</div>"; 
                            echo "</div>";
                            echo "</div>";
                            }
                            }
                            ?>
               
                        </div>
                        <!--/.product-top-->
                    </div>
                    <!--/.col-md-10>

                    <!--RIGHT ARROW -->
                    <div class="col-md-1 product-left">
                        <a class="btn btn-default btn-lg arr" aria-label="Right Align">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.container-->
            </div>
            <!--/.product-->

            <!--========================================== ON SALE PRODUCTS =====================-->

            <div class="product">
                <div class="container">
                    <h1 class="section">ON SALE</h1>
                    <hr class="featurette-divider">
                    <div class="product-top">
                        <div class="product-one">

                            <!--LEFT ARROW-->
                            <div class="col-md-1 product-left">
                                <a class="btn btn-default btn-lg arr" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--product-one-->

                        <!--First Product -->
                        <div class="col-md-10">
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab8.jpg" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>Acer Laptop</h3>
                                        </div>
                                        <p>Model 2011</p>
                                        <h4>
                                            <a>
                                                <img src="Images/saleoff.png" class="sale" /><img src="images/images/cart-2.png" class="cart-img" alt=""> </a> <span class=" item_price">8000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Second Product-->
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab9.png" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>SONY Laptop</h3>
                                        </div>
                                        <p>Model 2015</p>
                                        <h4>
                                            <a>
                                                <img src="Images/saleoff.png" class="sale" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">9000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Third Product-->
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab10.jpg" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>VIO Laptop</h3>
                                        </div>
                                        <p>Model 2014</p>
                                        <h4>
                                            <a>
                                                <img src="Images/saleoff.png" class="sale" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">11000</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Fourth Product-->
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab11.png" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>Lenovo laptop</h3>
                                        </div>
                                        <p>Explore now</p>
                                        <h4>
                                            <a>
                                                <img src="Images/saleoff.png" class="sale" /> <img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">12000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->
                            <?php
                            //Now I will Get Data from DB when Device is most popular
                            $stmt = $con->prepare('select * from uploaditems');
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                            foreach($rows as $row)
                            {
                            if($row['status']==3)
                            {
                            echo '<div class="col-md-3 product-left ">';
                            echo '<div class="product-main simpleCart_shelfItem">';
                            echo '<a class="mask">';
                            echo "<img class='img-responsive zoom-img' src='../Admin/Layout/images/".$row['image']."' alt='' /></a>";
                             echo '<div class="product-bottom">';
                            echo '<div class="row">';
                            echo  "<h3>".$row['Name']."</h3>";
                            echo '</div>';
                            echo '<p>'.$row['Model'].'</p>';
                            echo '<h4><a>';
                            echo '<img src="Images/saleoff.png"  class="sale" />';           
                            echo '<img src="images/images/cart-2.png" alt="" class="cart-img">';
                            echo '</a> <span class=" item_price">'.$row['Price'].'</span></h4>';
                            echo "</div>"; 
                            echo "</div>";
                            echo "</div>";
                            }
                            }
                            ?>
                        </div>
                        <!--/.col-md-10-->
                        <!--RIGHT ARROW-->
                        <div class="col-md-1 product-left">
                            <a class="btn btn-default btn-lg arr" aria-label="Right Align">
                                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.product-top-->
                </div>
                <!--container-->
            </div>
            <!--product-->


            <!--End of Products-->

            <!--=================================NEW PRODUCTS===============================-->
            <div class="product">
                <div class="container">
                    <h1 class="section">NEW</h1>
                    <hr class="featurette-divider">
                    <!--LEFT ARROW -->
                    <div class="col-md-1 product-left">
                        <a class="btn btn-default btn-lg arr" aria-label="Left Align">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        </a>
                    </div>

                    <!--First product-->
                    <div class="col-md-10">
                        <div class="product-top">
                            <div class="product-one">

                                <div class="col-md-3 product-left ">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a class="mask">
                                            <img class="img-responsive zoom-img" src="images/images/lab4.jpg" alt="" /></a>
                                        <div class="product-bottom">
                                            <div class="row">
                                                <h3>Dell Laptop</h3>
                                            </div>
                                            <p>Model 2012</p>
                                            <h4>
                                                <a>
                                                    <img src="Images/new.png" class="sale" height="70" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a><span class=" item_price">4000 LE</span></h4>
                                        </div>
                                        <!--/.product_bottom-->
                                    </div>
                                    <!--/.product-main-->
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.product-one-->


                            <!--Second Product-->
                            <div class="col-md-3 product-left ">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab5.jpeg" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>Hp Laptop</h3>
                                        </div>
                                        <p>Model 2014</p>
                                        <h4>
                                            <a>
                                                <img src="Images/new.png" class="sale" height="70" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">5000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Third Product -->
                            <div class="col-md-3 product-left ">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab6.png" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3 class="pro">Apple Laptop</h3>
                                        <p class="row">Model 2015</p>
                                        <h4>
                                            <a>
                                                <img src="Images/new.png" class="sale" height="70" /><img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">10000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->

                            <!--Fourth Product-->
                            <div class="col-md-3 product-left ">
                                <div class="product-main simpleCart_shelfItem">
                                    <a class="mask">
                                        <img class="img-responsive zoom-img" src="images/images/lab7.jpg" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="row">
                                            <h3>Toshiba Laptop</h3>
                                        </div>
                                        <p>Model 2010</p>
                                        <h4>
                                            <a>
                                                <img src="Images/new.png" class="sale" height="70" /> <img src="images/images/cart-2.png" alt="" class="cart-img"></a> <span class=" item_price">7000 LE</span></h4>
                                    </div>
                                    <!--/.product_bottom-->
                                </div>
                                <!--/.product-main-->
                            </div>
                            <!--/.col-->
                                   <?php
                            //Now I will Get Data from DB when Device is most popular
                            $stmt = $con->prepare('select * from uploaditems');
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                            foreach($rows as $row)
                            {
                            if($row['status']==1)
                            {
                            echo '<div class="col-md-3 product-left ">';
                            echo '<div class="product-main simpleCart_shelfItem">';
                            echo '<a class="mask">';
                            echo "<img class='img-responsive zoom-img' src='../Admin/Layout/images/".$row['image']."' alt='' /></a>";
                             echo '<div class="product-bottom">';
                            echo '<div class="row">';
                            echo  "<h3>".$row['Name']."</h3>";
                            echo '</div>';
                            echo '<p>'.$row['Model'].'</p>';
                            echo '<h4><a>';
                            echo '<img src="Images/new.png" class="sale" height="70" />';           
                            echo '<img src="images/images/cart-2.png" alt="" class="cart-img">';
                            echo '</a> <span class=" item_price">'.$row['Price'].'</span></h4>';
                            echo "</div>"; 
                            echo "</div>";
                            echo "</div>";
                            }
                            }
                            ?>
                        </div>
                        <!--/.product-top-->
                    </div>
                    <!--/.col-md-10>

                    <!--RIGHT ARROW -->
                    <div class="col-md-1 product-left">
                        <a class="btn btn-default btn-lg arr" aria-label="Right Align">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.container-->
            </div>
            <!--/.product-->


            <!--=================================== SERVICES ================================== -->


            <h1 class="section">Services</h1>
            <hr class="featurette-divider">


            <div class="row">
                <!--First row-->

                <!-- Save Time -->
                <div class="col-md-6">
                    <!--First col in First row-->

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h3 class="featurette-heading">Save Time</h3>
                            <p class="lead">
                                Do you have the specific list that you want to buy? With just a couple of clicks of the mouse, you can purchase your shopping orders and instantly move to other important things, which can save time.
                            </p>
                        </div>
                        <div class="col-md-5">
                            <img src="Images/Features/save_time.jpg" class="featurette-image img-responsive center-block" width="200" height="200">
                        </div>
                    </div>
                </div>


                <!-- Save Energy -->
                <div class="col-md-6">
                    <!--Second col in First row-->

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h3 class="featurette-heading">Save Energy</h3>
                            <p class="lead">
                                Admit it, it is tiresome to shop from one location and transfer to another location. What is worse is that there are no available stocks for the merchandise you want to buy. In online shopping, you do not need to waste your precious energy when buying.
                            </p>
                        </div>
                        <div class="col-md-5">
                            <img src="Images/Features/energy.jpg" class="featurette-image img-responsive center-block" width="200" height="200">
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
            <!--end of first row-->

            <div class="row">
                <!--SECOND ROW-->

                <!-- Comparison of Prices -->
                <div class="col-md-6">
                    <!--First col in second row-->

                    <hr class="featurette-divider">
                    <div class="row featurette">
                        <div class="col-md-7">
                            <h3 class="featurette-heading">Comparison of Prices</h3>
                            <p class="lead">
                                The advanced innovation of search engine allows you to easily check prices and compare with just a few clicks. It is very straightforward to conduct price comparisons from one item to another.

                            </p>
                        </div>
                        <div class="col-md-5">
                            <img src="Images/Features/Price-Comaprison.jpg" class="featurette-image img-responsive center-block" width="200" height="200">
                        </div>
                    </div>
                </div>
                <!--/.col-->

                <hr class="featurette-divider">

                <!-- Easy to Search -->

                <div class="col-md-6">
                    <!--Second Col in Second Row-->

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h3 class="featurette-heading">Easy to Search Merchandise You Want to Buy</h3>
                            <p class="lead">
                                You are able to look for specific merchandise that includes model number, style, size, and color that you want to purchase. In addition, it is easy to determine whether the products are available or out of stock.
                            </p>
                        </div>
                        <div class="col-md-5">
                            <img src="Images/Register-Your-Business.png" class="featurette-image img-responsive center-block" width="200" height="200">
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--end of second row-->

            <hr class="featurette-divider">
            <!--End of SERVICES -->

        </div>
        <!--/.container marketing-->

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>BUY FORM</h2>
                </div>
                <div class="modal-body">

                    <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                        <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" />
                            <input name="_method" type="hidden" value="PUT" />
                            <input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'>Expiration</label>
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'> </label>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12'>
                                <div class='text-center total'>
                                    Total:
                                    <span class='amount'>$300</span>
                                </div>
                            </div>
                        </div>

                        <button class=' btn btn-primary submit-button' type='submit'>Pay >></button>

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
                <div class="modal-header">

                </div>
            </div>
            <!--/.modal-content-->
        </div>
        <!--/.modal-->


        <!-- ==================================FOOTER==============================-->
        <!--footer>

        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; SWE project Team, &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>

    </footer>
    <!--/.footer-->
        <!--===========================footer start=================================-->
        <div id="footer">
            <div class="wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="title">ABOUT US</h2>
                            <div class="">
                                <blockquote>
                                    <h1>Welcome to Technoshop</h1>
                                    <ul>
                                        <li>the Middle East’s online marketplace. We connect people and products – opening up a world of possibility.we give you access to everything you need and want. Our range is unparalleled, and our prices unbeatable. This is Technoshop – the power is in your hands.</li>
                                    </ul>
                                </blockquote>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <h2 class="title">SPONSERS</h2>


                            <img src="Images/logos_brands.jpg" class="img-responsive" />


                        </div>
                        <div class="col-md-3">
                            <h2 class="title">Contact Us</h2>
                            <form action="#" method="post">
                                <input class="span3" type="text" name="name" id="name" value="Name" onFocus="if (this.value == 'Name') this.value = '';" onBlur="if (this.value == '') this.value = 'Name';" />
                                <input class="span3" type="text" name="email" id="email" value="Email" onFocus="if (this.value == 'Email') this.value = '';" onBlur="if (this.value == '') this.value = 'Email';" />
                                <textarea name="message" id="message" class="span3" onFocus="if (this.value == 'Message') this.value = '';" onBlur="if (this.value == '') this.value = 'Message';">Message</textarea>
                                <div class="clear"></div>
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
                        <div class="col-md-3">
                            <h2 class="title">Get in touch!</h2>
                            <div class="foot">
                                <ul class="fr">
                                    <li class="fa fa-facebook">
                                        <a href="https://www.facebook.com"> <img src="Images/Social/facebook.png" height="50" width="50" /> </a>
                                    </li>
                                    <li class="fa fa-Twitter">
                                        <a href="https://www.Twitter.com"> <img src="Images/Social/twitter.png" height="50" width="50" /></a>
                                    </li>
                                    <li class="fa fa-Instagram">
                                        <a href="https://www.instagram.com/"> <img src="Images/Social/instagram.png" height="50" width="50" /> </a>
                                    </li>
                                </ul>

                            </div>
                            <!--/.foot-->
                        </div>
                        <!--/.span3-->
                    </div>
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
