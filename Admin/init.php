<?php
    include "connect.php";
 //Routes
    $tpl = "Include/Templetes/";
    $lan = "Include/Languages/";
    $fun = "Include/Function/";
    $css = "Layout/css/";
    $js =  "Layout/JS/";
 //Important Files arrangemnt is important
    include $fun . "function.php";
    include $tpl . "header.php";
//Languages
    include $lan . "english.php";    
    if(!isset($nonavbar))
    {
        include $tpl . "navbar.php";
    }
?>
