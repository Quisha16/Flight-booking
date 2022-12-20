<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <title>airport management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .btn {
            display: inline-flex;
            margin-top: 1rem;
            border-radius: 1.3rem;
            background: rgb(50, 84, 100);
            color: rgb(255, 255, 255);
            padding: 0.8rem 0.8rem;
            cursor: pointer;
            font-size: 1.2rem;
            outline: none;
            border: none;
            text-decoration: none;
        }

        .btn:hover {
            background: #3B8AC4;
        }

        body {
            background-image: url('td4.jpg');
            background-size: cover;
        }

        .flightlist {
            border-left: 3px solid rgb(8, 65, 129);
            border-right: 3px solid rgb(8, 65, 129);
            padding: 20px;
            background-image: url('td2.jpg');
            margin: auto;
            width: 50%;
        }

        .section1 {
            line-height: 0.3rem;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 0px;
            padding-bottom: 1px;
            border-top: 3px solid rgb(8, 65, 129);
            border-left: 3px solid rgb(8, 65, 129);
            border-right: 3px solid rgb(8, 65, 129);
            background-color: rgb(0, 51, 91);
            background-size: cover;
            margin: auto;
            width: 50%;
        }

        .section2 {
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 1px;
            padding-bottom: 1px;
            border-bottom: 3px solid rgb(8, 65, 129);
            border-left: 3px solid rgb(8, 65, 129);
            border-right: 3px solid rgb(8, 65, 129);
            background-color: rgb(0, 51, 91);
            background-size: cover;
            margin: auto;
            width: 50%;
        }

        #p1 {
            display: inline-block;
            padding-left: 30px;
        }

        #p3 {
            display: inline-block;
            padding-left: 30px;
            color: rgb(0, 4, 41);
            line-height: 0.3rem;
        }

        #p2 {
            display: inline-block;
            padding-left: 30px;
            padding-top: 15px;
            color: rgb(0, 52, 100);
        }

        h1 {
            color: rgb(250, 250, 250);
        }

        header {
            background: #030419;
            display: flex;
            padding: 1.5rem 4%;
            align-items: center;
            justify-content: space-between;
            box-shadow: rgb(227, 236, 241);
            border-bottom-right-radius: 0.4rem;
            border-bottom-left-radius: 0.4rem;
            z-index: 4;
        }

        header .logo {
            font-size: 3rem;
            color: rgb(255, 255, 255);
            font-weight: bolder;
            opacity: 0.8;
            outline: none;
            border: none;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <a href="main.php" class="logo">VIA</a>
    </header>
    <?php
    require "connection.php";
    require "session.php";
    // if (isset($_POST['done'])) 
    $tid = $_COOKIE['ticket_no'];
    $sql = "SELECT * FROM ticket t
        INNER JOIN passenger p
        ON t.passenger_id = p.pid
        INNER JOIN flight f
        ON t.flight_id = f.flight_no WHERE t.ticket_id='$tid'";

    $res = mysqli_query($con, $sql);
    if (!$res) {
        // echo "error1: " . mysqli_error();
        return;
    }
    $tickets = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach ($tickets as $ticket) {
    ?>
        <br> <br><br>
        <div class="section1">
            <b>
                <p id="p1" style="color: rgb(255, 255, 255);font-size: 25px;"><?php echo $ticket['fl_name'] ?></p>
            </b>
            <p id="p1" style="color: rgb(255, 255, 255);font-size: 25px;float: right;"><b> <?php echo $_COOKIE['ticket_no'] ?> </b></p>
        </div>
        <div class="flightlist">
            <p id="p3" style="font-size: 40px;color:rgb(0, 4, 41);"><b><?php echo $ticket['fl_source'] ?></b></p>
            <p id="p3" style="font-size: 40px;color:rgb(0, 4, 41);">&#8594</p>
            <p id="p3" style="font-size: 40px;color:rgb(0, 4, 41);"><b><?php echo $ticket['fl_destination'] ?></b></p>
            <br><br>
            <div style="font-family: Lucida Console, Courier New, monospace;">
                <p id="p1" style="text-align: left;color:rgb(0, 4, 41);"><b>Departure Time:</b><?php echo $ticket['fl_depart_time'] ?></p>
                <p id="p1"><b style="padding-right : 7px;color:rgb(0, 4, 41);">Arrival Time:</b><?php echo $ticket['fl_arr_time'] ?></p>
            </div>
            <div style="font-size: 17px;margin-top: 5px;font-family: Lucida Console, Courier New, monospace;line-height: 0.3rem;">
                <p id="p1" style="text-align: left;color:rgb(0, 4, 41);"><b>Name : </b> <?php echo $ticket['pfname'] ?></p>
                <p id="p1" style="text-align: right;color:rgb(0, 4, 41);"><b>Passport No. :</b><?php echo $ticket['psprt_no'] ?></p>
                <p id="p1" style="text-align: right;color:rgb(0, 4, 41);"><b>Passenger ID:</b><?php echo $ticket['pid'] ?></p>
            </div>
        </div>
        <div class="section2">
            <p style="color: rgb(0, 51, 91);;font-size: 5px;">F</p>
        </div>
        <br>
        <br>
    <?php
    }
    ?>
    <div style="text-align:center">
        <a href="cancelbooking.php" class="btn" value="cancel">Cancel</a>
        <a href="getid.php" class="btn" value="edit">Make changes </a>
        <a href="checkout.php" class="btn" value="proceed">Proceed </a>
    </div>
</body>

</html>