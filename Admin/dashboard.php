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
       ?>
<!--        strart Dashboard Design -->
        <div class="container home-stat">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat st-members">
                        <i class="fa fa-user-circle"></i>
                        <div class="info">
                            Total Members
                        <span><a href="members.php"><?php echo CountItems('UserID','adminusers') +1?></a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-pending">
                        <i class="fa fa-group"></i>
                        <div class="info">
                        Pend Members
                            <span>0</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-items">
                        <i class="fa fa-cubes"></i>
                        <div class="info">
                             Total Items
                        <span><a href="Items.php">0</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-comments">
                        <i class="fa fa-glide"></i>
                        <div class="info">
                             Total Categories
                        <span>0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container latest">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users"></i>The Latest Registered users    
                        </div>
                        <div class="panel-body">
                            <?php
                            $arr = getLeatest('*','adminusers','UserID',5);
                        //will get index of Username in this array
                            $counter =0 ;
                            foreach($arr as $val)
                            {
                                $counter++;
                                if($counter%2==0)
                                {
                                    echo "<div class='even'>";
            
                                    echo $val['Username'];
                                    
                                     echo "<a href='members.php?do=edit&userid=".$val['UserID']."'class='EditBtn btn btn-success'><i class ='fa fa-edit'></i>
                                     Edit</a>";
                                    echo "</div>";
                                }
                                else {
                                    echo "<div class='odd'>";
                                    echo $val['Username'];
                                    echo "<a href='members.php?do=edit&userid=" . $val['UserID'] . "'class='EditBtn btn btn-success'><i class ='fa fa-edit'></i>
                                    Edit</a>";
                                    echo "</div>";
                                }
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tags"></i>The Latest tags    
                                </div>
                                    <div class="panel-body">
                                        Test
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--      End Dashboard Design  -->
      <?php
        include $tpl . "footer.php";
    }
    else
    {
        // echo "You Cant Go to this page directly";
        header('Location:index.php');
        exit();
    }
ob_end_flush();
?>