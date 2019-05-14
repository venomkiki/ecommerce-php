<?php
session_start();
include "connect.php";

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>




    <link rel="stylesheet" href="css/style.css">




</head>

<body>

<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Admin Log in</h2>

    <form class="login-container" name="form1" action="" method="post">
        <p><input type="text" placeholder="Username" name="username" required/></p>
        <p><input type="password" placeholder="Password" name="pwd" required/></p>
        <p><input type="submit" name="submit1" value="Log in"></p>
    </form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php
   if(isset($_POST["submit1"]))
   {
     $res = mysqli_query($link,"select * from adminlogin where username = '$_POST[username]' && password= '$_POST[pwd]'");

         $_SESSION["adminstrator"] = $_POST["username"] ;



         ?>
         <script type="text/javascript">
             window.location="addproduct.php";
         </script>
         <?php

   }
?>



</body>
</html>
