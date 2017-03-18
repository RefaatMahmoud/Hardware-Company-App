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
        $title = 'members';
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
            $stmt=$con->prepare("select * from adminusers");
            $stmt->execute();
            //get all data from many record
            $rows = $stmt->fetchAll();
    ?>
    <h1 class="text-center">Manage Members</h1><br>
        <div class="container">
            <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>FullName</th>
                        <th>RegisterDate</th>
                        <th>Control</th>
                    </tr>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" .$row['UserID']."</td>"; //$row[0]
                        echo "<td>" .$row['Username']."</td>";
                        echo "<td>" .$row['Email']."</td>";
                        echo "<td>" .$row['FullName']."</td>";
                        echo "<td>" .$row['Date']."</td>";
                        echo "<td>";
                        echo "<a href='members.php?do=edit&userid=".$row['UserID']."'class='EditBtn btn btn-success'><i class ='fa fa-edit'></i>
                        Edit</a>";
                        if($row['UserID']>1)
                        {
                        echo "<a href='members.php?do=delete&userid=".$row['UserID']."' class='btn btn-danger confirm'><i class ='fa fa-close'></i>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        }
                  
                    }
                    ?>
                </table>
            </div>
                      <a href='members.php?do=add' class="btn btn-primary"><li class="AddBtn fa fa-user-plus">Add a new member</li></a>
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
      $userid = isset($_GET['userid'])&&is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
//preparing select Query
    $stmt = $con->prepare("select * From adminusers where UserID = ? LIMIT 1");
//excute Query in DB
    $stmt->execute(array($userid));
//fetch --> will return result in array
    $row = $stmt->fetch();
//Count the number of rows
    $count = $stmt->rowCount();
//if userid in my DB will appear my form    
    if($count>0)
    {
?>      
<div class="container">
  <h1 class="text-center">Edit Member</h1>
  <form class="form-horizontal" role="form" action="?do=update" method="POST">
    <div class="form-group">
        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
      <label class="control-label col-sm-2 col-md-3">UserName:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="username" value="<?php echo $row['Username'];?>" autocomplete="off" required="required">
        </div>
    </div>
    <div class="form-group">    
      <label class="control-label col-sm-2 col-md-3" for="pwd">Password:</label>
      <div class="col-sm-10 col-md-6">
        <input type="password" class="form-control" name="password" placeholder="password" autocomplete="new-password" required="required">
        </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="email">Email:</label>
      <div class="col-sm-10 col-md-6">
        <input type="email" class="form-control" name="email" value="<?php echo $row['Email'];?>" required="required">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">FullName:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="fullname" value="<?php echo $row['FullName'];?>" required="required">
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
        echo "<h2 class='text-center'>Update Member</h2>";
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    //collect Data By Post
    $user = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $id = $_POST['userid'];
    $pass = $_POST['password'];
    //Validation in my form
    $formError = array();
    echo "<div class='container'>";
    if(is_numeric($user))
    {
        $formError[] = "user name can't be a start with number";
    }
    if(empty($user))
    {
        $formError[] = "You can't make username is <strong> Empty </strong>";
    }
    if(empty($email))
    {
        $formError[] = "You can't make email is <strong> Empty </strong>";
    }
    if(empty($fullname))
    {
        $formError[] = "You can't make fullname is <strong> Empty </strong>";
    }
    if(empty($pass))
    {
        $formError[] = "You can't make password is <strong> Empty </strong>";
    }
    if(strlen($pass) < 6 )
    {
        $formError[] = "Your password is week";
    }
    foreach($formError as $error)
    {
        echo "<div class='alert alert-danger'>" . $error . " </div>";
    }
    echo "</div>";
    //Get Data By prepare statment
    if(empty($formError))
    {
     $stmt = $con->prepare("Update adminusers SET Username = ? , Email = ? , Fullname = ?,Password =? WHERE UserID = ?");
    //excute Data
    $stmt->execute(array($user,$email,$fullname,sha1($pass),$id));
    //Count the number of rows
    $count = $stmt->rowCount();
    if($count>0)
    {
    echo "<div class='container'>";
    echo "<div class='alert alert-success text-center'>" .'<h3> Update'. $count .' Record </h3></div>';
    echo "</div>";
    header("REFRESH:3 ; URL=members.php?do=edit&userid=$id");
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