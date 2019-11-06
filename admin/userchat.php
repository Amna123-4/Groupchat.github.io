

<?php
include ("include_files/connection.php");
include "include_files/top_header.php";


         
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
 
 $userid=$_REQUEST['userid'];
if(isset($_POST['send'])){
  
    $msg=$_POST['msg'];
    if(!$msg==""){
    $qq="INSERT into ind_chat(user_id,opp_id,msg) VALUES('$_SESSION[user_id]',$userid,'$msg')";
    $runquery = mysqli_query($connection, $qq) or die(mysqli_error($connection));
    header("location:userchat.php?userid=$userid");
     }
    else{
    echo "<script>alert('Enter message.');</script>";
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
  <?php 
      
     $query = "SELECT * FROM user WHERE id=$userid";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $fetch1=mysqli_fetch_array($run_query);

  ?>
    
          <h1>

         <?php 
          $image=$fetch1['image'];
        if($image=="" || empty($image))
        {
         echo "<img src='uploaded_images/default.png' width='70px' height='70px' class='img-circle'>";
        }else {
                        ?>

           <img src="<?=$image?>" class="img-circle" width='70px' height='70px' alt="User Image"><?php  } ?>


            <?php echo $fetch1['name']; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">personal chat</li>
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
            
           <div id="message" class="row table-responsive" style="border:3px solid blue;height:400px;overflow:auto;padding:5px;">
           <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
           <script type="text/javascript">
             $(document).ready(function(){
                setInterval(function(){
                  $('#message').load('  #message')
                  },1000);



            } );


           </script>


           <table class="table">
            
           <?php 


             $session_id=$_SESSION['user_id'];
             $query ="SELECT * FROM ind_chat WHERE user_id=$session_id AND opp_id=$userid OR user_id=$userid AND opp_id=$session_id order by id desc";
            $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));
            while($fetch=mysqli_fetch_array($run_query))
            {
           ?>
           <tr>
           
          <?php 
          if($fetch['user_id']==$_SESSION['user_id']){
          ?>
          <td align="right">
        
             <font style="background-color:#5DADE2;border-radius:10px;">&nbsp;&nbsp; <?php echo $fetch['msg'];?>&nbsp;&nbsp;
             
             </font>&nbsp;&nbsp;
               
              <a href="delete/ind_chat.php?id=<?php echo $fetch['id']; ?>"><i class="fa fa-trash"></i></a>
      

           </td>
      <?php }
      else{
          ?>

           <td>
             <?php 
          $image=$fetch1['image'];
        if($image=="" || empty($image))
        {
         echo "<img src='uploaded_images/default.png' width='25px' height='25px' class='img-circle'>";
        }else {
                        ?>

           <img src="<?=$image?>" class="img-circle" width='25px' height='25px' alt="User Image"><?php  } ?>
             <?php echo $fetch1['name'];?>:
             <font style="background-color:#ABB2B9;border-radius:10px;">&nbsp;&nbsp; <?php echo $fetch['msg'];?>&nbsp;&nbsp;
             
             </font>&nbsp;&nbsp;
           </td>
        <?php 
             }
             ?>
           </tr>
           <?php } ?>           
           </table>
           
           
           </div>
           <br>
           <div class="row">
           <form action="" method="POST" class="form-group">
           <div class="col-sm-11">
           <input type="text" name="msg" class="form-control" placeholder="Your message here...." size="50">
           </div>
           <div class="col-sm-1">
           <input type="submit" name="send" value="send" class="btn btn-success">
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

  

   