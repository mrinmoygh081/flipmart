<?php
require_once "db.php";
?>
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav">
			<li class="active dropdown yamm-fw">
				<a href="index.php">Home</a>
				
			</li>
            <?php
            $Query = "SELECT * FROM category LIMIT 8";
            $Connection = mysqli_query($db_connection,$Query);
            while($row = mysqli_fetch_assoc($Connection))
            {
            ?>

			<li class="dropdown yamm mega-menu">
				<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><?php echo($row['cat_name']); ?></a>
                <ul class="dropdown-menu container">
					<li>
               						<div class="yamm-content ">
            <div class="row">
                
            <?php
            $id = $row['cat_id'];
            $query = "SELECT * FROM sub_category WHERE cat_id = $id";
            $connection = mysqli_query($db_connection,$query);
            while($Row = mysqli_fetch_assoc($connection))
            {
            ?>
                   <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                        <h2 class="title"><?php echo($Row['sub_name']); ?></h2>

                        <?php
            $gid = $Row['sub_id'];
            $gquery = "SELECT * FROM groups WHERE sub_id = $gid";
            $gconnection = mysqli_query($db_connection,$gquery);
            while($gRow = mysqli_fetch_assoc($gconnection))
            {
            ?>
                        <ul class="links">
                            <li><a href="category.php?gid=<?php echo($gRow['group_id']); ?>&page=1&sort=1&show=10"><?php echo($gRow['group_name']); ?></a></li>
                        </ul>
                        <?php
            }
            ?>
</div><!-- /.col -->
<?php
            }
            ?>       
       <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                    <img class="img-responsive" src="admin/img/<?php echo($row['cat_image']); ?>" alt="">
                
</div><!-- /.yamm-content -->					
</div>
</div>
</li>
				</ul>
				
			</li>
<?php
            }
            ?>
             <li class="dropdown  navbar-right special-menu">
				<a href="#">Todays offer</a>
			</li>
					
			
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->