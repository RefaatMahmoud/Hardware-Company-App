
    <div class="container">
  <h1 class="text-center" id="To_edit">Add New Category</h1>
  <form class="form-horizontal" role="form" action="category.php?do=insert" method="POST">
      <input type="hidden" name="ID">
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-3">Name</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" name="Name"
               placeholder="Category Name" autocomplete="off" required="required">
          <?php
                    if(isset($formError[0])) {
                        echo "<div class='error_valid alert alert-danger'>".$formError[0]."</div>";}
                    else if(isset($formError[1])) {
                        echo "<div class='error_valid alert alert-danger'>".$formError[1]."</div>";}
                ?>
        </div>
    </div>
    <div class="form-group">

      <label class="control-label col-sm-2 col-md-3">Description</label>
      <div class="col-sm-10 col-md-6">
        <textarea class="form-control" name="description"
               placeholder="The Description" autocomplete="off" required="required"></textarea>
          <?php
          if(isset($formError[2])) {
                        echo "<div class='error_valid alert alert-danger'>".$formError[2]."</div>";}
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
