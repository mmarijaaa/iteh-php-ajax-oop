<?php

session_start();
include '../konekcija.php';
require "../klase/korisnik.php";

if(isset($_POST["id"])) {
    extract($_POST);
    $idkor1 = $_POST["id"];
    $idkor = $_SESSION["idkor"]; 
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $lozinka = $_POST["lozinka"];
    $lozinkapot= $_POST["lozinkapot"];
    
    $status=false;
    if($lozinka == $lozinkapot) {
        $status = Korisnik::azurirajKorisnika($conn, $idkor, $ime,$prezime,$username,$email,$lozinka);
    }
    else {
        //echo $lozinkapot;
    }
    if ($status){
        echo "Success";

    }else{
        echo "Failed";
    }

}

?>