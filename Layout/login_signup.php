<?php
    session_start();
    $nonavbar = " ";
    $title = "User Account";
    include('../Admin/init.php');
    if(isset($_SESSION['user'])){
        header('Location:home.php');
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){ 
       if(isset($_POST['login'])){
    //collect Data By Post
            $user = $_POST['username'];
            $pass = $_POST['password'];
            //make password more secure
            $Hashpass = sha1($pass);
            //Get Data By prepare statment
            $stmt = $con->prepare("select id , name,Password 
                                   From useraccount 
                                   where name = ? AND 
                                   Password = ? 
                                   LIMIT 1");
            //excute Data
            $stmt->execute(array($user,$Hashpass));
            //fetch --> will return result in array
             //Count the nuumber of rows
            $count = $stmt->rowCount();
            if($count>0)
            {
                $_SESSION['user'] = $user ; //Record session username
                header('Location:home.php');
                exit();
            }else{
                echo "<div class='container'>";
                echo "<div class='alert alert-danger text-center'>" . '<h3>You can not Login by this UserName and Password<br> please Enter correct Data </h3></div>';
                echo "</div>";
            }
        }
        
       else{
    $formErrors = array();
    if(isset($_POST['UserName'])){
        $filteredUser = filter_var($_POST['UserName'],FILTER_SANITIZE_STRING);
        if(strlen($filteredUser)<4){
            $formErrors[]= "Username Must Be Larger Than 4 Characters"; 
        }
        if(is_numeric($filteredUser)){
            $formErrors[]= "Username Can't be a Numeric!";
        }
        for($i=0;$i<strlen($filteredUser);$i++){
        if(is_numeric(substr($filteredUser,0,1))){
            $formErrors[]="Username can't start by numbers";
            }
        }   
    }
    if(isset($_POST['Password1'])&& isset($_POST['Password2'])){
        if(empty($_POST['Password1'])){
            $formErrors[] = "Sorry Password Can't be Empty";
        }
        $pass1 = sha1($_POST['Password1']);
        $pass2 = sha1($_POST['Password2']);
        if($pass1!==$pass2){
            $formErrors[] = "Sorry Password is Not match"; 
        }
    }
    if(isset($_POST['Email'])){
        $filterEmail = filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL);
        if(filter_var($filterEmail,FILTER_VALIDATE_EMAIL)!= true){
            $formErrors[] = 'This Email is not Valid';
        }
    }
    if(isset($_POST['Phone'])){
        $phone = $_POST['Phone'];
    }
    if(empty($formErrors)){
        $stmt = $con->prepare("insert into useraccount (name,password,email,phone) values(:sname,:spassword,:semail,:sphone)");
        $stmt->execute(array(
            'sname'=>$filteredUser,
            'spassword'=>$pass1,
            'semail'=>$filterEmail,
            'sphone'=>$phone));
            $_SESSION['user'] = $filteredUser ; //Record session username
                header('Location:home.php');
                exit();
    }else{
                echo "<div class='container'>";
                echo "<div class='alert alert-danger text-center'>" . '<h3>You can not sign up<br> please Enter correct Data </h3></div>';
                echo "</div>";
    }
    }
    

}
 else
        {
            echo "";
        }   
?>

    <html>

    <head>
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/font-awesome.min.css">
        <link href="CSS/index.css" rel="stylesheet" />
        <link rel="stylesheet" href="CSS/backend.css">
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

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
        <div class="Login_Signup container">
            <div class="loginPage">
                <h1 class="text-center">
                    <span class="Login selected1">Login</span> |
                    <span class="x">Signup</span>
                </h1>
            </div>
            <!--Start Login Form-->
            <form class="container login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name='login'>
                <div class="col-sm-10 col-md-12">
                    <input type="text" class="form-control" name="username" placeholder="write Your username" autocomplete="off" required="required">
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="password" class="password form-control" name="password" placeholder="write complex password" autocomplete="new-password" required="required">
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                </div>
            </form>
            <!-- End Login Form -->
            <!-- Start signup Form-->
            <form class="container signup" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name="signup">

                <div class="col-sm-10 col-md-12">
                    <input type="text" class="form-control" name="UserName" placeholder="write Your username" autocomplete="off" pattern=".{4,}" title="UserName Must Be larger Than 4 chars" required="required" />
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="password" class="password form-control" name="Password1" placeholder="write complex password" autocomplete="new-password" required="required" />
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="password" class="password form-control" name="Password2" placeholder="write password Again" autocomplete="new-password" required="required">
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="email" class="form-control" name="Email" placeholder="write Valid Email" autocomplete="on" required="required">
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="number" class="form-control" name="Phone" placeholder="Your Mobile Phone" autocomplete="on" required="required">
                </div>

                <div class="col-sm-10 col-md-12">
                    <input type="submit" class="btn btn-success btn-block" name="signup" value="Signup">
                </div>
            </form>
        </div>
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
            <script src="JS/jquery-3.1.1.min.js"></script>
            <script src="JS/bootstrap.min.js"></script>
            <script src="JS/backend.js"></script>
            <!--=========================== footer end==========================-->
    </body>

    </html>
