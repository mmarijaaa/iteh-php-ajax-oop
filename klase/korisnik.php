<?php

require "../konekcija.php"; 

class Korisnik {
    public $idkorisnika;
    public $ime;
    public $prezime;
    public $username;
    public $email;
    public $lozinka;

    public function __construct($idkorisnika=null, $ime=null, $prezime=null, $username=null, $email=null, $lozinka=null) {
        $this->idkorisnika = $idkorisnika;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->username = $username;
        $this->email = $email; 
        $this->lozinka = $lozinka;
    }

    public static function azurirajKorisnika(mysqli $conn,$idkor, $ime,$prezime,$username,$email,$lozinka) {
        $query = "UPDATE registrovanikorisnici SET ime='$ime', prezime='$prezime', username='$username', email='$email', lozinka='$lozinka' WHERE idkorisnika='$idkor'";
        return $conn->query($query);
    }

    public static function azurirajKorisnikaIme(mysqli $conn,$idkor, $ime, $prezime, $username) {
        $query = "UPDATE registrovanikorisnici SET ime='$ime', prezime='$prezime', username='$username' WHERE idkorisnika='$idkor'";
        return $conn->query($query); 
    }
}

?>