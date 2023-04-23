<?php

require "konekcija.php"; 

class Autor {
    public $idautora;
    public $imeiprezime;

    public function __construct($idautora=null, $imeiprezime=null) {
        $this->idautora = $idautora;
        $this->imeiprezime = $imeiprezime;
    }

    public static function autor(mysqli $conn) {
        $query = "SELECT imeiprezime FROM autor";
        return $conn->query($query);
    }
}

?>