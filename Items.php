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
                        
                        echo "<td>";
                        echo "<a href='items.php?do=edit&ItemID=".$row['ItemID']."'class='EditBtn btn btn-success'><i class ='fa fa-edit'></i>
                        Edit</a>";
                      
                        echo "<a href='items.php?do=delete&ItemID=".$row['ItemID']."' class='btn btn-danger confirm'><i class ='fa fa-close'></i>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        
                  
                    }
                    ?>
                </table>
            </div>

                      <a href='items.php?do=add' class="btn btn-primary"><li class="AddBtn fa fa-user-plus">Add a new Item</li></a>     
        </div> 
         <?php


        }
        /*
        ================================================
        ================== Add Form =================
        ================================================
        */
    else if($do == "add")
    {
      ?>    


<div class="container">
  <h1 class="text-center">Add New Item</h1>
  <form class="form-horizontal" role="form" action="?do=insert" method="POST">
    <div class="form-group">

      <label class="control-label col-sm-2 col-md-3">ItemName:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="itemname"
               placeholder="item name" autocomplete="off" required="required">
        </div>
    </div>
    
      <div class="form-group">

      <label class="control-label col-sm-2 col-md-3" for="price">Price:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="price" placeholder="enter price" required="required">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="adddate">Add_Date:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="date" class="form-control" name="adddate" placeholder="add date" required="required">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="countrymade">Country_Made:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="countrymade" placeholder="country made in" required="required">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="status">Status:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="status" placeholder="item status" required="required">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="catid">Cat_ID:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="catid" placeholder="cat_id as forign key" required="required">
      </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="memberid">Member_ID:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="memberid" placeholder="member_id as forign key" required="required">

      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="description">Description:</label>
      <div class="col-sm-10 col-md-6">
          <textarea class="password form-control" name="description" placeholder="write description" autocomplete="new-password" required="required"></textarea>


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
        $formError[] = "You can't make Item Name  <strong> Empty </strong>";
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
    header("REFRESH:2 ; URL=items.php");
    }
           else
            {
                echo "<div class='container'>";
                echo "<div class='alert alert-warning text-center'>" .'<h3>Nothing Changed </h3></div>';
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

            ============== Insert code From $do=insert =======================
            ===============================================================
        */
  else if($do == 'insert')
    {


          if($_SERVER['REQUEST_METHOD'] == "POST")
              {
              //collect Data By Post
              $itemName = $_POST['itemname'];
              $description = $_POST['description'];
              $price = $_POST['price'];
              $date = $_POST['adddate'];
              $countryMade = $_POST['countrymade'];
              $status=$_POST['status'];
              $catId=$_POST['catid'];
              $memberId=$_POST['memberid'];
              

              //Validation in my form
 
              $formError = array();
              echo "<div class='container'>";
              if(empty($itemName)||is_numeric($itemName))
              {
                  $formError[0] = "Item Name can't be empty OR Numeric ";

              }

              if(empty($description)||is_numeric($description))
              {
                  $formError[1] = "description can't be empty OR Numeric ";

              }
              if(empty($price)||!is_numeric($price))
              {
                  $formError[2] = "price can't be empty OR String";

              }
              if(empty($date))
              {
                  $formError[3] = "date can't be empty";

              }
              if(empty($countryMade)||is_numeric($countryMade))
              {
                  $formError[4] = "country Made can't be empty OR Numric ";

              }
              if(empty($status)||is_numeric($itemName))
              {
                  $formError[5] = "status can't be empty OR Numric ";

              }
              if(empty($catId)||!is_numeric($catId))
              {
                  $formError[6] = "catId can't be String";

              }
              if(empty($memberId)||!is_numeric($memberId))
              {
                  $formError[7] = "memberId can't be String";

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

            
                 $stmt = $con->prepare("Insert into items(
                 Name ,
                Description ,
                Price,
                Add_Date ,
                Country_Made ,
                Status,
                Cat_ID ,
                Member_ID) values(?,?,?,?,?,?,?,?)");
              //excute Data
            
              $stmt->execute(array(
                  $itemName ,
                   $description,
                  $price ,
                   $date,
                   $countryMade ,
                   $status,
                  $catId,
                  $memberId
                  ));
             
               
                
              //Count the number of rows
              
              echo "<div class='container'>";
              echo "<div class='alert alert-success text-center'>" .'<h3>1 Record inserted </h3></div>';
              echo "</div>";
                  header("REFRESH:3 ; URL=items.php?do=add");   
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
  <h1 class="text-center">Add New Item</h1>
  <form class="form-horizontal" role="form" action="?do=insert" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3">ItemName:</label>
      <div class="col-sm-10 col-md-6 has-error">
        <input type="text" class="form-control" name="itemname"
               autocomplete="off" required="required">
    <?php
    if(isset($formError[0])) 
        echo "<div class='error_valid alert alert-danger'>".$formError[0]."</div>";
    ?> 
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">Description:</label>
      <div class="col-sm-10 col-md-6 has-error">
        <input type="text" class="password form-control" name="description"  autocomplete="new-password" required="required">
        <i class="show-pass fa fa-eye fa-2x"></i>
    <?php
    if(isset($formError[1]))
        echo "<div class='error_valid alert alert-danger'>".$formError[1]."</div>";
    ?>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="price">Price:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="price"  required="required">

        <?php
                if(isset($formError[2]))
                echo "<div class='error_valid alert alert-danger'>".$formError[2]."</div>";
            ?>
      </div>
    </div>


    <div class="form-group">
          <label class="control-label col-sm-2 col-md-3" for="price">Date:</label>
          <div class="col-sm-10 col-md-6">
            <input type="date" class="form-control" name="adddate"  required="required">

          </div>
        </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="pwd">Country_Made:</label>
      <div class="col-sm-10 col-md-6 has-error">
        <input type="text" class="form-control" name="countrymade" required="required">
    
    <?php
        if(isset($formError[4]))
        echo "<div class='error_valid alert alert-danger'>".$formError[4]."</div>";
    ?>
    
      </div>
      </div>

           <div class="form-group">
                <label class="control-label col-sm-2 col-md-3" for="pwd">Status:</label>
                <div class="col-sm-10 col-md-6 has-error">
                  <input type="text" class="form-control" name="status" required="required">

              <?php
                  if(isset($formError[5]))
                  echo "<div class='error_valid alert alert-danger'>".$formError[5]."</div>";
              ?>
      </div>
      </div>


       <div class="form-group">
            <label class="control-label col-sm-2 col-md-3" for="pwd">Cat_ID:</label>
            <div class="col-sm-10 col-md-6 has-error">
              <input type="text" class="form-control" name="catid" required="required">

          <?php
              if(isset($formError[6]))
              echo "<div class='error_valid alert alert-danger'>".$formError[6]."</div>";
          ?>
       </div>
       </div>


       <div class="form-group">
                   <label class="control-label col-sm-2 col-md-3" for="pwd">Memeber_ID:</label>
                   <div class="col-sm-10 col-md-6 has-error">
                     <input type="text" class="form-control" name="memberid" required="required">

                 <?php
                     if(isset($formError[7]))
                     echo "<div class='error_valid alert alert-danger'>".$formError[7]."</div>";
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
         $Item_ID = isset($_GET['ItemID'])&&is_numeric($_GET['ItemID']) ? intval($_GET['ItemID']) : 0;

         //preparing select Query
         $stmt = $con->prepare("select * From items where ItemID = ? LIMIT 1");
        
         //excute Query in DB
         $stmt->execute(array($Item_ID));
        
         //Count the number of rows
         $count = $stmt->rowCount();
        
        
        //if userid in my DB will appear my form    


    if($count>0)
    {
        //this binding method to prevent Sql Injunction
        $stmt = $con->prepare('DELETE FROM items WHERE ItemID = :zitem');

        
        //binding method
        $stmt->bindParam('zitem',$Item_ID);
        $stmt->execute();  
        

        echo "<div class='container'>";
        echo "<div class='alert alert-success text-center'>" .'<h2>1 Record Deleted </h2>  </div>';
        echo "<div class='alert alert-info text-center'><h3>You will Redirect to Items page After 5 seconds</h3> </div>";
        header('REFRESH:2 ; URL=items.php');
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