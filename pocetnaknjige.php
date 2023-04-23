<?php

/*include("log-reg/funkcija.php");*/
require "konekcija.php";

$query = "SELECT knjige.idknjige, knjige.autor, knjige.naziv, knjige.opis, knjige.zanr, knjige.naslovnica, autor.idautora, autor.imeiprezime, zanr.idzanra, zanr.nazivzanra  FROM knjige,autor,zanr WHERE knjige.autor=autor.idautora AND knjige.zanr=zanr.idzanra ORDER BY knjige.naziv ASC";
$listaknjiga =  mysqli_query($conn,$query); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjige</title>
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

}
.meni .menilinkovi a{
    font-size:20px;
    text-decoration:none;
    padding:6px 25px;
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
    /*font-weight:bold;*/
}
.meni .menilogreg {
    flex: 35%;
    display: flex;
    flex-direction: row;
    align-items: center; 
    justify-content: right; 
    font-size:20px;
    text-decoration:none;
    padding:6px 20px;
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
    padding-top:15px;
    /*font-weight:bold;*/

}
.meni .menilogreg a {
    background-color: #f7f0c0;
    border-radius: 40px;
    padding: 6px 18px;
    margin-left:7px;
    margin-right:7px;
    border: 2px solid #3d426b;
    outline: none;
    cursor: pointer;
    color: #3d426b;
    text-decoration:none;
}
.meni .menilogreg a:hover {
    background-color: #3d426b;
    color: #fffdd0;
}
::-webkit-scrollbar {
    width: 10px;
}
::-webkit-scrollbar-track {
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb {
    background: #555;
}  
::-webkit-scrollbar-thumb:hover {
    background: #3d426b;
}

/*KNJIGE*/

.knjigesve {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    margin-top: 30px;
    padding-bottom:30px;
}
.knjige {
    /*flex: 0 1 25%; 0 ako ne zelimo da se siri div*/
    flex: 1 1 15%;
    width: 300px;
    height: 380px;
    background-color: #f7f0c0;
    display: flex;
    flex-direction: column;
    margin: 15px;
    padding:15px;
    justify-content:center;
    align-items:center;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.knjige .slika {
    flex:55%;
}
.knjige p {
    flex:25%;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
    font-size:20px;
    margin-bottom:0;
}
.knjige p #naziv{
    flex:25%;
    
}
.knjige h5 {
    flex:20%;
    text-align:center;
    font-size: 15px;
    color: #bf370f;
    font-family: 'Montserrat', sans-serif;
    margin-bottom:0;
    font-style: italic;

}
.knjige h5 #autor{
    flex:20%;
}

/*FOOTER*/
footer {
    display:flex;
    flex-direction:row;
    background-color:#3d426b;
    opacity: 0.85;
    margin-top:30px;
    height:150px;
}
footer .drustvenemreze {
    flex:30%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
footer .drustvenemreze .dm{
    display:flex;
    flex-direction:row;
    padding-bottom:30px;
}
footer .drustvenemreze #logofooter h3{
    color: #fffdd0;
    font-size: 15px;
    font-family: 'Unbounded', cursive;
}
footer .linkovi {
    flex:40%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
footer .linkovi .f {
    text-decoration:none;
    font-size: 18px;
    color:#fffdd0;
    font-family: 'Kanit', sans-serif;
    padding-bottom:10px;
}
footer .copyright {
    flex:30%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
footer .copyright h4{
    font-size:18px;
    color:#fffdd0;
    font-family: 'Montserrat', sans-serif;
    position:absolute;
}
.dminsta {
    width: 50px;
    height: 50px;
    padding-right:15px;
}
.dmfb {
    width: 50px;
    height: 50px;
    padding-left:15px;
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
            <a href="#">KNJIGE</a>
            

        </div>
        <div class="menilogreg">
            <a href="log-reg/login.php" class="btnlogin">PRIJAVI SE</a>
            <a href="log-reg/registracija.php" class="btnregister">REGISTRUJ SE</a>
        </div>
    </div>

    <!-- PRIKAZ SVIH KNJIGA --> 

    <div class="sveknjige" id="sveknjige">

        <div class="knjigesve">

        <?php
            //$listaknjiga = Knjiga::prikaziSveKnjige($conn);
            if(mysqli_num_rows($listaknjiga) > 0) { 
                while($uzmi_knjige = mysqli_fetch_assoc($listaknjiga)) {    
        ?>

        <form method="POST" class="knjige" action="">
                <div class="slika">
                    <?php echo '<img src="data:image/jpg;base64,'.base64_encode($uzmi_knjige['naslovnica']). '"height="230" ; />' ?>
                </div>
                <p id="naziv"> <?php echo $uzmi_knjige["naziv"]; ?> </p>
                <h5 id="autor"> <?php echo $uzmi_knjige["imeiprezime"]; ?> </h5>
            
        </form> 

        <?php       
            };
        };
        ?>

        
        </div>
    </div>

    <!--FOOTER-->

    <footer>
        <div class="drustvenemreze">
            <div id="logofooter">
                <h3>BibliotekaSova</h3> 
            </div>
            <div class="dm">
                <div class="instagram">
                    <img class="dminsta" src="slike/insta.png" alt="inst">
                </div>
                <div class="facebook">
                    <img class="dmfb" src="slike/fb.png" alt="fb">
                </div>
            </div>
        </div>
        <div class="linkovi">
                <a href="pocetna.php" class="f">POČETNA</a>
                <a href="pocetnaknjige.php" class="f">KNJIGE</a>
                    
        </div>
        <div class="copyright">
            <h4>MarijaN15 &copy; All Rights Reserved<h4>
        </div>
    <footer>
    
    
</body>
</html>