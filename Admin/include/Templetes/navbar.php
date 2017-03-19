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
      <a class="navbar-brand" href="dashboard.php"><?php echo lang("Home-Admin");?></a>
    </div>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav">
        <li><a href="category.php"><?php echo lang('Categories');?></a></li>
        <li><a href="Items.php"><?php echo lang('ITEMS');?></a></li>
        <li><a href="dashboard.php"><?php echo lang('Statistics');?></a></li>
        <li><a href="members.php"><?php echo lang('Members');?></a></li>
        <li><a href="#"><?php echo lang('Logs');?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          
          <ul class="dropdown-menu">
            <li><a href="members.php?do=edit&userid=<?php session_start();  echo $_SESSION['ID'] ?>">Edit Profile</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="logout.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>