<?php
//check if value userid is define and is numeric
$userid = isset($_GET['userid'])&&is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
//preparing select Query
$stmt = $con->prepare("select * From categories where ID = ? LIMIT 1");
//excute Query in DB
$stmt->execute(array($userid));//fetch --> will return result in array
$row = $stmt->fetch();
//Count the number of rows
$count = $stmt->rowCount();
//if userid in my DB will appear my form
if($count>0)
{
?>
<div class="container">
  <h1 class="text-center">Edit Category</h1>
  <form class="form-horizontal" role="form" action="?do=update" method="POST">
    <div class="form-group">
        <input type="hidden" name="userid" value="<?php echo $userid?>">
                    <!--Start Name of category -->
      <label class="control-label col-sm-2 col-md-3">Name</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="name"
               placeholder="<?php echo $row['Name'] ; ?>" autocomplete="off" required="required">
        </div>
    </div>
                    <!--End Name of category -->
                    
                    <!--Start Description of category -->
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3">Description</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="description" placeholder="<?php echo $row['Description']?>" autocomplete="off" required="required">
      </div>
    </div>
                    <!--End Description of category -->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10 col-md-8">
        <button type="submit" class="btn btn-primary" id="myBtn">save</button>
      </div>
    </div>
  </form>
    <?php
}
else{
    echo "Error";
}
?>


