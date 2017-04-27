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
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    
    <link href="Css/products.css" rel="stylesheet" />
    <link href="Css/index.css" rel="stylesheet" />
    <!-- Scripting Files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/jquery-3.1.1.min.js"></script>
    <script src="JS/jquery.easing.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
     <script src="JS/products.js"></script>
<style>
.aaa
    {
        background-color: green;
        color: white
    }
</style>
</head>
    <body>

    
    
    
    <div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
  <table class="table table-striped">
    <thead class="aaa">
        
        <th>Name</th>
        <th>E-mail</th>
        <th>Message</th>
            
    </thead>
      <tbody>
          <tr>
          <?php
                            //Now I will Get Data from DB when Device is most popular
                            $stmt = $con->prepare('select * from contacts');
                            $stmt->execute();
                            $rows = $stmt->fetchAll();
                            
                            foreach($rows as $row)
                            {
                            echo"<tr>";
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

        </div>

</body>
</html>
<?php

include $tpl . "footer.php";
ob_end_flush();
?>