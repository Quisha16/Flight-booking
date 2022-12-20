<?php
 require_once("connection.php");
if (isset($_POST['submit'])) 
   {
            $firstname = $_POST['first-name'];
            $lastname = $_POST['last-name'];
            $email = $_POST['email'];
            $phoneno = $_POST['phone-number'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = " insert into user (user_fname	,user_lname,user_email,user_ph_no,username,user_pwd) values('$firstname','$lastname','$email','$phoneno','$username','$password')";
            $result = mysqli_query($con,$query);
            if(!$result) {
               // echo "error: ".mysqli_error();
                return;
            }

            if($result)
            {
                header("location:login.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
?>
