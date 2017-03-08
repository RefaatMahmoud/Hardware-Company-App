<?php
ob_start();
session_start(); //Resume Session
    $title = ' ';
    if(isset($_SESSION['username']))
    {
        include "init.php";
        //check value that coming from URL
        echo "Hello in category page";
        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
        /*
        =================================================
        ================= Manage Code ===================
        =================================================
        */
        if($do == "manage")
        {
            
        }
          /*
        ================================================
        ================== Add Form ====================
        ================================================
        */

        else if($do=='add')
        {
        }
        /*
            =============================================
            ============== Edit Form ====================
            =============================================
        */
        else if($do == 'edit')
        {
            
        }
        /*
            =============================================
            ========Update Code from $do=edit ===========
            =============================================
        */
        else if($do == "update")
        {
            
        }
        /*
            ============================================
            ========== Insert code From $do=add ========
            ============================================
        */
        else if($do == "insert")
        {

        }
        /*
            ============================================
            ============Delete code ====================
            ============================================
        */
        else if($do='delete')
        {

        }
}
  else
    {
        // echo "You Cant Go to this page directly";
        header('Location:index.php');
        exit();
    }
include $tpl . "footer.php";
ob_end_flush();
?>