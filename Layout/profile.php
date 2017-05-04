<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
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

</head>
    <body>
        hello <?php
          echo  $_SESSION['user'];
        ?>
    </body>
</html>