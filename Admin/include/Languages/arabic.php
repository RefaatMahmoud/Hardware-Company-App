<?php

function lang($phares)
{
    static $lang = array(
//    "MESSAGE" => "مرحبا",
//    "ADMIN" => "صاحب الموقع"
    "Home-Admin"    => "لوحة التحكم",
    "ADMIN"         => "المسؤل عن الموقع",
    "Categories"    =>"الاقسام",
    "ITEMS"         =>"السلع",
    "Statistics"    =>"الاحصائيات",
    "Members"       =>"الاعضاء",
    "Logs"          =>"الدخول"
    );
    return $lang[$phares];
}
?>