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
    <link rel="stylesheet" href="CSS/backend.css">
</head>

<body>
    <div class="container">
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
</body>
    <script src="JS/jquery-3.1.1.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
<script src="JS/backend.js"></script>

</html>
