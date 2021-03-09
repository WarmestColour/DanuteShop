<?php
$vidurkis = "";

if (isset($_POST['submit'])) {
    include 'db.php';
    
    $vardas = $_COOKIE['Prisijungimas'];
    
    //$ats1 = (!empty($_POST['ats1']) ? $ats1 = $_POST['ats1']) : "");
    
    if (empty($_POST['ats1']) || empty($_POST['ats2']) || empty($_POST['ats3']) || empty($_POST['ats4']) || empty($_POST['ats5'])) {
        echo "Nepasirinkot visko jezus marija";
    } else {
       $vidurkis = ($_POST['ats1'] +  $_POST['ats2'] + $_POST['ats3'] + $_POST['ats4'] + $_POST['ats5']) / 5;
       
       $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT id FROM vartotojai WHERE name='".$vardas."' "));
       
       $query = mysqli_query($con, "INSERT INTO vertinimas (user_ID, vidurkis) VALUES ('".$user['id']."', '".$vidurkis."') ");
       
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <div class="container">
            <a href='vidus.php' class='mt-2 btn btn-primary'>Atgal į pradžią</a>
            <?php if(!empty($vidurkis)) { ?>
                <div class="mt-3 display-block alert alert-success text-dark text-center">Bendras vidurkis: <strong><?php echo $vidurkis; ?></strong></div>
            <?php } ?>
            <form action="klausimas.php" method="POST">
                <h3 class="mt-5">Kaip vertinate patirtį Danutėje?</h3>

                <input type="radio" name="ats1" value="1"> Labai blogai<br>
                <input type="radio" name="ats1" value="2"> Blogai<br>
                <input type="radio" name="ats1" value="3"> Vidutiniškai<br>
                <input type="radio" name="ats1" value="4"> Gerai<br>
                <input type="radio" name="ats1" value="5"> Puikiai<br>

                <h3 class="mt-5">Kaip vertinate asortimentą virtualiame ateities supermarkete?</h3>

                <input type="radio" name="ats2" value="1"> Labai blogai<br>
                <input type="radio" name="ats2" value="2"> Blogai<br>
                <input type="radio" name="ats2" value="3"> Vidutiniškai<br>
                <input type="radio" name="ats2" value="4"> Gerai<br>
                <input type="radio" name="ats2" value="5"> Puikiai<br>

                <h3 class="mt-5">Kaip vertinate užsakytų prekių kokybę?</h3>

                <input type="radio" name="ats3" value="1"> Labai blogai<br>
                <input type="radio" name="ats3" value="2"> Blogai<br>
                <input type="radio" name="ats3" value="3"> Vidutiniškai<br>
                <input type="radio" name="ats3" value="4"> Gerai<br>
                <input type="radio" name="ats3" value="5"> Puikiai<br>

                <h3 class="mt-5">Kaip tikėtina, kad rekomenduotumėte Danutę draugui?</h3>

                <input type="radio" name="ats4" value="1"> Visai netikėtina<br>
                <input type="radio" name="ats4" value="2"> Veikiau netikėtina<br>
                <input type="radio" name="ats4" value="3"> Vidutiniškai<br>
                <input type="radio" name="ats4" value="4"> Visai tikėtina<br>
                <input type="radio" name="ats4" value="5"> Labai tikėtina<br>

                <h3 class="mt-5">Kaip jums bendras elektroninės prekybos salės vaibas?</h3>

                <input type="radio" name="ats5" value="1"> Nekažką<br>
                <input type="radio" name="ats5" value="2"> Veikiau nekažką<br>
                <input type="radio" name="ats5" value="3"> Vidutiniškai<br>
                <input type="radio" name="ats5" value="4"> Visai neprastas<br>
                <input type="radio" name="ats5" value="5"> Puikus<br>

                <button type="submit" name="submit" class="mt-3 btn btn-success">Pateikti</button>
            </form>
        </div>
    </body>
</html>
