<nav class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a class="navbar-brand" href="dashboard.php">
                <?php echo lang("Home-Admin");?>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="nav navbar-nav">
                <li>
                    <a href="category.php">
                        <?php echo lang('Categories');?>
                    </a>
                </li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Items.php">ADD Item in repository</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ItemsUpload.php">ADD Item in Home Page</a></li>
                        </ul>
                </li>
                <li>
                    <a href="dashboard.php">
                        <?php echo lang('Statistics');?>
                    </a>
                </li>
                <li>
                    <a href="members.php">
                        <?php echo lang('Members');?>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <?php echo lang('Logs');?>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username']?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Layout/home.php">Visit-Shop</a></li>
                        <li><a href="#">Setting</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
