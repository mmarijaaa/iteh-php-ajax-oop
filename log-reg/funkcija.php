<?php

session_start();

include "../konekcija.php"; 

if(isset($_POST["action"])) {
    if($_POST["action"] == "register") {
        register();
    }
    if($_POST["action"] == "login") {
        login();
    }
}

//FUNKCIJA REGISTRACIJE

function register() {
    global $conn;

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $lozinka = $_POST["lozinka"];

    $opetlozinka = $_POST["opetlozinka"];

    //da li su polja popunjena
    if(empty($ime) || empty($prezime) || empty($username) || empty($email) || empty($lozinka)) {
        echo "Molim Vas popunite sva polja forme!";
        exit();
    }

    //uzimanje username i email iz baze 
    $korisnik = mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE username = '$username'");
    $korisnik2 = mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE email = '$email'");

    //provera da li vec postoji korisnicko ime
    if(mysqli_num_rows($korisnik) > 0) {
        echo "Korisnicko ime je vec zauzeto";
        exit();
    }

    //provera da li vec postoji email
    if(mysqli_num_rows($korisnik2) > 0) {
        echo "Email vec postoji!";
        exit();
    }

    //provera da li je ponovno unet lozinka dobra - potvrda lozinke
    if($lozinka != $opetlozinka) {
        echo "Niste uneli odgovarajucu lozinku! Pokusajte ponovo!";
        exit();
    }

    //unos u bazu podataka
    $query = "INSERT INTO registrovanikorisnici VALUES ('','$ime','$prezime','$username','$email','$lozinka')";
    mysqli_query($conn, $query);
    echo "Uspesna registracija!";
}


//FUNKCIJA LOGIN 

function login() {
    global $conn;

    $username1 = $_POST["username"];
    $lozinka1 = $_POST["lozinka"];

    //da li su popunjena sva polja
    if(empty($username1) || empty($lozinka1)) {
        echo "Molim Vas popunite sva polja za prijavu!";
        exit();
    }

    $korisnik3 = mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE username = '$username1'");

    //da li je odgovarajuca lozinka uneta za uneto korisnicko ime
    if(mysqli_num_rows($korisnik3) > 0) {
        $redizbaze = mysqli_fetch_assoc($korisnik3);
        if($lozinka1 == $redizbaze["lozinka"]) {
            echo "Uspesna prijava!"; 
            $_SESSION["login"] = true;
            $_SESSION["idkor"] = $redizbaze["idkorisnika"]; 
             
        }
        else {
            echo "Pogresili ste lozinku! Pokusajte ponovo!";
            exit();
        }
    }
    else 
    {
        echo "Korisnik nije registrovan!";
        exit();
    }

}


?>