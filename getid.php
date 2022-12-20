<?php
    require "connection.php";
    require "session.php";
    if (isset($_POST['update'])) 
   { $ticket_id=$_POST['ticketID'];
	$passenger_id = $_POST['passengerID'];
    $uinfo=$_POST['updateinfo'];
    if(isset($_POST['firstname']))
    {
        $query = " update passenger set pfname = '$uinfo' WHERE pid=$passenger_id";
    }
    if(isset($_POST['pAge']))
    {
        $query = " update passenger set p_age = $uinfo WHERE pid=$passenger_id";
    }
    if(isset($_POST['pNumber']))
    {
        $query = " update passenger set psprt_no = $uinfo WHERE pid=$passenger_id";
    }
    $res = mysqli_query($con, $query);
    if($res) 
	{
		echo 'Passenger information updated';
		header("location:ticketdisplay.php");
	}
	else
	{
		echo  'error';
	}
}
    ?>
<!DOCTYPE html>
<html>
 <head>
	<style>
    body{
		margin: 0;
		padding:0;
		font-family:Arial, Helvetica, sans-serif;
		background: linear-gradient(120deg,#63ACB0,#1D3679);
		height:100vh;
		overflow:hidden;
	}
	.center
	{
		position:absolute;
		top:50%;
		left:50%;
		transform: translate(-50%,-50%);
		width: 400px;
		height: 650px;
		background:white;
		border-radius: 10px;

	}
	.center h1{
		text-align: center;
		padding:0 0 20px 0;
		border-bottom: 1px solid silver;
	}
    .center form{
		padding: 0 40;
		box-sizing: border-box;
	}
	form .ip{
		position: relative;
		border-bottom: 2px solid #adadad;
		margin:30px 85px;
		text-align: center;
	}
	.ip
	{
	
		padding: 0 3px;
		height: 40px;
		font-size: 16px;
		border:none;
		outline: none;
	}
	.ip span::before{
		content:'';
		position:absolute;
		top:40px;
		left:0;
		width:100%;
		height:2px;
		background:#2691d9;
	    transition: .5s;}
	 
	.ip input:focus ~ span::before,
	.ip input:valid ~ span::before{
		width: 100%;
	}
	input[type="submit"]{
		width: 50%;
		height: 50px;
		border: 1px solid;
		background: #2691d9;
		border-radius: 25px;
		font-size: 18px;
		color:#e9f4fb;
		font-weight: 700;
		cursor:pointer;
		outline: none;
		margin:0 90px ;
		margin-bottom: 30px;
		
	}
    .radio
            {
                font-size: 17px;
                color:rgb(252, 242, 212);
            }
	</style>
 </head>
<body >
	<div class="center">
	    <h1 style="color:#0C7BB3">UPDATE INFORMATION</h1>
		<form method="post" action="getid.php">
		<input class="ip" type="text" name="ticketID" placeholder="Ticket ID " required><br><br>
			<span></span>
			<input class="ip" type="text" name="passengerID" placeholder=" Passenger ID " required><br><br>
			<span></span>
            <div class="radio" style="color:rgb(1, 28, 76);text-align: left;">
                <p style="opacity:0.919;text-align: center;">Select field to be updated</p>
                <input type="radio" name="firstname" value="firstname" style="opacity:0.919;margin-left: 110px;">First Name
                <br>
                <input type="radio" name="pAge" value="pAge" style="opacity:0.919;margin-left: 110px;">age
                <br>
				<input type="radio" name="pNumber" value="pNumber" style="opacity:0.919;margin-left: 110px;">Passport Number
            </div>
			<span></span>
            <input class="ip" type="text" name="updateinfo" placeholder=" enter new data " required>
            <span></span>
			<input class="button" type="submit" name="update" value="update">
		</form>
	</div>
</body>
</html>