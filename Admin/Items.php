Skip to content
This repository
Search
Pull requests
Issues
Gist
 @RefaatMahmoud
 Sign out
 Watch 4
  Star 1
 Fork 4 RefaatMahmoud/Lab_Project
 Code  Issues 0  Pull requests 0  Projects 0  Wiki  Pulse  Graphs  Settings
Branch: master Find file Copy pathLab_Project/Admin/Items.php
7f738a8  29 days ago
@HusseinAsous-Git HusseinAsous-Git Items Update(1)
2 contributors @RefaatMahmoud @HusseinAsous-Git
RawBlameHistory     
505 lines (491 sloc)  18.8 KB
<?php
/*
=================== Manage =================
(1) --> Edit
(2) --> Delete
*/
ob_start();
session_start(); //Resume Session
    if(isset($_SESSION['username']))
    {
        $title = 'items';
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
            $stmt=$con->prepare("select * from items");
            $stmt->execute();
            //get all data from many record
            $rows = $stmt->fetchAll();
    ?>
    <h1 class="text-center">Manage Items</h1><br>
        <div class="container">
            <div class="table-responsive">
                <table class=" text-center table table-bordered zeada" > 
                    <tr>
                        <th>#ItemID</th>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Price</th>
                        <th>Add_Date</th>
                        <th>Country_Made</th>
                        <th>Status</th>
                        <th>Cat_ID</th>
                        <th>Member_ID</th>
                        <th>Control</th>
                    </tr>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" .$row['ItemID']."</td>"; //$row[0]
                        echo "<td>" .$row['Name']."</td>";
                        echo "<td>" .$row['Description']."</td>";
                        echo "<td>" .$row['Price']."</td>";
                        echo "<td>" .$row['Add_Date']."</td>";
                        echo "<td>" .$row['Country_Made']."</td>";
                        echo "<td>" .$row['Status']."</td>";
                        echo "<td>" .$row['Cat_ID']."</td>";
                        echo "<td>" .$row['Member_ID']."</td>";
                        echo "<td>";
                        echo "<a href='items.php?do=edit&ItemID=".$row['ItemID']."'class='EditBtn btn btn-success'><i class ='fa fa-edit'></i>
                        Edit</a>";
                        if($row['ItemID']>1)
                        {
                        echo "<a href='itemDelete.php?do=delete&ItemID=".$row['ItemID']."' class='btn btn-danger confirm'><i class ='fa fa-close'></i>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        }
                  
                    }
                    ?>
                </table>
            </div>
                      <a href='itemForm.php' class="btn btn-primary"><li class="AddBtn fa fa-user-plus">Add a new Item</li></a>
        </div> 
        <?php 
        }
          /*
        ================================================
        ================== Add Form =================
        ================================================
        */
        else if($do=='add')
        {
         ?>   
<div class="container">
  <h1 class="text-center">Add New Member</h1>
  <form class="form-horizontal" role="form" action="?do=insert" method="POST">
    <div class="form-group">
        <input type="hidden" name="userid">
      <label class="control-label col-sm-2 col-md-3">UserName:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="username"
               placeholder=" write not start with number username" autocomplete="off" required="required">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">Password:</label>
      <div class="col-sm-10 col-md-6">
        <input type="password" class="password form-control" name="password" placeholder="write strong password here" autocomplete="new-password" required="required">
        <i class="show-pass fa fa-eye fa-2x"></i>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="email">Email:</label>
      <div class="col-sm-10 col-md-6">
        <input type="email" class="form-control" name="email" placeholder="Your email" required="required">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">FullName:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="fullname" placeholder="write your fullname" required="required">
      </div>
      </div>
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
      $Item_ID = isset($_GET['ItemID'])&&is_numeric($_GET['ItemID']) ? intval($_GET['ItemID']) : 0;
//preparing select Query
    $stmt = $con->prepare("select * From items where ItemID = ? LIMIT 1");
//excute Query in DB
    $stmt->execute(array($Item_ID));
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
  <form class="form-horizontal" role="form" action="?do=update" method="POST">
    <div class="form-group">
       
      <label class="control-label col-sm-2 col-md-3">ItemID:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="itemid" value="<?php echo $row['ItemID'];?>" autocomplete="off" required="required">
        </div>
    </div>
    <div class="form-group">    
      <label class="control-label col-sm-2 col-md-3" for="pwd">Item Name</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="itemname" placeholder="item name" autocomplete="new-password" required="required" value="<?php echo $row['Name'];?>">
        </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="description">Description:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="description" value="<?php echo $row['Description'];?>" required="required">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="price">Price:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="price" value="<?php echo $row['Price'];?>" required="required">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="adddate">Add_Date:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="adddate" value="<?php echo $row['Add_Date'];?>" required="required">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="countrymade">Country_Made</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="countrymade" value="<?php echo $row['Country_Made'];?>" required="required">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="Status">Status</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="Status" value="<?php echo $row['Status'];?>" required="required">
      </div>
      </div>
       <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="catid">Cat_ID</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="catid" value="<?php echo $row['Cat_ID'];?>" required="required">
      </div>
      </div>
       <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="memberid">Member_ID</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="memberid" value="<?php echo $row['Member_ID'];?>" required="required">
      </div>
      </div>
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 col-md-8">
        <button type="submit" class="btn btn-primary" id="myBtn">save</button>
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
=============================================================================
========================Update Code from $do=edit ===========================
=============================================================================
*/
    else if($do == "update")
    {
        echo "<h2 class='text-center'>Update Item</h2>";
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    //collect Data By Post
    $itemId = $_POST['itemid'];
    $itemName = $_POST['itemname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $adddate = $_POST['adddate'];
    $countryMade = $_POST['countrymade'];
    $status = $_POST['Status'];
    $catId = $_POST['catid'];
    $MemberId = $_POST['memberid'];
    //Validation in my form
    $formError = array();
    echo "<div class='container'>";
    if(is_numeric($itemName))
    {
        $formError[] = "Item name can't be a start with number";
    }
    if(empty($itemName))
    {
        $formError[] = "You can't make Item Name is <strong> Empty </strong>";
    }
    if(!is_numeric($itemId))
    {
        $formError[] = "Item Id must be  <strong> Numeric </strong>";
    }
    
    
    if(strlen($itemId) > 6 )
    {
        $formError[] = "Item id can't be much more..";
    }
    foreach($formError as $error)
    {
        echo "<div class='alert alert-danger'>" . $error . " </div>";
    }
    echo "</div>";
    //Get Data By prepare statment
    if(empty($formError))
    {
     $stmt = $con->prepare("Update items SET ItemID = ? , Name = ? , Description = ?,Price =?,Add_Date=?,Country_Made=?,
     Status=?,Cat_ID=?,Member_ID=? WHERE ItemID = ?");
    //excute Data
    $stmt->execute(array($itemId,$itemName,$description,$price,$adddate,$countryMade,$status,$catId,$MemberId,$itemId));
    //Count the number of rows
    $count = $stmt->rowCount();
    if($count>0)
    {
    echo "<div class='container'>";
    echo "<div class='alert alert-success text-center'>" .'<h3> Update'. $count .' Record </h3></div>';
    echo "</div>";
    header("REFRESH:3 ; URL=members.php?do=edit&ItemID=$itemId");
    }
           else
            {
                echo "<div class='container'>";
                echo "<div class='alert alert-warning text-center'>" .'<h3>You Not Change It</h3></div>';
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
            ===============================================================
            ============== Insert code From $do=add =======================
            ===============================================================
        */
  else if($do == "insert")
    {
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    //collect Data By Post
    $user = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $id = $_POST['userid'];
    $pass = $_POST['password'];
    $hash = sha1($pass);
    //Validation in my form
    $formError = array();
    echo "<div class='container'>";
    if(is_numeric($user))
    {
        $formError[0] = "username can't be a start with number";
    }
    if(is_numeric($fullname))
    {
        $formError[1] = "Fullname can't be a start with number";
    }
    if(empty($user))
    {
        $formError[2] = "You can't make username is <strong> Empty </strong>";
    }
    if(empty($email))
    {
        $formError[3] = "You can't make email is <strong> Empty </strong>";
    }
    if(empty($fullname))
    {
        $formError[4] = "You can't make fullname is <strong> Empty </strong>";
    }
    if(empty($pass))
    {
        $formError[5] = "You can't make password is <strong> Empty </strong>";
    }
    if(strlen($pass) < 6 )
    {
        $formError[6] = "Your password is week";
    }
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
    //call CheckItem to check username is exit or not
    $check = CheckItem('Username' , 'adminusers' , $user);
    if($check == 1)
    {
        echo "<div class='container'>";
        echo "<div class='alert alert-danger text-center'>" .'<h3>this username is already exit </h3></div>';
        echo "</div>";
        header("REFRESH:3 ; URL=members.php?do=add");   
    }
     else
     {
       $stmt = $con->prepare("Insert into adminusers (Username,Email,FullName,
                          Password ,Date) values(:zuser , :zemail , :zfullname ,:zhash,now())");  
    //excute Data
    $stmt->execute(array(
        'zuser' => $user ,
        'zemail' => $email,
        'zfullname' => $fullname ,
        'zhash' => $hash
    ));    
    
        
    //Count the number of rows
    
    echo "<div class='container'>";
    echo "<div class='alert alert-success text-center'>" .'<h3>1 Record inserted </h3></div>';
    echo "</div>";
        header("REFRESH:3 ; URL=members.php?do=add");   
     }
    }
           else
            {
               /*
               ==========================================
               ===============Error Validations =========
               ==========================================
               */
?>
<div class="container">
  <h1 class="text-center">Add New Member</h1>
  <form class="form-horizontal" role="form" action="?do=insert" method="POST">
    <div class="form-group">
        <input type="hidden" name="userid">
      <label class="control-label col-sm-2 col-md-3">UserName:</label>
      <div class="col-sm-10 col-md-6 has-error">
        <input type="text" class="form-control" name="username"
               placeholder=" write not start with number username" autocomplete="off" required="required">
    <?php
    if(isset($formError[0])) 
        echo "<div class='error_valid alert alert-danger'>".$formError[0]."</div>"; 
    if(isset($formError[3]))
    {
        echo "<div class='error_valid alert alert-danger'>".$formError[2]."</div>"; 
    }   
    ?> 
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">Password:</label>
      <div class="col-sm-10 col-md-6 has-error">
        <input type="password" class="password form-control" name="password" placeholder="write strong password here" autocomplete="new-password" required="required">
        <i class="show-pass fa fa-eye fa-2x"></i>
    <?php
    if(isset($formError[5])) 
        echo "<div class='error_valid alert alert-danger'>".$formError[5]."</div>";
    if(isset($formError[6])) 
        echo "<div class='error_valid alert alert-danger'>".$formError[6]."</div>"; 
    ?>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="email">Email:</label>
      <div class="col-sm-10 col-md-6">
        <input type="email" class="form-control" name="email" placeholder="Your email" required="required">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">FullName:</label>
      <div class="col-sm-10 col-md-6 has-error">
        <input type="text" class="form-control" name="fullname" placeholder="write your fullname" required="required">
    
    <?php
        if(isset($formError[1])) 
        echo "<div class='error_valid alert alert-danger'>".$formError[1]."</div>";
    ?>
    
      </div>
      </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 col-md-8">
        <button type="submit" class="btn btn-primary" id="myBtn">save</button>
      </div>
    </div>
  </form>
</div>   
                <?php
//                foreach($formError as $error)
//                {
//                echo "<div class='alert alert-danger'>" . $error . " </div>";
//                }
            }   
    }
      else
    {
        $x = "You cant' go to this page Directly";
        RedirectFunc($x,7);
    }
}
        /*
            ===============================================================
            ====================== Delete code ============================
            ===============================================================
        */
        else if($do='delete')
        {
//check if value userid is define and is numeric
      $userid = isset($_GET['userid'])&&is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
//preparing select Query
    $stmt = $con->prepare("select * From adminusers where UserID = ? LIMIT 1");
//excute Query in DB
    $stmt->execute(array($userid));
//Count the number of rows
    $count = $stmt->rowCount();
//if userid in my DB will appear my form    
    if($count>0)
    {
        //this binding method to prevent Sql Injunction
        $stmt = $con->prepare('DELETE FROM adminusers WHERE UserID = :zuser');
        //binding method
        $stmt->bindParam('zuser',$userid);
        $stmt->execute();  
        echo "<div class='container'>";
        echo "<div class='alert alert-success text-center'>" .'<h2>1 Record Deleted </h2>  </div>';
        echo "<div class='alert alert-info text-center'><h3>You will Redirect to members page After 5 seconds</h3> </div>";
        header('REFRESH:5 ; URL=members.php');
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
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Security Status Help
