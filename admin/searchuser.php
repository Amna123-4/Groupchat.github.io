      <?php include "include_files/connection.php" ?>
       
       <?php

      if (isset($_REQUEST['id'])) 
        {
          $id = $_REQUEST['id'];

          $query = "SELECT * from user where id='$id'";
          $run_query = mysqli_query($connection,$query);
          $fetch = mysqli_fetch_array($run_query);
          $status = $fetch['status'];
          if ($status == 'enabled') 
          {
            $query = "UPDATE user set status='disabled' where id='$id'";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            if ($run_query) 
            {
              header('location:user.php');
            }
          }
          else
          {
            $query = "UPDATE user set status='enabled' where id='$id'";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            if ($run_query) 
            {
              header('location:user.php');
            }
          }        
          
       }


       ?>

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
            Dashboard 
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Users Searching</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
        

          <!-- /.row -->
           <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table for user's</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                
                        <th>Email</th>

                        <th>Status</th>
                        
                        <th>Action</th>
                          
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                         if (isset($_POST['search']))
                          { 
                          $result = $_POST['name'];

                          $query = "SELECT * FROM user WHERE name='$result' OR email='$result' OR name LIKE '%{$result}%'";
                          $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
                            }
                          while ($fetch=mysqli_fetch_array($run_query)) {?>
                      <tr>
                        <td><?php echo $fetch['id']; ?></td>
                        <td><?php echo $fetch['name']; ?></td>
                        
                        <td><?php echo $fetch['email']; ?></td>
                      


                        

                        
                        <td>
                          <a href="user.php?id=<?php echo $fetch['id'];?>">
                            <?php 
                            if ($fetch['status'] == 'enabled') {?>
                            <span class="label label-success"><?php echo $fetch['status']; ?></span><?php }else {?><span class="label label-danger"><?php echo $fetch['status']; ?></span><?php } ?> 
                          </a>                      
                        </td>
                          
                        <td>
                          <a href="user_edit.php?id=<?php echo $fetch['id']; ?>"><i class="fa fa-edit"></i></a> | 
                          <a href="delete/user_delete.php?id=<?php echo $fetch['id']; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                          
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        
                        <th>Email</th>
                          
                          
                          
                        
                        <th>Status</th>
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

  

   