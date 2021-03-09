<?php
if (isset($_POST['submit'])) {
    include 'db.php';

    $vardas = $_POST['user'];
    $slaptazodis = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM vartotojai WHERE name='{$vardas}' AND password='{$slaptazodis}'");

    if (mysqli_num_rows($query) > 0) {
         setcookie("Prisijungimas", $vardas, time() + 60 * 60 * 4);
         
        header('Location: vidus.php');
        exit();
    } else {
        echo 'Neteisingi prisijungimo duomenys.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prisijungimas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h2><br>Danutės virtualaus supermarketo prisijungimo sistema<br><br></h2>
            <form action="prisijungimas.php" method="POST">
                <div class="form-group row">
                    <label for="user" class="col-sm-2 col-form-label">Vartotojas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user" name="user" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Slaptažodis</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="Prisijungti" name="submit" class="btn btn-primary"/>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>



