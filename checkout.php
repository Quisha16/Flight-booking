<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-image: url(chk6.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .checkout {
            border: 3px solid #01263c;
            border-radius: 8px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            background-image: url(border3.jpg);
            background-size: cover;
            margin: auto;
            width: 40%;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
        }

        h1 {
            color: rgb(0, 3, 46);
        }


        #sname {
            font-size: 4rem;
            text-align: center;
            color: rgb(0, 51, 91);
            text-shadow: 3px 3px 7px rgb(100, 100, 100);
        }

        .dets {
            border-radius: 20px;
            padding-top: 25px;
            padding-bottom: 25px;
            background-color: rgb(223, 237, 255);
            background-size: cover;
            width: 90%;
            margin: auto;
        }

        .user {
            padding-left: 74px;
            color: rgb(0, 4, 41);
        }

        .btn {
            display: inline-flex;
            margin-top: 1rem;
            border-radius: 1rem;
            background: rgb(50, 84, 100);
            color: rgb(255, 255, 255);
            padding: 0.5rem 0.5rem;
            cursor: pointer;
            font-size: 1rem;
            outline: none;
            border: none;
            text-decoration: none;
        }

        .btn:hover {
            background: #3B8AC4;
        }
    </style>
</head>

<body>
    <br>
    <div class="checkout">
        <br><br><br><br>
        <p id="sname"><b>VIA</b></p>
        <P style="padding-left: 74px;font-size: 1.5rem;"><b>Checkout</b></P>
        <hr style="width:80%;text-align:center;">
        <br>
        <?php
        require "connection.php";
        // if (isset($_POST['proceed'])) 
        //{
        $tid = $_COOKIE['ticket_no'];
        $sql = "SELECT * FROM ticket t INNER JOIN user u ON t.user_id=u.user_id INNER JOIN flight f ON t.flight_id=f.flight_no WHERE t.ticket_id='$tid'";
        $result = mysqli_query($con, $sql);
        $query = "SELECT * FROM  ticket WHERE ticket_id='$tid'";
        $res = mysqli_query($con, $query);
        $row = mysqli_num_rows($res);



        if (!$result) {
            // echo "error: " . mysqli_error();
            return;
        }
        $chk = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($chk as $ticket) {
        ?>
            <p style="float: right;margin-right: 78px;"><b>Date :</b> 10-12-2022</p>
            <div class="user">
                <p><b>Name :</b><?php echo $ticket['user_fname'] ?></p>
                <p><b>Ph :</b><?php echo $ticket['user_ph_no'] ?></p>
                <p><b>email :</b><?php echo $ticket['user_email'] ?></p>
            </div>
            <br><br><br>
            <div class="dets">
                <span style="margin-left: 46px;"><b>Tickets Booked:</b></span>
                <span style="margin-right: 52px;float: right;"><?php echo $row ?></span>
                <br><br>
                <span style="margin-left: 46px;"><b>Price:</b></span>
                <span style="margin-right: 52px;float: right;"><?php echo $ticket['price'] ?></span>
                <br><br>
                <hr style="width:87%;text-align:center;">
                <br>
                <span style="margin-left: 300px;"><b>Total :</b></span>
                <span style="margin-right: 52px;float: right;"><?php echo $row * $ticket['price'] ?></span>
                <br>
            </div>
            <br>
            <div style="text-align: center;">
                <a href="thankyou.html" class="btn">Proceed</a></p>
                <br><br><br><br>
            </div>
        <?php
        }
        ?>
    </div>
    <br><br>
</body>

</html>