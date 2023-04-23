<?php

include("../log-reg/funkcija.php");
require "../klase/knjiga.php";
require "../konekcija.php"; 
require "../klase/zanrklasa.php";


//ISPISI IME I PREZIME KORISNIKA

if(isset($_SESSION["idkor"])) {
    $idkorisnika = $_SESSION["idkor"];
    $korisnik = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE idkorisnika = '$idkorisnika'"));
    
}
else {
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
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
    height:70px;
    margin-bottom:20px;
}
.meni .menilogo {
    flex: 65%;
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
.meni .linkovi {
    flex: 35%;
    display:flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    border-bottom: 2px solid #3d426b;
    padding-right:20px;
}
.meni .linkovi a{
    font-size:20px;
    text-decoration:none;
    margin-top:6px;
    padding-left: 25px;
    padding-right: 25px;
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
}
.meni .linkovi img {
    height:30px;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f7f0c0;
  min-width: 150px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown img {
    height:40px;
    padding-top:3px;
}
.dropdown p {
    padding-top:3px;
    padding-left:10px;
    margin:0;
}
.prof {
    display:flex;
    flex-direction:row;
}

/*KNJIGE*/
.knjigesve {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
}
.knjige {
        /*flex: 0 1 25%; 0 ako ne zelimo da se siri div*/
    flex: 1 1 15%;
    width: 300px;
    height: 480px;
    background-color: #f7f0c0;
    display: flex;
    flex-direction: column;
    margin: 10px;
    padding:15px;
    justify-content:center;
    align-items:center;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.knjige .slika {
    flex:50%;
    
}
.knjige .tekstknjige {
    flex:50%;
    display: flex;
    flex-direction: column;
    justify-content:center;
    align-items:center;
}
.knjige .tekstknjige img{
    height:30px;
}
.knjige .tekstknjige #addbtn {
    background-color: #f7f0c0;
    border-radius: 30px;
    padding: 6px 15px;
    margin-top:10px;
    margin-bottom:10px;
    margin-left:5px;
    margin-right:5px;
    border: 2px solid #bf370f;
    outline: none;
    cursor: pointer;
    color: #3d426b;
    font-size:18px;
    text-decoration:none;
    font-family: 'Kanit', sans-serif;
}
.knjige .tekstknjige #addbtn:hover {
    background-color: #bf370f;
    color: #fffdd0;
}
.knjige .tekstknjige #btnopis {
    background-color: #f7f0c0;
    border-radius: 30px;
    padding: 6px 15px;
    margin-top:10px;
    margin-left:5px;
    margin-right:5px;
    border: 2px solid #bf370f;
    outline: none;
    cursor: pointer;
    color: #3d426b;
    font-size:20px;
    text-decoration:none;
    font-family: 'Kanit', sans-serif;
}
.knjige .tekstknjige #btnopis:hover {
    background-color: #bf370f;
    color: #fffdd0;
}
.knjige .tekstknjige h3 {
    text-align:center;
    font-size: 20px;
    font-family: 'Montserrat', sans-serif;
    color: #3d426b;
    margin:0;
    padding:5px;
}
.knjige .tekstknjige h4 {
    text-align:center;
    font-family: 'Kanit', sans-serif;
    font-size: 19px;
    font-style:italic;
    color: #bf370f;
    margin:0;
}
.knjige .tekstknjige h5 {
    text-align:center;
    font-family: 'Kanit', sans-serif;
    font-size: 18px;
    color: #3d426b;
    margin:0;
}
#divopisknjige {
    display: none;
    position: fixed;
    top: 50%;
    left: 30%;
    right: auto; 
    z-index: 1;
    background-color: #fffdd0;
    border-radius:5px;
    border: 3px solid #bf370f;
    width: 500px;
}
#divopisknjige h6 {
    font-size: 20px;
    margin-top: 10px;
    text-align: center;
    margin-bottom: 5px;
    font-family: 'Montserrat', sans-serif;
    color:#bf370f;
}
#divopisknjige p{
    line-height: 1.4;
    margin: 15px;
    font-size: 18px;
    letter-spacing: 0.5px;
    font-family: 'Kanit', sans-serif;
    color:#3d426b;
    text-align: center;
}
.pretraga_knjiga {
    width: 400px;
}
.idknjigesakriven {
    display: none;
}
.filtriranje {
    display:flex;
    flex-direction:row;
    justify-content:right;
    padding-top:20px;
    margin-right:10px;
}
.filtriranje a {
    font-size:20px;
    font-family:'Kanit', sans-serif;
    text-decoration:none;
    margin-right:15px;
    padding-left:15px;
    padding-right:15px;
    color:#fffdd0;
    background-color:#3d426b; 
}
.filtriranje #uhvatifilter {
    font-size:20px;
    font-family:'Kanit', sans-serif;
    color:#fffdd0;
    background-color:#3d426b;
    border:none;
    width:200px;
    padding-left:15px;
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
                <img src="../slike/book.png">
            </div>
            <div class="book">
                Book
            </div>
            <div class="attic">
                Attic
            </div>
        </div>
        <div class="linkovi">
            <a href="#">KNJIGE</a>
            <a href="omiljeneknjige.php">OMILJENE</a>
            <div class="dropdown">
            <a href="#" class="prof"><img src="../slike/user.png"><p><?php echo $korisnik["username"]; ?></p></a>
                <div class="dropdown-content">
                    <a href="profilinfo.php">PROFIL</a>
                    <br>
                    <a href="../log-reg/logout.php">ODJAVI SE</a>
                </div>
            </div>
        </div>

    </div>    
    

    <!-- FILTRACIJA --> 
    <div class="filtriranje">
        <a href="profilpocetna.php">Poništi filter</a> 
        <div id="filter">
            <select name="uhvatifilter" id="uhvatifilter">
                <option value="" disabled="" selected="">Filtriraj po zanru</option>
            
            <?php

        $listazanrova = Zanr::uzmiSveZanrove($conn);
        if(mysqli_num_rows($listazanrova) > 0) {
            while($uzmi_zanrove = mysqli_fetch_assoc($listazanrova)) {
    
        ?>
            <option value="<?php echo $uzmi_zanrove["nazivzanra"]; ?>"><?php echo $uzmi_zanrove["nazivzanra"]; ?></option>

            <?php       
            };
        };
        ?> 
        
            </select>
        </div>
    </div>
    <br>


    <!-- PRIKAZ SVIH KNJIGA --> 

    <div class="sveknjige" id="sveknjige">

        <div class="knjigesve" id="knjigesve">

        <?php
            $listaknjiga = Knjiga::prikaziSveKnjige($conn);
            if(mysqli_num_rows($listaknjiga) > 0) { 
                while($uzmi_knjige = mysqli_fetch_assoc($listaknjiga)) {    
        ?>

        <div class="knjige" id="<?php echo $uzmi_knjige["idknjige"]; ?>">

            <div class="slika">
                <?php echo '<img src="data:image/jpg;base64,'.base64_encode($uzmi_knjige['naslovnica']). '"width="150" ; />' ?>
            </div>

            <div class="tekstknjige" id="<?php echo $uzmi_knjige["idknjige"]; ?>">

            <h3 class="naziv" id="knaz"> <?php echo $uzmi_knjige["naziv"]; ?> </h3>
            <h4 class="autor"> <?php echo $uzmi_knjige["imeiprezime"]; ?> </h4>
            <h5 class="zanr">  <?php echo $uzmi_knjige["nazivzanra"]; ?> </h5>
            
            <button class="opis_knjige" id="btnopis">OPIS</button>

            <input type="hidden" id="knaz" value="<?php echo $uzmi_knjige["naziv"]; ?>"> 
            <input type="hidden" id="kaut" value="<?php echo $uzmi_knjige["imeiprezime"]; ?>">
            
            <input type="hidden" id="kkor" value="<?php echo $korisnik["idkorisnika"]; ?>">


            <div id="divopisknjige" class="hidden">
            <h6>KRATAK OPIS KNJIGE</h6>
            <p class="paragraph"></p>
            <button onclick="hideInfo()" style="position: absolute;top: 0;right: 0;margin: 7px;" ><b>X</b></button>
            </div>
            
            <button type="button" class="addbtn" id="addbtn" name="addbtn">
                SAČUVAJ U OMILJENE
            </button>

                </div>
            
        </div> 

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
                <h3>BookAttic</h3> 
            </div>
            <div class="dm">
                <div class="instagram">
                    <img class="dminsta" src="../slike/insta.png" alt="inst">
                </div>
                <div class="facebook">
                    <img class="dmfb" src="../slike/fb.png" alt="fb">
                </div>
            </div>
        </div>
        <div class="linkovi">
                <a href="" class="f">POČETNA</a>
                <a href="" class="f">KNJIGE</a>
                    
        </div>
        <div class="copyright">
            <h4>MarijaN15 &copy; All Rights Reserved<h4>
        </div>
    <footer>


<script type="text/javascript">

    //FILTRIRANJE KNJIGA 

    $(document).ready(function(){
        $('#uhvatifilter').on('change',function() {
            var vrednost = $(this).val();
            $.ajax ({
                url:"filtriraj.php", 
                type:"POST",
                data:'request=' + vrednost,
                beforeSend:function() {
                    $(".sveknjige").html("<span>Working...</span>");
                },
                success:function(data) {
                    $(".sveknjige").html(data);
                }
            });
        });
    });


    //DUGME ZA DODAVANJE U MOJE KNJIGE 

    $(".addbtn").click(function(){
        var idknj = $(this).parent().attr("id");
        
        console.log(idknj);
        req= $.ajax({
                type: "POST",
                url: "sacuvaneknjige.php",
                data: {"id":idknj},
            });

            req.done(function(res, textStatus, jqXHR){
            if(res=="Success"){
            alert('Knjiga sačuvana!');
            console.log('Sacuvana');
            }else {
            console.log("Greska prilikom čuvanja! " + res);
            alert("Knjiga je vec dodata u omiljene!");
            }
            console.log(res);
        });
    });


    //DUGME ZA OPIS KNJIGE

    $(".opis_knjige").click(function() {
        console.log("Click");
        var idknjige = $(this).parent().attr("id");
        
        var x = document.getElementById("divopisknjige");
        if (x.style.display === "none") {
        x.style.display = "block";
        
        req= $.ajax({
                type: "POST",
                url: "opisknjige.php",
                data: {'idknjige':idknjige},
            });

            req.done(function(res, textStatus, jqXHR){
            if(res=="Failed"){
            $(".paragraph").text("Ne postoji opis izabrane knjige!");
            }else {
            $(".paragraph").text(res);
            }
            console.log(res);
        });
        } else {
        x.style.display = "none";
        }
    });

    function hideInfo(){
        var x = document.getElementById("divopisknjige");
        x.style.display = "none";
        
    }


</script>



</body>
</html> 
