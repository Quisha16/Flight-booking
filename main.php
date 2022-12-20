<?php
session_start();
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
            background-image: url('loginimg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        p {
            padding-left: 30px;
            color: rgb(255, 255, 255);
            font-size: 140px;
        }

        header .icons a {
            font-size: 1.4rem;
            padding: 0 1.8rem;
            color: rgb(255, 255, 255);
            opacity: 0.8;
        }

        header .icons a:hover {
            color: var(--blue);
        }
    </style>
</head>

<body>
    <header>
        <a href="#" class="logo">VIA</a>
        <nav class="navigationbar">
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
                <a href="flights.php">Book Tickets</a>
            <?php
            } else {
            ?>
                <a href="login.php">Book Tickets</a>
            <?php
            }
            ?>
        </nav>
        <div class="icons">
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
                <a href="logout.php">logout</a>
            <?php
            } else {
            ?>
                <a href="login.php">log in</a>
            <?php
            }
            ?>
        </div>

    </header>
    <br>
    <br>
    <br>
    <br>
    <p style="opacity:0.7"><b>Book your</b></p>
    <p style="opacity:0.9"><b>flights with</b></p>
    <p><b>ease</b></p>
    <br>
    <br>

</html>