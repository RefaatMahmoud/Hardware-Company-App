<?php
ob_start();
session_start(); //Resume Session
$title = 'Items';    
    if(isset($_SESSION['username']))
    {
     include "init.php";
?>
    <div class="container">
        <h1 class="text-center">Upload New Item in Home Page</h1>
        <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <!--Start Name of Item -->
            <div class="form-group">
                <input type="hidden" name="itemid">
                <label class="control-label col-sm-2 col-md-3">Name</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" class="form-control" name="name" placeholder=" write the Item name" required="required">
                </div>
            </div>
            <!--End Name of Item -->

            <!--Start Description of Item -->
            <div class="form-group">
                <label class="control-label col-sm-2 col-md-3">Model</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" class="form-control" name="model" placeholder=" write the description name" required="required">
                </div>
            </div>
            <!--End Description of Item -->

            <!--Start Price of Item -->
            <div class="form-group">
                <label class="control-label col-sm-2 col-md-3">Price</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" class="form-control" name="price" placeholder=" write the price value" required="required">
                </div>
            </div>
            <!--End Price of Item -->
            
            <!--Start Country_made of Item -->
            <div class="form-group">
                <label class="control-label col-sm-2 col-md-3">Photo</label>
                <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control" name="file" required="required">
                </div>
            </div>
            <!--End Country_made of Item -->
            
               <!--Start Status of Item -->
            <div class="form-group">
                <label class="control-label col-sm-2 col-md-3">Status</label>
                <div class="col-sm-10 col-md-6">
            <select class="form-control" name='status' required="required">
                <option value="0">......</option>
                <option value="1">New</option>
                <option value="2">Most popular</option>
                <option value="3">ON Sale</option>
            </select>
                </div>
            </div>
            <!--End Status of Item -->
            
            <!--End Status of Item -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-md-8">
                    <button type="submit" class="btn btn-primary" id="myBtn">Upload</button>
                </div>
            </div>
        </form>
    </div>
    <?php
        //collect Data from form
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name =  $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $avater = $_FILES['file'];
    $avaterName = $_FILES['file']['name'];
    $avaterType = $_FILES['file']['type'];
    $avaterTempName = $_FILES['file']['tmp_name'];
    $avaterSize = $_FILES['file']['size'];
     //Avaliable Extention 
    $allowExtensions = array('jpeg','jpg','gif','png');
    //Now I want to get Extention of photo
    $imageExten = strtolower(end(explode('.',$avaterName)));
    $formError = array();
    echo "<div class='container'>";
    echo "<div class='row text-center'>";
    if(is_numeric($name))
    {
      $formError[] = "Name can't be a start with number";
    }
      if(empty($status) || $status==0)
     {
         $formError [] = 'cant make status empty';
     }
    
    if(!empty($avaterName )&& !in_array($imageExten,$allowExtensions))
    {
        $formError[] = "This Extension for image not allow";
    }
    if($avaterSize > 4194304)
    {
        //4MB*1024*1024 =  4194304 Byte
        $formError[] = "The size is larger than 4MB";
    }
    foreach($formError as $error)
    {
        echo "<div class='col-lg-offset-3 col-lg-6'>";
        echo "<div class='alert alert-danger'>" . $error . " </div></div>";
    }
    echo "</div>";
    echo "</div>";
        //Get Data By prepare statment
    if(empty($formError))
    {
    //Now I want to upload photo in images folder && prevent Duplicate the same name
    $avater = rand(0,100000000) . '_' .$avaterName ; 
    
    move_uploaded_file($avaterTempName ,'Layout\Images\\' . $avater);
         
    $stmt = $con->prepare("Insert into uploaditems (Name,Model,Price,image,status) values(?,?,?,?,?)");    
    $stmt->execute(array($name,$model,$price,$avater,$status));
    echo "<div class='container'>";
    echo "<div class='alert alert-success text-center'>" .'<h3>1 Record inserted </h3></div>';
    echo "</div>";
//        header("REFRESH:3 ; URL=members.php?do=add");   

    }
}
        else
        {
            echo "";
        }
    }
        
include $tpl . "footer.php";
ob_end_flush();
?>
