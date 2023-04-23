<?php

require "konekcija.php";
require "autor.php";

class Knjiga {

    public $idknjige;
    public $autor;
    public $naziv;
    public $opis;
    public $zanr;
    public $naslovnica;
    
    public function __construct($idknjige=null, $autor=null, $naziv=null, $opis=null, $zanr=null, $naslovnica=null) {
        $this->idknjige = $idknjige;
        $this->autor = $autor;
        $this->naziv = $naziv;
        $this->opis = $opis;
        $this->zanr = $zanr;
        $this->naslovnica = $naslovnica;
    }

    public static function prikaziSveKnjige(mysqli $conn) {
        $query = "SELECT knjige.idknjige, knjige.autor, knjige.naziv, knjige.opis, knjige.zanr, knjige.naslovnica, autor.idautora, autor.imeiprezime, zanr.idzanra, zanr.nazivzanra  FROM knjige,autor,zanr WHERE knjige.autor=autor.idautora AND knjige.zanr=zanr.idzanra ORDER BY knjige.naziv ASC";
        return $conn->query($query);
    } 

    public static function prikaziSveKnjige2(mysqli $conn, $idknj) {
        $query = "SELECT knjige.idknjige, knjige.autor, knjige.naziv, knjige.opis, knjige.zanr, knjige.naslovnica, autor.idautora, autor.imeiprezime, zanr.idzanra, zanr.nazivzanra  FROM knjige,autor,zanr WHERE knjige.autor=autor.idautora AND knjige.zanr=zanr.idzanra AND knjige.idknjige='$idknj'";
        return $conn->query($query);
    } 

    public static function filtriraj(mysqli $conn, $req) {
        $query = "SELECT * FROM knjige,zanr,autor WHERE knjige.zanr=zanr.idzanra AND knjige.autor=autor.idautora AND zanr.nazivzanra = '$req'";
        return $conn->query($query);
    }

    public static function prikaziOpisKnjige(mysqli $conn, $idknjige){
        $query = "SELECT opis FROM knjige WHERE idknjige='$idknjige'";
        $izabranaknjiga = mysqli_query($conn, $query);
        $row  = mysqli_fetch_array($izabranaknjiga);
        if(is_array($row)){
           
            $opis= $row['opis'];
            return $opis;
        }

    }

    public static function ubaciKnjigu($idkorisnika, $idknjige, mysqli $conn){
        $qu = Knjiga::prikaziSveKnjige2($conn, $idknjige);
        //$izabranaknjiga = mysqli_query($conn, $query);
        $row  = mysqli_fetch_array($qu);
        if(is_array($row)){
            $nazivknjige3 = $row["naziv"]; 
            $autorknjige3 =$row["imeiprezime"]; 
            //$naslovnicaknjige3 = $row["naslovnica"]; 
            $query = "INSERT INTO mojeknjige2 (idkor,idsacuvaneknjige,naz,aut) VALUES ('$idkorisnika','$idknjige','$nazivknjige3','$autorknjige3')";
            return $conn->query($query); 
        }

    }

    public static function ubaciKnjigu3($idkorisnika, $idknjige, $kol, $uk, mysqli $conn){
        $qu = Knjiga::prikaziSveKnjige2($conn, $idknjige);
        //$izabranaknjiga = mysqli_query($conn, $query);
        $row  = mysqli_fetch_array($qu);
        if(is_array($row)){
            $nazivknjige3 = $row["naziv"]; 
            $autorknjige3 =$row["imeiprezime"]; 
            $cenaknjige = $row["cena"];
            //$naslovnicaknjige3 = $row["naslovnica"]; 
            $query = "INSERT INTO mojeknjige2 (idkor,idsacuvaneknjige,naz,aut,cena,kolicina,ukupnacena) VALUES ('$idkorisnika','$idknjige','$nazivknjige3','$autorknjige3','$cenaknjige','$kol','$uk')";
            return $conn->query($query); 
        }

    }

    public static function ubaciKnjigu2($idkorisnika, $idknjige, mysqli $conn){
        $qu = Knjiga::prikaziSveKnjige2($conn, $idknjige);
        //$izabranaknjiga = mysqli_query($conn, $query);
        $row  = mysqli_fetch_array($qu);
        if(is_array($row)){
            $nazivknjige3 = $row["naziv"]; 
            $autorknjige3 =$row["imeiprezime"]; 
            $query = "INSERT INTO mojeknjige2 (idkor,idsacuvaneknjige,naz,aut) VALUES ('$idkorisnika','$idknjige','$nazivknjige3','$autorknjige3')";
            return $conn->query($query); 
        }

    }

    public static function ubaciKnjiguUKorpu($idkorisnika, $idknjige, mysqli $conn){
        $qu = Knjiga::prikaziSveKnjige2($conn, $idknjige); 
        //$izabranaknjiga = mysqli_query($conn, $query);
        $row  = mysqli_fetch_array($qu);
        if(is_array($row)){
            $nazivknjige3 = $row["naziv"]; 
            $autorknjige3 =$row["imeiprezime"]; 
            $naslovnicaknjige3 = $row["naslovnica"];
            $query = "INSERT INTO mojeknjige (idtrenutnogkorisnika,idsacuvaneknjige,nazivknjige,autorknjige,naslovnicaknjige) VALUES ('$idkorisnika','$idknjige','$nazivknjige3','$autorknjige3','$naslovnicaknjige3')";
            return $conn->query($query); 
        }

    }

    public static function ukloniKnjigu(mysqli $conn, $idknj) {
        $query = "DELETE FROM mojeknjige2 WHERE idknj='$idknj'";
        return $conn->query($query); 
    }

}

?>