<?php
if($do == 'edit')
        {
//check if value userid is define and is numeric
      $Item_ID = isset($_GET['Item_ID'])&&is_numeric($_GET['Item_ID']) ? intval($_GET['Item_ID']) : 0;
//preparing select Query
    $stmt = $con->prepare("select * From items where Item_ID = ? LIMIT 1");
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
}?>