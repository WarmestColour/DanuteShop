<?php
session_start();
include "db.php";
$_SESSION['user'] = $_COOKIE['user'];
$user_ID = $_SESSION['user'];

$ats1 = $_SESSION['ats1'];
$ats2 = $_SESSION['ats2'];
$ats3 = $_SESSION['ats3'];
$ats4 = $_SESSION['ats4'];
$_SESSION['ats5'] = $_POST['ats5'];
$ats5 = $_SESSION['ats5'];


$vidurkis = ($ats1 + $ats2 + $ats3 + $ats4 + $ats5) / 5;
$rezultatas = "insert into `vertinimas` values ('$user_ID','$vidurkis')";
mysqli_query($con, $rezultatas)
        or die(mysqli_connect_error());
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Vertinimas</title>
    </head>
    <body>
        <div class="container">
            <?php echo "<h3>Dėkojame už jūsų atsakymus. Viso vidurkis: " . $vidurkis . "</h3>" ?>
            <form action="vidus.php">
                <input type="submit" value="Grįžti į parduotuvę" class="btn btn-primary"/>
            </form>
        </div>
    </body>
</html>



