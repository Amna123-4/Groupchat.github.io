<?php include "include_files/connection.php";
include "include_files/top_header.php";?>

       
       <?php
       if (isset($_POST['submit2'])) 
  {
    
    $oldpassword       = $_POST['oldpass'];
    $password          = $_POST['pass'];
    $retyped_password  = $_POST['cpass'];
    
        
               

    
        if ($password != $retyped_password) 
        {
          $password_match_error = '*Your password didnot matched';
        }
      
    
   $ress=mysqli_query($connection,"SELECT * FROM user WHERE id='$_SESSION[user_id]'");
        $fetchdat=mysqli_fetch_array($ress);
if ($oldpassword==$fetchdat['password']) {
     
      

    if ($password == $retyped_password) {
      

   $query = "UPDATE user SET password='$password' WHERE id='$_SESSION[user_id]'";
        $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));

        if ($run_query) 
        {
          echo "<script>alert('Password changed succesfully!.');</script>";
        }
        else
        {
          echo "<script>alert('Password changing failed!');</script>";

        }

}
}
else{
  echo "<script>alert('Provide correct Password!');</script>";
}
}

     


       ?>
       <?php
       if (isset($_POST['submit1'])) 
  {
    
    $name          = $_POST['name'];
    $email         = $_POST['email'];
   
    

     $query = "UPDATE user SET name='$name',email='$email' WHERE id='$_SESSION[user_id]'";
        $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));

        if ($run_query) 
        {
          echo "<script>alert('Profile is updated succesfully!.');</script>";
        }
        else
        {
          echo "<script>alert('Profile updation failed!');</script>";

        }

}


     


       ?>
       <?php
          if (isset($_POST['submit3'])) {
           
          
           $image   ="uploaded_images/".time().$_FILES['image']['name'];
           if (move_uploaded_file($_FILES['image']['tmp_name'], $image))
           {
               $user_id=$_SESSION['user_id'];
                $query = mysqli_query($connection,"UPDATE user SET image='$image' WHERE id='$user_id'");
                 if ($query) 
          {
            echo "<script>alert('Profile image updated Successfully!');</script>";
          }
          else
          {
            echo "<script>alert('Image updation failed!');</script>";

          }
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
            Dashboard 
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="profile.php"><i class="fa fa-dashboard"></i> Profile</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
             <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">General Setting</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php 
                  $resss=mysqli_query($connection,"SELECT * FROM user WHERE id='$_SESSION[user_id]'");
                   $fetchdata=mysqli_fetch_array($resss);
                ?>
                
                  <div class="row">
                    <form action="" method="POST">
                    <div class="col-sm-5">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Full Name</label>
                          <input type="text" value="<?php echo $fetchdata['name'];?>" class="form-control" name="name">
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" value="<?php echo $fetchdata['email'];?>" class="form-control" name="email">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                 
                  


                  <div class="box-footer">
                    <input type="submit" name="submit1" value="Update" class="btn btn-success">
                  </div>
                </div>
                </form>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-sm-7">
                   <div class="col-md-12">
                      <div class="box-body">
                        <?php 

                        $image=$fetchdata['image'];
if($image=="" || empty($image))
{
  echo "<img src='uploaded_images/default.png' height='200px' width='200px'>";
}else {
                        ?>
                        <img src="<?=$image?>" height="200px" width="200px">

                        <?php } ?>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Profile Image</label>
                          <input type="file" class="form-control" name="image">
                        </div>
                        <div class="box-footer">
                    <input type="submit" name="submit3" value="Upload image" class="btn btn-success">
                  </div>
                      </div>
                    </div>
                </div>
                </form>
              </div>
                
              </div>
            </div>
             <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Password Setting</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="row">
                <div class="col-sm-7">
                <form action="" method="POST">
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Old Password</label>
                          <input type="password" class="form-control" name="oldpass">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">New Password</label>
                          <input type="password" class="form-control" name="pass">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Confirm New Password</label>
                          <input type="password" class="form-control" name="cpass">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="box-footer">
                    <input type="submit" name="submit2" value="Update" class="btn btn-success">
                  </div>
                </form>
                </div>
                <div class="col-sm-5">
                <h3>Visibility</h3>
                <?php 
                    $query = "SELECT * FROM user WHERE id=$_SESSION[user_id]";
                    $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
                    $fetch3=mysqli_fetch_array($run_query);
                    $vis=$fetch3['visibility'];
                    if($vis=="on"){
                          ?>
                          <a href="status.php?id=<?php echo $fetch3['id'];?>" class="btn btn-success"><?php echo $fetch3['visibility']?></a>
                          <?php }
                          else{

                           ?>
                        <a href="status.php?id=<?php echo $fetch3['id'];?>" class="btn btn-danger"><?php echo $fetch3['visibility']?></a>

                           <?php } ?>
                </div>
                </div>
              </div>
            </div>
           
            
          </div>

          <!-- /.row -->
          
          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   