

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";
$groupid=$_GET['id'];

         
?> 



<div id="show"></div>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function () {
        $('#show').load('home.php')
      }, 3000);
    });
  </script>








      <!-- Left side column. contains the logo and sidebar -->
      <?php include "include_files/side_bar_menu.php";?>
      <!-- Left side column. contains the logo and sidebar -->
     

     
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
  <?php 
     
     $query = "SELECT u.name as admin,g.* FROM groups g,user u WHERE g.id=$groupid AND g.user_id=u.id";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $fetch=mysqli_fetch_array($run_query);

  ?>
         
          <h1>
            Group: <?php echo $fetch['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="font-size:15px;color:blue;">Admin: <?php echo $fetch['admin']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
           
           <span><a href="groupchat.php?groupid=<?php echo $groupid;?>" class="btn btn-primary">Back to group</a></span>
          </h1>

          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">group chat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="box-header">
                  <h3 class="box-title">Users List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                
                        <th>Email</th>

                        
                          
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $query = "SELECT u.*,ug.* FROM user u,user_group ug WHERE u.id!=$_SESSION[user_id] AND visibility='on' AND ug.group_id=$groupid AND u.id=ug.user_id";
                          $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
                          while ($fetch=mysqli_fetch_array($run_query)) {?>
                      <tr>
                        <td><?php echo $fetch['name']; ?></td>
                        
                        <td><?php echo $fetch['email']; ?></td>
                      
                          
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        
                        <th>Name</th>
                        
                        <th>Email</th>
      
                      </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.box-body -->
              </div>

          <!-- /.row -->

          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   