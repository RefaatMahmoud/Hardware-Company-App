<?php

ob_start();
include "init.php";
if(isset($_SESSION['username']))
{
?>
<div class="container">
  <h1 class="text-center">Add New Item</h1>
  <form class="form-horizontal" role="form" action="?do=insert" method="POST">
    <div class="form-group">
        <input type="hidden" name="userid">
      <label class="control-label col-sm-2 col-md-3">ItemName:</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="itemname"
               placeholder="item name" autocomplete="off" required="required">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="description">Description:</label>
      <div class="col-sm-10 col-md-6">
        <input type="password" class="password form-control" name="description" placeholder="write description" autocomplete="new-password" required="required">
        <i class="show-pass fa fa-eye fa-2x"></i>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="price">Price:</label>
      <div class="col-sm-10 col-md-6">
        <input type="email" class="form-control" name="price" placeholder="enter price" required="required">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2 col-md-3" for="adddate">Add_Date:</label>
      <div class="col-sm-10 col-md-6">          
        <input type="text" class="form-control" name="adddate" placeholder="add date" required="required">
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
      <div class="col-sm-offset-2 col-sm-10 col-md-8">
        <button type="submit" class="btn btn-primary" id="myBtn">save</button>
      </div>
    </div>
  </form>
</div>   
<?php }?>





     include $tpl . "footer.php";
     ob_end_flush();

    ?>

        
