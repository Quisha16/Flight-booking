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
            background-image: url('fl1.jpg');
            background-size: cover;
            margin: auto;
            width: 50%;
        }

        #p1 {
            display: inline-block;
            padding-left: 30px;
            color: rgb(233, 198, 133);
        }

        #p2 {
            display: inline-block;
            padding-left: 30px;
            padding-top: 15px;
            color: rgb(233, 198, 133);
        }

        h1 {
            color: rgb(255, 255, 255);
        }

        .ffl {
            text-align: center;
        }

        .box1 {
    position: relative;
}

.box1 select {
    background-color: rgb(182, 219, 238);
    color: rgb(0, 30, 51);
    padding: 12px;
    width: 250px;
    border: none;
    font-size: 20px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
    -webkit-appearance: button;
    appearance: button;
    outline: none;
}

.box1 select option {
    padding: 30px;
}

.box2 {
    position: relative;
}

.box2 select {
    background-color: rgb(182, 219, 238);
    color: rgb(0, 30, 51);
    padding: 12px;
    width: 250px;
    border: none;
    font-size: 20px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
    -webkit-appearance: button;
    appearance: button;
    outline: none;
}

.box2 select option {
    padding: 30px;
}
    </style>
</head>
<body>
    <header>
        <a href="main.php" class="logo">VIA</a>
    </header>
    <br><br><br><br><br><br><br><br><br><br>
    <form action="flights.php" method="POST">
        <div class="ffl">
            <div>
                <label style="font-size:23px;
                color: rgb(0, 25, 60);
                text-shadow: 1px 1px 2px rgb(255, 255, 255);">Flying From</label>
                <div class="box1">
                <select name="from" class="custom-class" placeholder="City" style="opacity:1">
                    <option value="Goa">Goa</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="jaipur">jaipur</option>
                </select>
                </div>

                <label style="font-size:23px;
                color: rgb(0, 25, 60);
                text-shadow: 1px 1px 2px rgb(255, 255, 255);">Flying To </label>
                <div class="box2">
                <select name="to" class="custom-class" placeholder="City" style="opacity:1">
                    <option value="Goa">Goa</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">New Delhi</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Jaipur">Jaipur</option>
                </select>
                </div>
            </div>
            <br><br>
            <input type="submit" class="btnstyle" name="submit" value="Search flights">
        </div>
    </form>
    <br><br>
    <h1 style="text-align: center;text-shadow: 5px 5px 10px rgb(0, 0, 0);"><b>AVAILABLE FLIGHTS</b></h1>
    <br><br><br>
    <?php
    require "connection.php";
    if (isset($_POST['submit'])) {
        $i = 0;
        $to = $_POST['to'];
        $from = $_POST['from'];
        $sql = "SELECT * FROM flight WHERE fl_destination='$to' AND fl_source='$from'";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            // echo "error: " . mysqli_error();
            return;
        }
        $flights = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $ticket_id = rand(10000, 999999);
        setcookie("ticket_no", $ticket_id, time() + 3600);
        foreach ($flights as $flight) {
    ?>
            <div class="flightlist">
                <p id="p1" style="text-align: left">FLIGHT NAME : <b>
                        <?php echo $flight['fl_name'] ?>
                    </b></p>
                <p id="p1" style="text-align: left"><b>
                        <?php echo $flight['fl_source'] ?>
                    </b></p>
                <p id="p1">&#8594</p>
                <p id="p1"><b>
                        <?php echo $flight['fl_destination'] ?>
                    </b></p>
                <p id="p1" style="float: right"><b style="padding-right : 8px;color:rgb(255, 255, 255);">
                        <?php echo $flight['price'] ?>
                    </b></p>
                <br>
                <p id="p2">DEPARTURE TIME : <b>
                        <?php echo $flight['fl_depart_time'] ?>
                    </b></p>
                <p id="p2">DATE : <b>
                        <?php echo $flight['fl_departure_dt'] ?>
                    </b></p>''
                <a href="http://localhost/amfinal/booking.php?<?php echo "fno=" . $flight['flight_no'] ?>">
                    <input type="submit" class="btnstyle" value="book now" style="float: right;">
                </a>
            </div>
            <br><br>
    <?php
        }
    }
    ?>
</body>
</body>

</html>