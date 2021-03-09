<?php
include 'db.php';

$vardas = $_COOKIE['Prisijungimas'];

if (!empty($_GET['add'])) {
    $add = $_GET['add'];
    
    $query = mysqli_query($con, "INSERT INTO cart_userid (vartotojo_id, prekes_id) VALUES ('".$vardas."', '".$add."')");
    
    $krepselis = "<a href='krepselis.php' class='btn btn-info float-right'>Krepšelis</a>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Danutė</title>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5 mb-4">Užpildykite apklausą ir gaukite nuolaidą kitam apsipirkimui!</h1>
            <div class="my-4 clearfix">
                Ar jau sudalyvavote mūsų apklausoje? <a href="klausimas.php" class="btn btn-primary btn-sm">Apklausa</a>
                <?php if (!empty($krepselis)) { echo $krepselis; } ?>
            </div>
        
            <ul class="list-group">
                <?php
                
                $getPrekes = mysqli_query($con, "SELECT * FROM prekes");
                
                foreach ($getPrekes as $preke) {
                    echo "
                    <li class='list-group-item clearfix'>
                        <span>".$preke['pavadinimas']."</span>
                        <a href='vidus.php?add=".$preke['prekes_ID']."' class='btn btn-primary btn-sm text-white float-right'>Į krepšelį</a>
                    </li>
                    ";
                }
                
                ?>
            </ul>
        </div>
    </body>
</html>
