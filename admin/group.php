

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";


         
?> 


      <!-- Left side column. contains the logo and sidebar -->
      <?php include "include_files/side_bar_menu.php";?>
      <!-- Left side column. contains the logo and sidebar -->
     

     
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Groups
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Groups</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <script>
          function scrollToBottom() {


        var objDiv = document.getElementById("message");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
          </script>
            
        
          <div class="row">
             <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Groups</h3>
                </div><!-- /.box-header --><br>
               &nbsp; &nbsp;<a href="newgroup.php" class="btn btn-primary">Add new Group</a>
              <?php 
              $userid=$_SESSION['user_id'];
            $query = "SELECT ug.*,g.* FROM groups g,user_group ug WHERE ug.user_id=$userid AND ug.group_id=g.id order by g.id desc";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            while($fetch=mysqli_fetch_array($run_query))
            {
            if($userid==$fetch['user_id'] && $userid==$fetch['admin_id']){
           ?>
                 
                  <div class="row">
                    <div class="col-md-4">
                      <div class="box-body">
                        <div class="form-group">
                          <h3><?php echo $fetch['name'] ?></h3>
                          <a href="groupchat.php?groupid=<?php echo $fetch['id'] ?>" class="btn btn-success">Start Chat</a>
                          <a href="delete/group_delete.php?groupid=<?php echo $fetch['id'] ?>" class="btn btn-danger">Delete group</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }
                  else{ ?>
                 
                 <div class="row">
                    <div class="col-md-4">
                      <div class="box-body">
                        <div class="form-group">
                          <h3><?php echo $fetch['name'] ?></h3>
                          <a href="groupchat.php?groupid=<?php echo $fetch['id'] ?>" class="btn btn-success">Start Chat</a>
                          <a href="delete/group_delete_new.php?groupid=<?php echo $fetch['id'] ?>" class="btn btn-info">Leave group</a>
                          
                        </div>
                      </div>
                    </div>
                  </div>

           <?php } } ?>

              </div>
            </div>
          </div>
    











          <!-- /.row -->

          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   