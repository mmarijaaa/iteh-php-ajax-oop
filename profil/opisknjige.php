<?php 
session_start();
include "../konekcija.php";
include "../klase/knjiga.php";

if(isset($_POST['idknjige'])){
    $id = $_POST['idknjige'];
    $status= Knjiga::prikaziOpisKnjige($conn, $id);
    if ($status){
        echo $status;
    }else{
        echo "Failed";
    }
}

?>