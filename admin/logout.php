<?php
  session_start();  //start session
  session_destroy();

  header("location:index.php");

?>