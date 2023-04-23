<?php 

$host = "localhost";
$db = "library";
$korisnik = "root";
$pass = "";

$conn = new mysqli($host, $korisnik, $pass, $db);

if($conn->connect_errno) {
    exit("Neuspesna konekcija: greska> ".$conn->connect_error.", err kod>".$conn->connect_errno);
}



?>