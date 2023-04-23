<?php 
session_start();
include "../konekcija.php";
include "../klase/knjiga.php";

if(isset($_POST["id"])){
    $idknjige = $_POST["id"];
    $idkor = $_SESSION["idkor"]; 
    
    
    $status = false;
    $odaberi = mysqli_query($conn, "SELECT * FROM mojeknjige2 WHERE idknj = '$idknjige' AND idkor = '$idkor'");
    if(mysqli_num_rows($odaberi) == 1) {
        $status = Knjiga::ukloniKnjigu($conn, $idknjige);
    }
    else 
    {
        echo "greska";     
    }

    //$status = Knjiga::ukloniKnjigu($conn, $idknjige);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}
?>