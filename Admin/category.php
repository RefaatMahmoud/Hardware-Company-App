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
        
         /*
            ============================================
            ========== Insert code From $do=add ========
            ============================================
        */
        else if($do == "insert")
        {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                //collect Data By Post
                $name = $_POST['Name'];
                $description = $_POST['description'];
                //Validation in my form
                $formError = array();
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
                echo "<div class='container'>";
                if (empty($formError)) {
                    $check = CheckItem('Name', 'Categories', $name);
                    if ($check == 1) {
                        echo "<div class='container'>";
                        echo "<div class='alert alert-danger text-center'>" . '<h3>this Name is already exit </h3></div>';
                        echo "</div>";
                        header("REFRESH:3 ; URL=category.php?do=add");
                    } else {
                        $stmt = $con->prepare("Insert into categories (Name,Description)
                          values(:zname,:zdescription)");
                        //excute Data
                        $stmt->execute(array(
                            'zname' => $name,
                            'zdescription' => $description
                        ));


                        //Count the number of rows

                        echo "<div class='container'>";
                        echo "<div class='alert alert-success text-center'>" . '<h3>1 Record inserted </h3></div>';
                        echo "</div>";
                        header("REFRESH:3 ; URL=category.php");
                    }
                }
                else{
                    include ("categories/index.php");
                }
            }
        }
         /*
            =============================================
            ========Ending Insert Code from $do=edit ====
            =============================================
        */
        /*
            ============================================
            ============Delete code ====================
            ============================================
        */
        else if($do='delete')
        {
            //check if value userid is define and is numeric
            $userid = isset($_GET['userid'])&&is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

//preparing select Query
            $stmt = $con->prepare("select * From categories where ID = ? LIMIT 1");
//excute Query in DB
            $stmt->execute(array($userid));
//Count the number of rows
            $count = $stmt->rowCount();
//if userid in my DB will appear my form
            if($count>0)
            {
                //this binding method to prevent Sql Injunction
                $stmt = $con->prepare('DELETE FROM categories WHERE ID = :zuser');
                //binding method
                $stmt->bindParam('zuser',$userid);
                $stmt->execute();
                echo "<div class='container'>";
                echo "<div class='alert alert-success text-center'>";
                echo "<h2>1 Record Deleted</h2></div>";
                header('REFRESH:5 ; URL=category.php');
                echo "</div>";
            }
            else
            {
                $x = "This account is not Exit";
                RedirectFunc($x,3);
            }
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
        
   
