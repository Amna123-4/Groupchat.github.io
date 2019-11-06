

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";


         
?> 

<?php
       if (isset($_POST['submit'])) 
  {
        $name    = $_POST['name'];
  

          $user_id=$_SESSION['user_id'];
          $query = "INSERT into groups(name,user_id) values('$name','$user_id')";
            $run_query = mysqli_query($connection, $query) or die(mysqli_error($connection));
            

            if ($run_query) {
                $grpid=mysqli_insert_id($connection);
            $query = "INSERT into user_group(user_id,group_id,admin_id) values('$user_id','$grpid','$user_id')";
            $run_query = mysqli_query($connection, $query) or die(mysqli_error($connection));
                echo "<script>alert('Record is inserted succesfully!.');</script>";
            } else {
                echo "<script>alert('Record is not inserted succesfully!');</script>";
}

}
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
            Add new Group
            
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
                  <h3 class="box-title">Add new group</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="" method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Group Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="box-footer">
                    <input type="submit" name="submit" value="Add" class="btn btn-success">
                  <span><a href="group.php" class="btn btn-primary">Back to groups</a></span>

                  </div>
                </form>
              </div>
            </div>
            
          </div>







          <!-- /.row -->

          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   