<?php

require 'funkcija.php';


if(isset($_SESSION["idkor"])) {
    header("Location: ../profil/profilpocetna.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap'); /*'Montserrat', sans-serif;*/
@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap'); /*font-family: 'Kanit', sans-serif;*/
@import url('https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap'); /*font-family: 'Unbounded', cursive;*/

body{
    background-color: #f7f0c0;
    margin: 0;
}
.meni {
    display: flex;
    flex-direction: row;
    height:65px;
    margin-bottom:20px;
}
.meni .menilogo {
    flex: 35%;
    color: #0b212f;
    padding-left: 20px;
    padding-top:25px;
    display:flex;
    flex-direction:row;
}
.meni .menilogo .icon img {
    height:32px;
}
.meni .menilogo .book {
    font-family: 'Unbounded', cursive;
    font-size:28px;
    color: #0b212f;
}
.meni .menilogo .attic {
    font-family: 'Unbounded', cursive;
    font-size:28px;
    color: #bf370f;
}
.meni .menilinkovi {
    flex: 30%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding-top:15px;
    padding-right:50px;
}
.meni .menilinkovi a{
    font-size:20px;
    text-decoration:none;
    padding:6px 25px;
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
    /*font-weight:bold;*/
}.meni .nista {
    flex:35%;
}
/*FORMA*/
.frm {
    display: flex;
    justify-content: center;
    align-items: center;
}
.forma {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction:column;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    height: 520px;
    width:800px;
}
.forma h1 {
    font-size:50px;
    text-align:center;
    font-family: 'Montserrat', sans-serif;
    color:#bf370f;
}
.forma .registerforma {
    display: flex;
    align-items: center;
    justify-content: center; 
    flex-direction:row;
}
.forma .registerforma .polja {
  display: flex;
  align-items: center;
  justify-content: center; 
  height: 40px;
  width: 300px; 
  padding: 10px;
  margin: 10px;
  border: none;
  outline: none;
  color: #f7f0c0;
  background-color: #f7f0c0;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.forma .registerforma .polja .inputpolje {
  background: none;
  border: none;
  outline: none;
  width: 100%;
  font-size: 18px;
  font-family: 'Kanit', sans-serif;
  align-items: center;
  justify-content: center; 
  padding: 10px;
}
.forma .registerforma .polja .inputpolje::-ms-input-placeholder {
    color: #bf370f;
  justify-content: left; 
  text-align: left;
  color: black;
  padding-top: 30px;
}
.forma #regitserdugme {
    background-color: #f7f0c0;
    border-radius: 40px;
    padding: 6px 18px;
    margin-left:7px;
    margin-top: 10px;
    margin-right:7px;
    border: 2px solid #bf370f;
    outline: none;
    cursor: pointer;
    color: #3d426b;
    font-size:22px;
    text-decoration:none;
    font-family: 'Kanit', sans-serif;
}
.forma #regitserdugme:hover {
    background-color: #bf370f;
    color: #fffdd0;
}
.forma p {
    color: #3d426b;
    font-size:20px;
    font-family: 'Montserrat', sans-serif;
}
.forma a  {
    color:#bf370f;
    font-size:22px;
    font-family: 'Montserrat', sans-serif;
    padding-bottom:20px;
}
</style>

<body>

    <div class="meni">
        <div class="menilogo">
            <div class="icon">
                <img src="slike/book.png">
            </div>
            <div class="book">
                Book
            </div>
            <div class="attic">
                Attic
            </div>
        </div>
        <div class="menilinkovi">
            <a href="pocetna.php">POČETNA</a>
            <a href="pocetnaknjige.php">KNJIGE</a>
            
        </div> 
        <div class="nista">
        </div>
        
    </div>
    <div class="frm">
    <div class="forma">
        <h1>REGISTRACIJA</h1>
        <form autocomplete = "off" method = "POST" action = "" role="form" class="registerforma" id="registerfrm">
            <input type="hidden" id="action" value="register">

        <div class="prvi">
            
            <div class="polja">
                <input type = "text" name = "ime" class = "inputpolje" id="ime" placeholder="Unesite ime" >
            </div>
        
            <div class="polja">
                <input type = "text" name = "prezime" class = "inputpolje" id="prezime" placeholder="Unesite prezime" >
            </div>
            
            <div class="polja">
                <input type = "text" name = "username" class = "inputpolje" id="username" placeholder="Unesite korisnicko ime" required>
            </div>
        </div>

        <div class="drugi">
            
            <div class="polja">
                <input type = "text" name = "email" class = "inputpolje" id="email" placeholder="Unesite email" required>
            </div>
            
            <div class="polja">
                <input type = "password"  name = "lozinka" class = "inputpolje" id="lozinka" placeholder="Unesite lozinku" >
            </div>
            
            <div class="polja">
                <input type = "password"  name = "opetlozinka" class = "inputpolje" id="opetlozinka" placeholder="Potvrdite lozinku" >
            </div>
        </div>
        

        </form>
        <button type = "button" onClick = "submitData();" name = "submit" id = "regitserdugme" class="btnRegistruj">REGISTRUJTE SE</button>

        <p>Vec imate nalog?</p>
        <a href="login.php" id="btnlog">Prijavite se!</a>
        <?php require 'skripta.php'; ?>
        
    </div>
    </div>


</body>
</html>