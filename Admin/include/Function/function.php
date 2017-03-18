<?php
/*
(1)->This function to get title in Every page in my site
*/
/*  Strart getTitle()  */
function getTitle()
{
global $title;
if(isset($title))
{
    echo $title ;
}
else
{
    echo "default";
}
}
/*  End getTitle()  */
/*Strart Redirect function when appear error*/
function RedirectFunc($errormsg , $seconds =3)
{
    echo "<div class='container'>";
    echo "<div class='alert alert-danger'>".$errormsg."</div>";
    echo "<div class='alert alert-info'>You Will Redirect to Homepage after $seconds</div>";
    echo "</div>";
    header("REFRESH:$seconds;url=index.php");
    exit();
}
/*End Redirect function when appear error*/


/*Start function CheckItem*/
function CheckItem($select , $from , $value)
{
    global $con;
    $stmt = $con->prepare("SELECT $select From $from where $select = ? ");
    $stmt->execute(array($value));
    $count = $stmt->rowCount();
    return $count;
}
/*End function CheckItem*/


/* Start function CountItems*/
function CountItems($item,$table)
{
    global $con;
    $stmt = $con->prepare("Select count($item) from $table");
    $stmt->execute();
    return $stmt->fetchColumn();
}
/* End function CountItems*/

/*start get leatest values in any table
** $select -->select your row_name
** $table --> table_name
** $order -->your coulum
** $limit --> your total by default 5
*/
function getLeatest ($select , $table , $order , $limit = 5)
{
    global $con;
    $stmt = $con->prepare("select $select from $table order by $order Desc limit $limit");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    //will return as array
    return $rows;
}
/*start get leatest values in any table*/
?>