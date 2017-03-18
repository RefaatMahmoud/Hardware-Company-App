<?php
    $dsn = "mysql:host=localhost;dbname=WorkShop"; //Data Source Name 'Not Make space'
    $user = "root";
    $pass ='';
    //UTF-8
    $option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    //
    try{
       $con = new PDO($dsn,$user,$pass,$option);
       $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
       // echo "Connect sucessfully ..";
    }
    catch(PDOException $e)
    {
        echo "is Faild" . $e->getMessage();
    }
?>