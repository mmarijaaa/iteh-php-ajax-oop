<?php

require "../konekcija.php";


class MojeKnjige {
    
    public $idmojeknjige;
    public $idtrenutnogkorisnika;
    public $nazivknjige;
    public $autorknjige;
    public $naslovnicaknjige;

    public function __construct($idmojeknjige=null,  $idtrenutnogkorisnika=null, $nazivknjige=null, $autorknjige=null, $naslovnicaknjige=null) {
        $this->idmojeknjige = $idmojeknjige;
        $this->idtrenutnogkorisnika =  $idtrenutnogkorisnika;
        $this->nazivknjige = $nazivknjige;
        $this->autorknjige = $autorknjige;
        $this->naslovnicaknjige = $naslovnicaknjige;
    }

    public static function prikaziSveMojeKnjige2(mysqli $conn, $idk) {
        $query = "SELECT * FROM mojeknjige2 WHERE mojeknjige2.idkor='$idk' ORDER BY mojeknjige2.naz ASC";
        return $conn->query($query);  
    } 

    public static function obrisiMojuKnjigu(mysqli $conn, $idk) {
        $query = "DELETE FROM mojeknjige WHERE idmojeknjige='$idk'";
        return $conn->query($query);
    }

}



?>