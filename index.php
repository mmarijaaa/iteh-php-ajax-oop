
<?php

include("log-reg/funkcija.php");

if(!isset($_SESSION["idkor"])) {
    header("Location: pocetna.php");
}

if(isset($_SESSION["idkor"])) {
    $idkorisnika = $_SESSION["idkor"];
    $korisnik = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE idkorisnika = '$idkorisnika'"));
    
}
/*else {
    header("Location: login.php");
}*/
?>

