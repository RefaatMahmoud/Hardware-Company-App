<?php
session_start();
    $nonavbar = " ";
    $title = "Admin.php";
    include "init.php";
//Get Data From Form
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //collect Data By Post
    $user = $_POST['username'];
    $pass = $_POST['password'];
    //make password more secure
    $Hashpass = sha1($pass);
    //Get Data By prepare statment
    $stmt = $con->prepare("select UserID , Username,Password 
                           From adminusers 
                           where Username = ? AND 
                           Password = ? 
                           LIMIT 1");
    //excute Data
    $stmt->execute(array($user,$Hashpass));
    //fetch --> will return result in array
    $row = $stmt->fetch();
    //Count the nuumber of rows
    $count = $stmt->rowCount();
    if($count>0)
    {
        $_SESSION['username'] = $user ; //Record session username
        $_SESSION['ID'] = $row['UserID'];//Record session ID
        //Will Go To dashboard
        header("Location: dashboard.php");
        exit();
    }
}
else
{
    echo "";
}
?>
<!--Login Form-->

<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <fieldset>
    <legend><span>Lo</span>gin</legend>
    <h2 class="text-center">Admin</h2>
    <input type="text" class="form-control input-lg" placeholder="username" autocomplete="off" name="username">
    <input type="password" class="form-control input-lg" placeholder="password" autocomplete="new-password" name="password">
    <input type="submit" class="submit btn btn-primary input-lg btn-block" value="login">
    </fieldset>
</form>

<?php
include $tpl . "footer.php";
?>