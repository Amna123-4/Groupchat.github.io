<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
             <?php    
                  $resss=mysqli_query($connection,"SELECT * FROM user WHERE id='$_SESSION[user_id]'");
                   $fetchdata=mysqli_fetch_array($resss);
                ?>
                
            <div class="pull-left image">
              <?php 

        $image=$fetchdata['image'];
        if($image=="" || empty($image))
        {
         echo "<img src='uploaded_images/default.png' class='img-circle'>";
        }else {
                        ?>
              <img src="<?=$image?>" class="img-circle" alt="User Image"><?php  } ?>
            </div>
            
            <div class="pull-left info">
              <p><?php echo $fetchdata['name'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="home.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a></li>
              <li>
              <a href="user.php">
                <i class="fa fa-user"></i> <span>Private Chat</span> 
              </a></li>
              <li>
              <a href="group.php">
                <i class="fa fa-group"></i> <span>Group Chat</span> 
              </a></li>
              <li>
              <a href="logout.php">
                <i class="fa fa-sign-out"></i> <span>logout</span> 
              </a></li>
              
              
             

              

             

              
             
             
              
              

              

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>