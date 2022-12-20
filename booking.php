<?php
    session_start();
    require_once("connection.php");
    // $GLOBALS['fno'] = $_GET['fno'];
    if(isset($_COOKIE["ticket_id"]))
    {
        $tId = $_SESSION["ticket_id"];
    }
    // echo $fno;
    if(isset($_SESSION["user_id"]))
    {
        $uId = $_SESSION["user_id"];
    }
    if (isset($_POST['add']) || isset($_POST['done'])) 
    {
        $firstname = $_POST['first-name'];
        $lastname = $_POST['last-name'];
        $age = $_POST['age'];
        $passportnumber = $_POST['passnum'];
        $dob = $_POST['dob'];
        $gender = $_POST['check'];
        $fno = $_GET['fno'];
        $query1 = " insert into passenger (pfname,plname,p_age,p_dob,psprt_no,p_gender,flight_no) values('$firstname','$lastname','$age','$dob','$passportnumber','$gender', '$fno')";
        $result = mysqli_query($con, $query1);
        $getPassDataQuery = "SELECT * FROM `passenger` WHERE psprt_no='$passportnumber' AND flight_no = '$fno'";
        $passData = mysqli_query($con, $getPassDataQuery);
        $row = mysqli_fetch_assoc($passData);
        // $count = mysqli_num_rows($passData);
        // echo "<script>console.log('Count' + $row[pid])</script>";
        $insertTicketQuery = "INSERT INTO  ticket (user_id,passenger_id,ticket_id,flight_id)VALUES('$uId','$row[pid]', '$_COOKIE[ticket_no]', '$fno')";
        $res =  mysqli_query($con, $insertTicketQuery);
        // if (!$result) {
        //     echo "error: " . mysqli_error();
        //     return;
        // }
        if ($result) 
        {
            if (isset($_POST['add'])) 
            {
                $fno = $_GET['fno'];
                // header("location:booking.php?fno=$fno");
            }
            if (isset($_POST['done'])) 
            {
                header("location:ticketdisplay.php");
            }
        } 
        else 
        {
            echo '  Please Check Your Query ';
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <title>airport management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
            body {
            background-image: url('fllist8.jpg');
            background-size: cover;
            }
            .flightlist {
            border: 3px solid rgb(232, 179, 81);
            border-radius: 20px;
            padding: 20px;
            color:rgb(255, 255, 255);
            background-image: url('bkt6.jpg');
            background-size: cover;
            margin: auto;
            width: 40%;
            padding-left: 30px;
            padding-top: 40px;
            padding-bottom: 40px;
            }
            #p1{
                display: inline-block;
                padding-left : 30px;
                color:rgb(233, 198, 133);
            }
            #p2{
                display: inline-block;
                padding-left : 30px;
                padding-top: 15px;
                color:rgb(233, 198, 133);
            }
            h1{
                color:rgb(255, 255, 255);
            }
            .ffl{
                padding-left : 50px;
            }
            input[type=text] {
                width: 60%;
                border: 1px solid rgb(0, 217, 255);
                border-radius: 20px;
                padding: 5px 5px;
                padding-left: 20px;
                box-sizing: border-box;
                float: right;
                background-color: rgba(255, 255, 255, 0.919);
                margin-right: 20px;
            }
            input[type=date] {
                border: 1px solid rgb(0, 217, 255);
                border-radius: 5px;
                padding: 3px 3px;
                box-sizing: border-box;
                background-color: rgba(255, 255, 255);
                margin-top: 4px;
            }
            #tno{
                text-align: center;
                font-size: 28px;
                color: rgb(255, 255, 255);
                text-shadow: 5px 5px 10px rgb(0, 0, 0);
            }
            header{
            top:0; right:0; left:0;
            background: #030419;
            display:flex;
            padding:1.5rem 4%;
            align-items: center;
            justify-content: space-between;
            box-shadow: rgb(227, 236, 241);
            border-bottom-right-radius : 0.4rem;
            border-bottom-left-radius : 0.4rem;
            z-index: 4;
        }
	    </style>
    </head>
    <body>
        <header style="opacity : 0.9;">
            <a href="main.php" class="logo">Via.</a>
        </header>
        <br><br><br>
        <div class="ffl">
            <form action="booking.php?fno=<?php echo $_GET['fno']?>" method="post">
            <p id="tno"><b>Enter Passenger details</b></p>
            <br><br>
            <br>
            <div class="flightlist">
                <label>First Name :</label>
                <input type="text" name="first-name" placeholder="enter first name" required>
                <br><br>
                <label>Last Name :</label>
                <input type="text" name="last-name" placeholder="enter last name" required>
                <br><br>
                <label>Age :</label>
                <input type="text" name="age" placeholder="enter age" required>
                <br><br>
                <label style="color: #ffffff;" for="passnum">Passport NUMBER :</label>
                <input type="text" name="passnum" id="passnum" placeholder="xxxxxxxx" required>
                <br><br><br>
                <div class="radio" style="color:rgb(255, 255, 255);">
                    Gender : <input type="radio" name="check" value="male" style="opacity:0.919;margin-left: 5px;margin-right: 2px;">M
                    <input type="radio"  name="check" value="female" style="opacity:0.919;margin-left: 5px;margin-right: 2px;">F
                    <input type="radio" name="check" value="other" style="opacity:0.919;margin-left: 5px;margin-right: 2px;">O
                </div>   
                <br>                
                <div class="inputs">
                    <label style="font-size:17px">Date of birth</label>
                    <input type="date" name="dob" style="opacity:0.919">
                </div>                   
            </div>
        <br><br><br>
        <div style="text-align:center">
            <input type="submit" name="add" class="btnstyle" value="Book More">
            <input type="submit" name="done" class="btnstyle" value="Done">
        </div>
        </form>
        </div>
    </body>
</html>