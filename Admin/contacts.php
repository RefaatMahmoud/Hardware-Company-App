<!DOCTYPE html>

<?php
/*
ob_start() to deal with hidden characters  which are senting with Url 
may appear error in header
*/
    ob_start();
    session_start(); //Resume Session
    $title = 'Dashboard';
    if(isset($_SESSION['username']))
    {
        include "init.php";
    }
?>


<html>
    <?php
    include "connect.php";
    ?>
    <head>
    <!-- Meta Files -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Style Files -->
    
<style>
    aaa {
    background-color: whitesmoke;
    font-style: italic;
    border-bottom-color: aqua;
    font-family: sans-serif;
    font-size: 15px;
}
    table th {
    text-align: center;
}
    thead{
        font-size: 30px;
        background-color: black;
        color:aliceblue;
        
    }
    table {
    border-spacing: 0;
    border-collapse: collapse;
}
    
   
</style>
</head>
    <body>

    
    
    
        <div class="table-responsive">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            
  <table class=" table  table-bordered table table-hover">
  
    <thead >
      
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Message</th>
           
    </thead>
       
      <tbody class="aaa">
         <tr> 
          <?php
                            //Now I will Get Data from DB when Device is most popular
                            $stmt = $con->prepare('select * from contacts');
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                            
                            foreach($rows as $row)
                            {   
                            echo"<tr>";
                            echo"<th>".$row['id']."</th>";    
                            echo"<th>".$row['name']."</th>";
                            echo"<th>".$row['email']."</th>";
                            echo"<th>".$row['message']."</th>";
                            echo"</tr>";
                            }
                            
                            ?>
     
      </tr>
    </tbody>
  </table>
        
        </div>
            </div>
</div>
    </div>

       

</body>
</html>
<?php

include $tpl . "footer.php";
ob_end_flush();
?>
