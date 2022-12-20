<?php
   session_start();
   if(isset($_SESSION["username"])&& $_SESSION["user_id"]===true)
   {
    header("location:main.html");
    exit;
   }
?>