<?php
require "../konekcija.php";

session_start(); 

if(!isset($_SESSION["idkor"])){
    header('Location: login.php');
    exit();
}

$idkorisnika = $_SESSION["idkor"];
$korisnik = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registrovanikorisnici WHERE idkorisnika = '$idkorisnika'"));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil info</title>
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

/*PODACI O KORISNIKU*/
.infoupdateinput {
    display:flex;
    flex-direction:row;

}
.infoupdate h1 {
    font-size:40px;
    text-align:center;
    font-family: 'Montserrat', sans-serif; 
    color:#bf370f;
    /*padding-top:20px;*/
}
.info {
    display:flex;
    justify-content:center;
    align-items:center;
}
.polja {
  display: flex;
  align-items: center;
  justify-content: center; 
  height: 40px;
  width: 300px; 
  padding: 10px;
  margin: 15px;
  margin-bottom:20px;
  border: none;
  outline: none;
  color: #f7f0c0;
  background-color: #f7f0c0;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.polja .inputpolje {
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
.polja .inputpolje::-ms-input-placeholder {
    color: #bf370f;
  justify-content: left; 
  text-align: left;
  color: black;
  padding-top: 30px;
}
label {
    color:#3c426b;
    font-family: 'Kanit', sans-serif;
    font-size:18px;
    padding-bottom:10px;
}
.dugmad {
    display:flex;
    flex-direction:row;
    align-items: center;
    justify-content: center;
    padding-right:65px;
}
.dugmad .btnizmeni {
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
.dugmad .btnizmeni:hover {
    background-color: #bf370f;
    color: #fffdd0;
}
.dugmad #btnomoguci {
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
.dugmad #btnomoguci:hover {
    background-color: #bf370f;
    color: #fffdd0;
}

</style>
<body>

    <!--MENI-->

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
            <a href="profilpocetna.php">KNJIGE</a>
            <a href="omiljeneknjige.php">OMILJENE</a>
            <div class="dropdown">
            <a href="#" class="prof"><img src="../slike/user.png"><p><?php echo $korisnik["username"]; ?></p></a>
                <div class="dropdown-content">
                    <a href="#">PROFIL</a>
                    <br>
                    <a href="../log-reg/logout.php">ODJAVI SE</a>
                </div>
            </div>
        </div>

    </div>  
    
    <!--PODACI O KORISNIKU-->

    <div class="info">
    <div class="infoupdate" id="infoupdate">

        <h1>PODACI O KORISNIKU</h1>

    <form action="izmeni.php" method="POST">
        <div class="infoupdateinput">
        <input type="hidden" name="idkor" value="<?php echo $korisnik["idkorisnika"];  ?>">

        <div class="prvi">

        <label>IME:</label>
        <div class="polja" id="polje">
        <input type="text" name="ime" class = "inputpolje" id="kime" value="<?php echo $korisnik["ime"];  ?>" readonly="readonly">
        </div>
        
        <label for="">PREZIME:</label>
        <div class="polja">
        <input type="text" name="prezime" class = "inputpolje" id="kprezime" value="<?php echo $korisnik["prezime"];  ?> " readonly="readonly">
        </div>
        
        <label>KORISNICKO IME:</label>
        <div class="polja">
        <input type="text" name="username" class = "inputpolje" id="kusername" value="<?php echo $korisnik["username"];  ?>" readonly="readonly">
        </div>

        </div>
        <div class="drugi">

        <label>EMAIL:</label>
        <div class="polja">
        <input type="text" name="email" class = "inputpolje" id="kemail" value="<?php echo $korisnik["email"];  ?>" readonly="readonly">
        </div>

        <label>LOZINKA:</label>
        <div class="polja">
        <input type="text" name="lozinka" class = "inputpolje" id="klozinka" value="<?php echo $korisnik["lozinka"];  ?>" readonly="readonly">
        </div>

        <label>POTVRDI LOZINKU:</label>
        <div class="polja">
        <input type="text" name="lozinkapotvrda" class = "inputpolje" id="klozinkapotvrda" value="<?php echo $korisnik["lozinka"];  ?>" readonly="readonly">
        </div>

        </div>
        </div>

        <div class="dugmad">

        <button type="button" id="btnomoguci" onclick="omoguciIzmenu()">OMOGUCI IZMENU</button> 

        <input type="hidden" name="idknj" value="<?php echo $korisnik["idkorisnika"] ?>">
        <a href="#" class="btnizmeni" id="<?php echo $korisnik["idkorisnika"] ?>" 
        onclick="updateAjax(<?php echo $korisnik['idkorisnika'] ?>)">IZMENI SVE</a>

        </div>
    </form>
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

function refreshPage(){
    window.location.reload();
}

    //DUGME OMOGUCI IZMENU PODATAKA

  function omoguciIzmenu() {
      
      document.getElementById('kime').readOnly = false;
      document.getElementById('kprezime').readOnly = false;
      document.getElementById('kusername').readOnly = false;
      document.getElementById('kemail').readOnly = false;
      document.getElementById('klozinka').readOnly = false;
      document.getElementById('klozinkapotvrda').readOnly = false;
      console.log("uspelo");
      
  }
  const btn = document.getElementById('btnomoguci');

btn.addEventListener('click', function onClick(event) {
  const input = document.getElementById('kime');
  input.style.backgroundColor = '#fffdd0';
});
btn.addEventListener('click', function onClick(event) {
  const input = document.getElementById('kprezime');
  input.style.backgroundColor = '#fffdd0';
});
btn.addEventListener('click', function onClick(event) {
  const input = document.getElementById('kusername');
  input.style.backgroundColor = '#fffdd0';
});
btn.addEventListener('click', function onClick(event) {
  const input = document.getElementById('kemail');
  input.style.backgroundColor = '#fffdd0';
});
btn.addEventListener('click', function onClick(event) {
  const input = document.getElementById('klozinka');
  input.style.backgroundColor = '#fffdd0';
});
btn.addEventListener('click', function onClick(event) {
  const input = document.getElementById('klozinkapotvrda');
  input.style.backgroundColor = '#fffdd0';
});


  //AZURIRANJE PODATAKA 

  function updateAjax(id){
                var del_id = id;
                const checked = document.getElementById(id);
                var ime = document.getElementById("kime").value;
                var prezime = document.getElementById("kprezime").value;
                var username = document.getElementById("kusername").value;
                var email = document.getElementById("kemail").value;
                var lozinka = document.getElementById("klozinka").value;
                var lozinkapot = document.getElementById("klozinkapotvrda").value;

                
                var info = 'id='+del_id;
                if(confirm("Da li ste sigurni da zelite da izmenite Vase podatke?")){
                    req= $.ajax({
                       type: "POST",
                       url: "izmeni.php",
                       data: {'id':del_id,
                            'ime':ime,
                            'prezime':prezime,
                            'username':username,
                            'email':email,
                            'lozinka':lozinka,
                            'lozinkapot':lozinkapot},
                    });

                    req.done(function(res, textStatus, jqXHR){
                    if(res=="Failed"){
                        console.log("Greska prilikom izmene! "+res);
                        alert("Greska prilikom izmene! "); 
                        $("#infoupdate").load(location.href + " #infoupdate");
                   
                    } else {
                        $toHide= checked.closest('tr'); 
                    
                        console.log('Korisnik izmenjen');
                        alert("Podaci uspesno izmenjeni!");

                        $("#korisnikprofil").load(location.href + " #korisnikprofil");
                        $("#infoupdate").load(location.href + " #infoupdate");
                    
                    }
                    console.log(res);
                    });
                }
        }

    



</script>
</body>
</html>