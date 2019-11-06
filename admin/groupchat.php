

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";
$groupid=$_GET['groupid'];

         
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


<?php 
if(isset($_POST['send'])){
    
    $msg=$_POST['msg'];
    if(!$msg==""){
       
       
    $qq="INSERT into groupchat(user_id,group_id,msg) VALUES('$_SESSION[user_id]','$groupid','$msg')";
    $runquery = mysqli_query($connection, $qq) or die(mysqli_error($connection));
    header("location:groupchat.php?groupid=$groupid");
    
     }
    else{
    echo "<script>alert('Enter message.');</script>";
    }
}


?>
<?php
    if(isset($_POST['images'])){

         $img =$_POST['image'];
         
         $image ="group_images/".time().$_FILES['image']['name'];
           if (move_uploaded_file($_FILES['image']['tmp_name'], $image))
           {
               $user_id=$_SESSION['user_id'];
                $query = mysqli_query($connection,"INSERT INTO groupchat(user_id,group_id,msg) VALUES('$user_id','$groupid','$image')");
                if($query){
                header("location:groupchat.php?groupid=$groupid");
                }
           }
          
           
}
?>
<?php
  if(isset($_POST['videos'])){

      $img =$_POST['video'];
         
         $image ="videos/".time().$_FILES['video']['name'];
           if (move_uploaded_file($_FILES['video']['tmp_name'], $image))
           {
               $user_id=$_SESSION['user_id'];
                $query = mysqli_query($connection,"INSERT INTO `groupchat` (user_id,group_id,msg) VALUES('$user_id','$groupid','$image')");
                if($query){
                header("location:groupchat.php?groupid=$groupid");
                }
           }

   
  }


?>

<?php
  if(isset($_POST['files'])){
   
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
  <?php 
     
     $query = "SELECT u.name as admin,g.* FROM groups g,user u WHERE g.id=$groupid AND g.user_id=u.id";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $fetch=mysqli_fetch_array($run_query);

  ?>
         
          <h1>
            Group: <?php echo $fetch['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="font-size:15px;color:blue;">Admin: <?php echo $fetch['admin']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
           <?php 
             $user_id=$_SESSION['user_id'];
                    $idd=$fetch['user_id'];
              if($idd==$user_id){
             
           ?>
            <span><a href="new_users.php?id=<?php echo $groupid;?>" class="btn btn-primary">Add users</a></span>

           <?php } ?>
           <span><a href="show_users.php?id=<?php echo $groupid;?>" class="btn btn-primary">Show users</a></span>
          </h1>

          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">group chat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
            
           <div id="message" class="row table-responsive" style="border:2px solid blue;height:400px;overflow:auto;padding:5px;">
           <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
           <script type="text/javascript">
             $(document).ready(function(){
                setInterval(function(){
                  $('#message').load(' #message')
                  },1000);



            } );


           </script>
           
    <table class="table">
      
      
           <?php 

            
            $query = "SELECT g.*,u.name as username,u.image as pic FROM groupchat g,user u WHERE g.user_id=u.id AND g.group_id=$groupid order by id desc";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            while($fetch=mysqli_fetch_array($run_query))
            {
           ?>
           <tr>

           <td>
          <?php 
          $image=$fetch['pic'];
        if($image=="" || empty($image))
        {
         echo "<img src='uploaded_images/default.png' width='25px' height='25px' class='img-circle'>";
        }else {
                        ?>

           <img src="<?=$image?>" class="img-circle" width='25px' height='25px' alt="User Image"><?php  } ?>

           <?php echo $fetch['username'] ?>: <font style="background-color:#ABB2B9;border-radius:10px;">&nbsp;&nbsp;
           <?php
           
           $supported_image = array(
                           'gif',
                           'jpg',
                           'jpeg',
                           'png'
                       );
         $checkimage=$fetch['msg'];
        $ext = strtolower(pathinfo($checkimage, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_image)) {


            ?>
           <a href="<?=$checkimage?>" download=""><img src="<?=$checkimage?>" class="img-square" width='300px' height='200px' alt="User Image"></a>
           <?php  
           }

           $supported_image = array(
                           'mp4',
                           '3gp',
                           'mpeg',
                           'flv',
                           'mov',
                           'avi'
                       );
         $checkimage=$fetch['msg'];
        $ext = strtolower(pathinfo($checkimage, PATHINFO_EXTENSION));
           if(in_array($ext, $supported_image)){
           ?>
            <a href="<?=$checkimage?>" download=""><video width="300px" controls><scoure scr="<?=$checkimage?>" type="video/webm"></video></a>
          <?php
           }
           else{
           ?>
            <?=@$fetch['msg'];?>
            <?php
             }
             ?>

            &nbsp;&nbsp;
           
           </font>&nbsp;&nbsp;
      <?php if($fetch['user_id']==$_SESSION['user_id']){
           
                 $supported_image = array(
                           'gif',
                           'jpg',
                           'jpeg',
                           'png'
                       );
         $checkimage=$fetch['msg'];
        $ext = strtolower(pathinfo($checkimage, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_image)) {

            ?> 
                          <a href="delete/user_delete.php?id=<?php echo $fetch['id']; ?>"><i class="fa fa-trash"></i></a>
            <?php 
            }
           
           else{
           ?>
           
                          <a href="delete/user_delete.php?id=<?php echo $fetch['id']; ?>"><i class="fa fa-trash"></i></a>
           <?php } } ?>
           </td>

           </tr>
           <?php } ?>         
           </table>

           </div>
           <br>
           <div class="row">
               <form action="" method="POST" class="form-group" enctype="multipart/form-data">
                 <div class="col-sm-9">
                 <input type="text" name="msg" class="form-control" placeholder="Your message here...." size="40">
                 </div>
                 
                 <div class="col-sm-1">
                 <input type="submit" name="send" value="send" class="btn btn-success">
                 </div>
               </form>
            </div>
            &nbsp;
            <div class="row">
           <form action="" method="POST" class="form-group" enctype="multipart/form-data">
               <div class="col-sm-1">
               <label>Send images</label>
               </div>
               <div class="col-sm-2">
                 <input type="file" name="image" class="form-control" required="">
                 </div>
                 <div class="col-sm-1">
                 <input type="submit" name="images" value="send" class="btn btn-success">
                 </div>
               </form>
           </div>
           <div class="row">
           <form action="" method="POST" class="form-group" enctype="multipart/form-data">
               <div class="col-sm-1">
               <label>Send videos</label>
               </div>
               <div class="col-sm-2">
                 <input type="file" name="video" class="form-control" required="">
                 </div>
                 <div class="col-sm-1">
                 <input type="submit" name="videos" value="send" class="btn btn-success">
                 </div>
               </form>
           </div>
          
           <div>
        
           </div>


          <!-- /.row -->

          <!-- Main row -->
          <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     

       <?php include "include_files/footer.php";?>

  

   