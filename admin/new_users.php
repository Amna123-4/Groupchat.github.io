

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";
$groupid=$_GET['id'];
$userrid=$_SESSION['user_id'];
    if(isset($_POST['remove'])){
    $useridd=$_POST['uid'];
    $query = "DELETE from user_group WHERE group_id='$groupid' AND user_id=$useridd AND admin_id=$userrid";
    $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
    if ($run_query) 
    {
      echo "<script>alert('Users has been removed succesfully!.');</script>";
    }
}



if(isset($_POST["add_users"])){
  $inusers=$_POST["users"];
  foreach($inusers as $in):

    $sql="INSERT INTO user_group(user_id,group_id,admin_id) VALUES ('$in','$groupid','$userrid');";
    $r=mysqli_query($connection,$sql);
    if($r){
      echo "<script>alert('Users has been added succesfully!.');</script>";
    }
  endforeach;
    }     
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
     
     $query = "SELECT u.name as admin,u.id as uid,g.name as gname,g.user_id as gid FROM groups g,user u WHERE g.id=$groupid AND g.user_id=u.id";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $fetch=mysqli_fetch_array($run_query);

  ?>
         
          <h1>
            Group: <?php echo $fetch['gname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
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
                  <h3 class="box-title">Added Users List</h3>
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
                          $query = "SELECT u.name as uname,u.email as uemail,u.id as uid,ug.* FROM user u,user_group ug WHERE u.id!=$_SESSION[user_id] AND visibility='on' AND ug.group_id=$groupid AND u.id=ug.user_id";
                          $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
                          while ($fetch=mysqli_fetch_array($run_query)) {?>
                      <tr>
                        <td><?php echo $fetch['uname']; ?></td>
                        
                        <td><?php echo $fetch['uemail']; ?></td>
                    <form action="" method="POST">   <td><input type="hidden" name="uid" value="<?php echo $fetch['uid']; ?>"><input type="submit" name="remove" value="remove" class="btn btn-danger"></td></form>
                      
                          
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
                  <div class="box-header">
                  <h3 class="box-title">Want  to add to group</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                
                        <th>Email</th>
                        <th>Select</th>
                        
                          
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $query2 = "SELECT user_id from user_group WHERE group_id=$groupid";
                          $run_query2 = mysqli_query($connection,$query2) or die(mysqli_error($connection));     
                        $data=array();
                        while($row = mysqli_fetch_assoc($run_query2)){
                          $data[]=$row["user_id"];
                        }
                        $keys=array_values($data);
                        $imp = "'" . implode( "','", $keys ). "'";


                        $selected=  "(". $imp . ")";




                          $query1 = "SELECT u.id as uid,u.name as uname,u.email as uemail,ug.user_id as ugid,ug.group_id as uggid FROM user u,user_group ug WHERE u.id!=$_SESSION[user_id] AND visibility='on' AND ug.group_id=$groupid AND u.id NOT IN $selected order by  u.id desc";
                          $run_query1 = mysqli_query($connection,$query1) or die(mysqli_error($connection));
                          while ($fetch1=mysqli_fetch_array($run_query1)) { ?>
                      <tr>
                        <td><?php echo $fetch1['uname']; ?></td>
                        
                        <td><?php echo $fetch1['uemail']; ?></td>
                        <form action="" method="POST">
                        <td><input type="checkbox" name="users[]" value="<?php echo $fetch1['uid'];?>"></td>
                      
                          
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        
                        <th>Name</th>
                        
                        <th>Email</th>
                        <th><input type="submit" name="add_users" class="btn btn-primary" value="Add Users"></th>
                        </form>
                        
                      </tr>
                    </tfoot>
                  </table>
                  
              </div>

          <!-- /.row -->

          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   