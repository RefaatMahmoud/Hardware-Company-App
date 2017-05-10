<?php
ob_start();
session_start(); //Resume Session
$title = 'Items';    
    if(isset($_SESSION['username']))
    {
     include "init.php";   
    //check value that coming from URL
        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
        /*
        =================================================
        ================= Manage Code ===================
        =================================================
        */
        if($do == "manage")
        {
            //join to get category name && UserName
            //should write this statment in Structure of Items Table to make join
            $stmt=$con->prepare("SELECT 
                                items.* , categories.Name AS category_Name , adminusers.UserName 
                                FROM items
                                INNER JOIN categories ON categories.ID = items.Cat_ID 
                                INNER JOIN adminusers ON adminusers.UserID = items.Member_ID");
            $stmt->execute();
            //get all data from many record
            $rows = $stmt->fetchAll();
    ?>
    <h1 class="text-center">Manage Items</h1><br>
        <div class="container">
            <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                    <tr>
                        <th>photo</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Country Made</th>
                        <th>Add Date</th>
                        <th>Category</th>
                        <th>Member</th>
                        <th>Control</th>
                    </tr>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr>";
                        if(!empty($row['image']))
                        {
                            echo "<td>";
                            echo "<img class='imageItem' src='Layout/Images/".$row['image']."' alt='pic'></td>";
                        }
                        else
                        {
                            echo "<td>No Image</td>";   
                        }
                        echo "<td>" .$row['Name']."</td>";
                        echo "<td>" .$row['Description']."</td>";
                        echo "<td>" .$row['Price']."</td>";
                        echo "<td>" .$row['Country_Made']."</td>";
                        echo "<td>" .$row['Add_Date']."</td>";
                        echo "<td>" .$row['category_Name']."</td>";
                        echo "<td>" .$row['UserName']."</td>";
                        echo "<td>";
                        echo "<a href='Items.php?do=edit&Item_Id=".$row['ItemID']."'class='EditBtn btn btn-success'><i class ='fa fa-edit'></i>
                        Edit</a>";
                        echo "<a href='Items.php?do=delete&Item_Id=".$row['ItemID']."' class='btn btn-danger confirm'><i class ='fa fa-close'></i>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
                      <a href='Items.php?do=add' class="btn btn-primary"><li class="AddBtn fa fa-user-plus">Add a new Item</li></a>
        </div> 
        <?php
        }
          /*
        ================================================
        ================== Add Form ====================
        ================================================
        */

        else if($do=='add')
        {
                    ?>
<div class="container">
  <h1 class="text-center">Add New Item</h1>
  <form class="form-horizontal" role="form" action="Items.php?do=insert" method="POST" enctype="multipart/form-data">
             <!--Start Name of Item -->
    <div class="form-group">
        <input type="hidden" name="itemid">
    <label class="control-label col-sm-2 col-md-3">Name</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="name"
               placeholder=" write the Item name" 
               required="required">
        </div>
    </div>
            <!--End Name of Item -->
      
              <!--Start Description of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Description</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="description"
               placeholder=" write the description name" 
               required="required">
        </div>
    </div>
            <!--End Description of Item -->
      
            <!--Start Price of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Price</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="price"
               placeholder=" write the price value" 
               required="required">
        </div>
    </div>
            <!--End Price of Item -->
      
                      <!--Start Country_made of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Country_made</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="country_made"
               placeholder=" write the price value" 
               required="required">
        </div>
    </div>
            <!--End Country_made of Item -->
      
       <!--Start Photo of Item -->
            <div class="form-group">
                <label class="control-label col-sm-2 col-md-3">Photo</label>
                <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control" name="file" required="required">
                </div>
            </div>
        <!--End photo of Item -->
      
                      <!--Start Status of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Status</label>
      <div class="col-sm-10 col-md-6">
            <select class="form-control" name='status' required="required">
                <option value="0">......</option>
                <option value="1">used</option>
                <option value="2">New</option>
            </select>
        </div>
    </div>
            <!--End Status of Item -->
      
        <!--Start members of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Members</label>
      <div class="col-sm-10 col-md-6">
            <select class="form-control" name='members' required="required">
                <option value="0">......</option>
                <?php
                    $stmt1 = $con->prepare("select * from adminusers");
                    $stmt1->execute();
                    $users = $stmt1->fetchAll();
                    foreach($users as $user)
                    {
                    echo "<option value = '".$user['UserID']."'>".$user['Username']."</option>";                    
                    }
                ?>
            </select>
        </div>
    </div>
        <!--End members of Item -->
      
        <!--Start categories of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Categories</label>
      <div class="col-sm-10 col-md-6">
            <select class="form-control" name='categories' required="required">
                <option value="0">......</option>
                <?php
                    $stmt2 = $con->prepare("select * from categories");
                    $stmt2->execute();
                    $cats = $stmt2->fetchAll();
                    foreach($cats as $cat)
                    {
                    echo "<option value = '".$cat['ID']."'>".$cat['Name']."</option>";                 
                    }
                ?>
            </select>
        </div>
    </div>
        <!--End categories of Item -->
      

      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 col-md-8">
        <button type="submit" class="btn btn-primary" id="myBtn">save</button>
      </div>
    </div>
  </form>
</div>      
        <?php
        }
        /*
            =============================================
            ============== Edit Form ====================
            =============================================
        */
 else if($do == 'edit')
    {
            //check if value userid is define and is numeric
    $Item_Id = isset($_GET['Item_Id'])&&is_numeric($_GET['Item_Id']) ? intval($_GET['Item_Id']) : 0;
//preparing select Query
    $stmt = $con->prepare("select * From items where ItemID = ? LIMIT 1");
//excute Query in DB
    $stmt->execute(array($Item_Id));
//fetch --> will return result in array
    $row = $stmt->fetch();
//Count the number of rows
    $count = $stmt->rowCount();
//if userid in my DB will appear my form    
    if($count>0)
    {
?>      
<div class="container">
  <h1 class="text-center">Edit Item</h1>
  <form class="form-horizontal" role="form" action="Items.php?do=update" method="POST" enctype="multipart/form-data">
             <!--Start Name of Item -->
    <div class="form-group">
        <input type="hidden" name="itemid" value="<?php echo $_GET['Item_Id']?>">
    <label class="control-label col-sm-2 col-md-3">Name</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="name"
               value="<?php echo $row['Name']?>"
               required="required">
        </div>
    </div>
            <!--End Name of Item -->
      
              <!--Start Description of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Description</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="description"
               value="<?php echo $row['Description']?>" 
               required="required">
        </div>
    </div>
            <!--End Description of Item -->
      
            <!--Start Price of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Price</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="price"
               value="<?php echo $row['Price']?>" 
               required="required">
        </div>
    </div>
            <!--End Price of Item -->
      
                      <!--Start Country_made of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Country_made</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" 
               class="form-control" 
               name="country_made"
               value="<?php echo $row['Country_Made']?>" 
               required="required">
        </div>
    </div>
            <!--End Country_made of Item -->
           
       <!--Start Photo of Item -->
            <div class="form-group">
                <label class="control-label col-sm-2 col-md-3">Photo</label>
                <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control" name="file" required="required">
                </div>
            </div>
        <!--End photo of Item -->
      
        <!--Start Status of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Status</label>
      <div class="col-sm-10 col-md-6">
            <select class="form-control" name='status'>
                <option value="0">......</option>
                <option value="1">used</option>
                <option value="2">New</option>
            </select>
        </div>
    </div>
            <!--End Status of Item -->
      
        <!--Start members of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Members</label>
      <div class="col-sm-10 col-md-6">
            <select class="form-control" name='members'>
                <option value="0">......</option>
                <?php
                    $stmt1 = $con->prepare("select * from adminusers");
                    $stmt1->execute();
                    $users = $stmt1->fetchAll();
                    foreach($users as $user)
                    {
                    echo "<option value = '".$user['UserID']."'>".$user['Username']."</option>";                    
                    }
                ?>
            </select>
        </div>
    </div>
        <!--End members of Item -->
      
        <!--Start categories of Item -->
    <div class="form-group">
    <label class="control-label col-sm-2 col-md-3">Categories</label>
      <div class="col-sm-10 col-md-6">
            <select class="form-control" name='categories'>
                <option value="0">......</option>
                <?php
                    $stmt2 = $con->prepare("select * from categories");
                    $stmt2->execute();
                    $cats = $stmt2->fetchAll();
                    foreach($cats as $cat)
                    {
                    echo "<option value = '".$cat['ID']."'>".$cat['Name']."</option>";                 
                    }
                ?>
            </select>
        </div>
    </div>
        <!--End categories of Item -->
      

      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 col-md-8">
        <button type="submit" class="btn btn-primary" id="myBtn">Update</button>
      </div>
    </div>
  </form>
</div>
<?php
}
//if not there this user id show Error Message
//    else
//        {
//            RedirectFunc("Not Found .. ",3);
//        }
            
        }
        /*
            =============================================
            ========Update Code from $do=edit ===========
            =============================================
        */
        else if($do == "update")
        {
echo "<h2 class='text-center'>Update Item</h2>";
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $country_made = $_POST['country_made'];
    $status = $_POST['status'];
    $members = $_POST['members'];
    $categories = $_POST['categories'];
    $Item_Id = $_POST['itemid'];
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
    //Validation in my form
    $formError = array();
    echo "<div class='container'>";
    echo "<div class='row text-center'>";
    if(is_numeric($name))
    {
        $formError[] = "name can't be a start with number";
    }
    if(is_numeric($country_made))
    {
        $formError[] = "country_made can't be a start with number";
    }
    if(empty($user))
    {
        $formError[] = "You can't make name is <strong> Empty </strong>";
    }
    if(empty($price))
    {
        $formError[] = "You can't make price is <strong> Empty </strong>";
    }
    if($status == 0)
    {
        $formError[] = "You  must choose the  <strong> Category </strong>";
    }
    if(empty($country_made))
    {
        $formError[] = "You can't make country made is <strong> Empty </strong>";
    }
    if(strlen($name) < 2 )
    {
        $formError[] = "can't make name from two characters only";
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
     $stmt = $con->prepare("Update items SET Name = ? ,image = ? , Price = ? , Description = ?,
                            Country_Made = ? , Status = ? , Cat_ID = ? , Member_ID = ? WHERE ItemID = ?");
    //excute Data
    $stmt->execute(array($name,$avater,$price,$description,$country_made,$status,$categories,$members,$Item_Id));
    //Count the number of rows
    $count = $stmt->rowCount();
    if($count>0)
    {
    echo "<div class='container'>";
    echo "<div class='alert alert-success text-center'>" .'<h3> Update'. $count .' Record </h3></div>';
    echo "</div>";
    header("REFRESH:3 ; URL=Items.php?do=edit&Item_Id=$Item_Id");
    }
           else
            {
                echo "<div class='container'>";
                echo "<div class='alert alert-warning text-center'>" .'<h3>You Not Change It</h3</div>';
                echo "</div>";
            }   
    }    
}
        else
        {
            RedirectFunc("Can't go to this page Directly",5);
        }
            
        }
        /*
            ============================================
            ========== Insert code From $do=add ========
            ============================================
        */
        else if($do == "insert")
        {
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                                //collect Data By Post
    echo "<h2 class='text-center'>Insert Item</h2>";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $country_made = $_POST['country_made'];
    $status = $_POST['status'];
    $members = $_POST['members'];
    $categories = $_POST['categories'];
    $avater = $_FILES['file'];
    $avaterName = $_FILES['file']['name'];
    $avaterType = $_FILES['file']['type'];
    $avaterTempName = $_FILES['file']['tmp_name'];
    $avaterSize = $_FILES['file']['size'];
     //Avaliable Extention 
    $allowExtensions = array('jpeg','jpg','gif','png');
    //Now I want to get Extention of photo
    $imageExten = strtolower(end(explode('.',$avaterName)));
    
    //Validation in my form
    $formError = array();
    echo "<div class='container'>";
    echo "<div class='row text-center'>";
     if(is_numeric($name) || is_numeric($name[0]))
       {
           $formError [] = "username can't start with number ";
       }
     if(!is_numeric($price))
     {
         $formError [] = "Price should Be a number";
     }
    if(is_numeric($country_made) || is_numeric($name[0]))
    {
        $formError[] = "country_made can't be a start with number";
    }
    if(empty($user))
    {
        $formError[] = "You can't make name is <strong> Empty </strong>";
    }
    if(empty($price))
    {
        $formError[] = "You can't make price is <strong> Empty </strong>";
    }
    if($status == 0)
    {
        $formError[] = "You  must choose the  <strong> Category </strong>";
    }
    if(empty($country_made))
    {
        $formError[] = "You can't make country made is <strong> Empty </strong>";
    }
    if(strlen($name) < 2 )
    {
        $formError[] = "can't make name from two characters only";
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
        /*
        //I can use this way to Insert
     $stmt = $con->prepare("Insert into users (Username,Email,Fullname,
                          Password) values(?,?,?,?)");
    //excute Data
    $stmt->execute(array($user,$email,$fullname,sha1($pass)));    
        */
    //Now I want to upload photo in images folder && prevent Duplicate the same name
    $avater = rand(0,100000000) . '_' .$avaterName ; 
    
    move_uploaded_file($avaterTempName ,'Layout\Images\\' . $avater);
        
       $stmt = $con->prepare("Insert into items (Name,image,Description,Price,
                          Country_Made ,Status ,Add_Date , Cat_ID , Member_ID) values(:zname,:zimg , :zdescription ,:zprice ,:zcountry_made,:zstatus,now(),:zcat,:zmember)");  
    
    //excute Data
    $stmt->execute(array(
        'zname' => $name ,
        'zimg' => $avater,
        'zdescription' => $description,
        'zprice' => $price ,
        'zcountry_made'=>$country_made,
        'zstatus' => $status,
        'zcat' =>$categories,
        'zmember'=>$members
    ));    
    
        
    //Count the number of rows
    
    echo "<div class='container'>";
    echo "<div class='alert alert-success text-center'>" .'<h3>1 Record inserted </h3></div>';
    echo "</div>";
        header("REFRESH:3 ; URL=items.php?do=add");   
     }
    
    else
        {
        echo "<div class='container'>";
        echo "<div class='alert alert-warning text-center'>" .'<h3>You Not Insert any thing</h3</div>';
        echo "</div>";
        header("REFRESH:5 ; URL=items.php?do=add");
        }
                
    }
      else
    {
        $x = "You cant' go to this page Directly";
        RedirectFunc($x,7);
    }   
    }


        
        /*
            ============================================
            ============Delete code ====================
            ============================================
        */
        else if($do='delete')
        {
            //check if value userid is define and is numeric
      $Item_Id = isset($_GET['Item_Id'])&&is_numeric($_GET['Item_Id']) ? intval($_GET['Item_Id']) : 0;
//preparing select Query
    $stmt = $con->prepare("select * From items where ItemID = ? LIMIT 1");
//excute Query in DB
    $stmt->execute(array($Item_Id));
//Count the number of rows
    $count = $stmt->rowCount();
//if userid in my DB will appear my form    
    if($count>0)
    {
        //this binding method to prevent Sql Injunction
        $stmt = $con->prepare('DELETE FROM items WHERE ItemID = :zid');
        //binding method
        $stmt->bindParam('zid',$Item_Id);
        $stmt->execute();  
        echo "<div class='container'>";
        echo "<div class='alert alert-success text-center'>" .'<h3>1 Record Deleted </h3>  </div>';
        echo "</div>";
        }
    else
    {
        $x = "This account is not Exit";
        RedirectFunc($x,3);
    }

        }
}
  else
    {
        // echo "You Cant Go to this page directly";
        header('Location:index.php');
        exit();
    }
include $tpl . "footer.php";
ob_end_flush();
?>
