<?php
ob_start();
session_start(); //Resume Session
    $title = ' ';
    if(isset($_SESSION['username']))
    {
        include "init.php";
        //check value that coming from URL
        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
        /*
        =================================================
        ================= Manage Code ===================
        =================================================
        */
        if($do == "manage")
        {
            $stmt=$con->prepare("select * from categories");
            $stmt->execute();
            //get all data from many record
            $rows = $stmt->fetchAll();
            ?>
             <h1 class="text-center">Manage Categories</h1>
			<div class="container categories">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-edit"></i> Manage Categories
						<div class="option pull-right">
							<i class="fa fa-sort"></i> Ordering:
				        <a class="<?php if ($sort == 'asc') { echo 'active'; } ?>" href="?sort=asc">Asc</a> | 
                        <a class="<?php if ($sort == 'desc') { echo 'active'; } ?>" href="?sort=desc">Desc</a> 
						</div>
					</div>
                    <div class="panel-body">
						<?php
							foreach($rows as $cat) {
								echo "<div class='cat'>";
								echo "<div class='hidden-buttons'>";
								echo "<a href='category.php?do=edit&userid=".$cat['ID']."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i> Edit</a>";
								echo "<a href='category.php?do=delete&userid=".$cat['ID']. "' class='confirm btn btn-xs btn-danger'><i class='fa fa-close'></i> Delete</a>";
								echo "</div>";
									
                                echo "<h3>" . $cat['Name'] . '</h3>';
									
                                echo "<div class='full-view'>";
										echo "<p>"; if($cat['Description'] == '') { echo 'This category has no description'; } else { echo $cat['Description']; } echo "</p>"; 
								echo "</div>";
								echo "</div>";
								echo "<hr>";
							}
						?>
					</div>
                </div>
                <a href="category.php?do=add" class="AddBtn btn btn-primary">Add New Category<i class="fa fa-plus"></i></a>
            </div>
                    
                  
            <?php
        }
        /*
        =================================================
        =================Ending Manage Code ===================
        =================================================
        */
          /*
        ================================================
        ================== Add Form ====================
        ================================================
        */

        else if($do=='add')
        {
            include ("categories/add.php");
        }
        /*
            =============================================
            ============== Edit Form ====================
            =============================================
        */
        else if($do == 'edit')
        {
            include "categories/edit.php";
        }
        /*
            =============================================
            ========Update Code from $do=edit ===========
            =============================================
        */
        else if($do == "update")
        {
            echo "<h2 class='text-center'>Update category</h2>";
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                //collect Data By Post
                $name = $_POST['name'];
                $description = $_POST['description'];
                $userid = $_POST['userid'];
                //Validation in my form
                $formError = array();
                echo "<div class='container'>";
                if(is_numeric($name))
                {
                    $formError[0] = "name can't be a start with number";
                }
                if(empty($name))
                {
                    $formError[1] = "You can't make name is <strong> Empty </strong>";
                }
                if(empty($description))
                {
                    $formError[2] = "You can't make description is <strong> Empty </strong>";
                }
                echo "</div>";
                //Get Data By prepare statment
                if(empty($formError))
                {
                    $stmt = $con->prepare("Update categories SET Name = ? , Description = ? WHERE ID = ?");
                    //excute Data
                    $stmt->execute(array($name,$description,$userid));
                    //Count the number of rows
                    $count = $stmt->rowCount();
                    echo $count;
                    if($count>0)
                    {
                        echo "<div class='container'>";
                        echo "<div class='alert alert-success text-center'>" .'<h3> Update'. $count .' Record </h3></div>';
                        echo "</div>";
                        header("REFRESH:10 ; URL=category.php");
                    }
                }
              else
            {
                echo "<div class='container'>";
                echo "<div class='alert alert-warning text-center'>" .'<h3>You Not Change It</h3></div>';
                echo "</div>";
                header("REFRESH:10 ; URL=category.php");
            }   
            }
            else
            {
                RedirectFunc("Can't go to this page Directly",5);
            }

        }
         /*
            =============================================
            ========ُEnding Update Code from $do=edit ====
            =============================================
        */
        
