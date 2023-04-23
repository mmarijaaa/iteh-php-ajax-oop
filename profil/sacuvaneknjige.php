<?php 
session_start();
include "../konekcija.php";
//include "mojeknjigeklasa.php";
include "../klase/knjiga.php";

if(isset($_POST["id"])){
    $idknjige = $_POST["id"];
    $idkor = $_SESSION["idkor"];

    $status = false;
    $odaberi = mysqli_query($conn, "SELECT * FROM mojeknjige2 WHERE mojeknjige2.idsacuvaneknjige = '$idknjige' AND mojeknjige2.idkor = '$idkor'");
    if(mysqli_num_rows($odaberi) > 0) {
        $status = false;
        echo "Knjiga vec postoji u listi omiljenih!";
    }
    else 
    {
        $status = Knjiga::ubaciKnjigu($idkor, $idknjige, $conn);    
    }
    
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}
?>