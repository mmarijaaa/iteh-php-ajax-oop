<?php

require "konekcija.php";

class Zanr 
{
    public $idzanra;
    public $nazivzanra;

    public function __construct($idzanra=null, $nazivzanra=null) {
        $this->idzanra= $idzanra;
        $this->nazivzanra = $nazivzanra;
    }

    public static function uzmiSveZanrove($conn) {
        $query = "SELECT * FROM zanr";
        return $conn->query($query);
    }
}

?>