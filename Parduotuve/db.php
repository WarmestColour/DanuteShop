<?php
$con = mysqli_connect("localhost","root","","parduotuve");

// Check connection
if (mysqli_connect_errno()) {
  echo "Nepavyko prisijungti prie duomenų bazės: " . mysqli_connect_error();
  exit();
}
