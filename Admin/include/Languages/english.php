<?php
function lang($phares)
{
    static $lang = array(
    "Home-Admin"    => "Admin-Area",
    "ADMIN"         => "Adminstrator",
    "Categories"    =>"Categories",
    "ITEMS"        =>"Items ",
    "Statistics"    =>"Statistics ",
    "Members"      =>"Members ",
    "Logs"          =>"Logs"
    );
    return $lang[$phares];
}
?>