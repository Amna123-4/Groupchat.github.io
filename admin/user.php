      <?php include "include_files/connection.php" ?>

      <?php include "include_files/top_header.php";?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "include_files/side_bar_menu.php";?>
      <!-- Left side column. contains the logo and sidebar -->
     

     
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Users
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Users</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
          <!-- /.row -->
           <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table for users</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                
                        <th>Email</th>

                        <th>Action</th>
                          
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $query = "SELECT * FROM user WHERE id!=$_SESSION[user_id] AND visibility='on'";
                          $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
                          while ($fetch=mysqli_fetch_array($run_query)) {?>
                      <tr>
                        <td><?php echo $fetch['name']; ?></td>
                        
                        <td><?php echo $fetch['email']; ?></td>
                      


                        

                        
                        <td>
                        <?php if($_SESSION['user_id']==1){ ?>
                          <a href="userchat.php?userid=<?php echo $fetch['id'];?>" class="btn btn-primary">Strat Chat
                          </a> 
                        <?php if($fetch['status']=='enabled'){ ?>
                          <a href="enabled_disabled.php?userid=<?php echo $fetch['id'];?>" class="btn btn-success"><?php echo $fetch['status'];?></a> 
                          <?php } 
                          else{
                          ?>
                          <a href="enabled_disabled.php?userid=<?php echo $fetch['id']; ?>" class="btn btn-danger"><?php echo $fetch['status'];?></a>
                          <?php
                          }
                          ?>
                          <?php } 
                           else{
                           ?>
                           <a href="userchat.php?userid=<?php echo $fetch['id'];?>" class="btn btn-primary">Start Chat
                          </a>
                           <?php
                           }
                          ?>                    
                        </td>
                          
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        
                        <th>Name</th>
                        
                        <th>Email</th>
      
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>
          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   