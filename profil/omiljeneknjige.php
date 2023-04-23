<?php

require "../konekcija.php";
require "../klase/knjiga.php";
require "../klase/mojeknjige.php";

session_start();

if(!isset($_SESSION["idkor"])){
    header('Location: login.php');
    exit();
}
$idkorisnika = $_SESSION["idkor"];
$korisnik = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE idkorisnika = '$idkorisnika'"));
$listamojihknjiga = MojeKnjige::prikaziSveMojeKnjige2($conn, $_SESSION["idkor"]); 

if(!$listamojihknjiga){
    echo "Error!";
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap'); /*'Montserrat', sans-serif;*/
@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap'); /*font-family: 'Kanit', sans-serif;*/
@import url('https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap'); /*font-family: 'Unbounded', cursive;*/
html,body{
    background-color: #f7f0c0;
    margin: 0;
    height:100%;
}
#sve {
    min-height: 100%;
    height: auto;
    margin-bottom: -150px;
}
#sve:after {
  content: "";
  display: block;
  height: 150px; /* the footer's total height */
}
#svecontent {
  height: 100%;
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

/*SCROLLBAR*/
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
    /*margin-top:30px;*/
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

/*OMILJENE KNJIGE TABELA*/

.mojeknjige {
    margin:auto;
    width:90%;
}
.mojeknjige h1 {
    font-size:40px;
    text-align:center;
    font-family: 'Montserrat', sans-serif;
    color:#bf370f;
}

table {
    width:100%;
    background-color:#fffdd0;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    /*overflow:hidden;*/
    margin-bottom:50px;
    border-collapse:collapse;
}
thead {
    width:100%;
    height:50px;
    background-color:#f7f0c0;
    opacity:0.9;
}
thead th {
    font-size:22px;
    font-family: 'Kanit', sans-serif;
    color:#bf370f;
    text-align:left;
}
tbody {
    width:100%;
}
tbody td {
    font-size:20px;
    font-family: 'Kanit', sans-serif;
    color:#3d426b;
}
tbody td img {
    height:30px;
}
th,td {
    padding:15px;
    
}
#ukl {
    height:20px;
}
</style>
<body>

<div id="sve">
<div id="svecontent">

<!--MENI-->

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
        <div class="linkovi">
            <a href="profilpocetna.php">KNJIGE</a>
            <a href="#">OMILJENE</a>
            <div class="dropdown">
            <a href="#" class="prof"><img src="slike/user.png"><p><?php echo $korisnik["username"]; ?></p></a>
                <div class="dropdown-content">
                    <a href="profilinfo.php">PROFIL</a>
                    <br>
                    <a href="../log-reg/logout.php">ODJAVI SE</a>
                </div>
            </div>
        </div>

    </div>   


    <!-- PRIKAZ ODABRANIH KNJIGA --> 
  
    <div class="mojeknjige" id="mojeknjige">
        <div class="mojeknjige2" id="mojeknjige2" style="overflow-x:auto;">

        <h1>MOJE ODABRANE KNJIGE</h1>

        <form class="ukc" action="" method="POST" >
        <table>
            <thead>
    
                <th></th>
                <th>AUTOR</th>
                <th>NAZIV KNJIGE</th>
                <th></th>
            </thead>  

            <tbody>

            <?php
            
            if(mysqli_num_rows($listamojihknjiga) > 0) {
                while($uzmi_knjige2 = mysqli_fetch_assoc($listamojihknjiga)) {
                    
            ?>
            <form class="ukc" action="" method="POST" >

            <tr id="ukloniknjigu" class="knjiga">
            <div id="ukloni" class="mojeodabrane">
                <td><img src="slike/book.png"></td>
                <td>
                    <?php echo $uzmi_knjige2["aut"]; ?>
                </td>
                <td>
                    <?php echo $uzmi_knjige2["naz"]; ?>
                </td> 
                <td>
                    
                    <input type="hidden" name="idknj" value="<?php echo $uzmi_knjige2["idknj"] ?>">
                    <a href="#" class="btnukloni" id="<?php echo $uzmi_knjige2["idknj"]?>" 
                    onclick="ukloni(<?php echo $uzmi_knjige2['idknj']?>)">
                    <img src="slike/clear.png" id="ukl">
                    </a>

                </td>
                </div>
            
            </tr>

            </form>

            </tbody>
            
            <?php  
                };
            };
        
            ?>
        </table>
        </div>
    </div>

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
                    <img class="dminsta" src="slike/insta.png" alt="inst">
                </div>
                <div class="facebook">
                    <img class="dmfb" src="slike/fb.png" alt="fb">
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

    //UKLONI KNJIGU IZ LISTE  

    function ukloni(id){
                var idukloni = id;
                const checked = document.getElementById(id);
                
                var info = 'id='+ idukloni;
                if(confirm("Da li ste sigurni da zelite da uklonite knjigu iz omiljenih?")){
                    req= $.ajax({
                       type: "POST",
                       url: "ukloni.php",
                       data: {'id':idukloni},
                    });

                    req.done(function(res, textStatus, jqXHR){
                    if(res=="Failed"){
                        console.log("Greska u brisanju!"+res);
                    alert("Greska u brisanju! ");
                   
                    }else {
                    $toHide= checked.closest('tr');
                    $toHide.remove();

                    console.log('Knjiga uklonjena iz omiljenih!');
                    }
                    console.log(res);
                    });
                }
        }

    

</script>

</body>
</html>


