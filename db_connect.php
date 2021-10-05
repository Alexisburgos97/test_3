<?php

/* Database connection start */
$servername = "pruebaformulario.atspace.co.uk";
$username = "3955280_test1";
$password = "Alexis12345";
$dbname = "test1";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Conexión Fallida: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Conexión Fallida: %s\n", mysqli_connect_error());
    exit();
}

?>