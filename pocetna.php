<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.naslovna {
    display:flex;
    height:520px;
}
.naslovna .slika {
    flex:50%;
    display:flex;
    justify-content: center;
    align-items: center; 
}
.naslovna .slika img{
    height:550px;
    padding-top:20px;
    /*filter: drop-shadow(5px 5px 5px #666666);*/
    filter: drop-shadow(5px 5px 5px #666666);
    margin-right:120px;
}
.naslovna .tekst {
    flex:50%;
    text-align:center;
    padding-top: 160px;
}
.naslovna .tekst h1{
    font-size: 55px;
    font-family: 'Montserrat', sans-serif;
    padding-left:60px;
    padding-right:40px;
    padding-bottom:15px;
    color: #0b212f;
}
.naslovna .tekst .dugme #btnknjige {
    background-color: #f7f0c0;
    border-radius: 40px;
    padding: 6px 18px;
    margin-left:7px;
    margin-right:7px;
    border: 2px solid #bf370f;
    outline: none;
    cursor: pointer;
    color: #3d426b;
    font-size:22px;
    text-decoration:none;
    font-family: 'Kanit', sans-serif;
}
.naslovna .tekst .dugme #btnknjige:hover {
    background-color: #bf370f;
    color: #fffdd0;
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
.naslov p {
    font-size:40px;
    text-align:center;
    padding-top:30px;
    font-family: 'Montserrat', sans-serif;
    color:#bf370f;
    margin:0;
}
.bestseleri {
    display:flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    padding-bottom:20px;
}
.bestseleri .knj {
    margin: 20px;
    height: 370px;
    width: 220px;
    display:flex;
    flex-direction:column;
    padding:10px;
    justify-content:center;
    align-items:center;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.bestseleri .knj p {
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
    font-size:19px;
}
.bestseleri .knj h5 {
    font-size: 15px;
    color: #bf370f;
    font-family: 'Montserrat', sans-serif;
    margin:0;
    font-style: italic;

}
.bestseleri img {
    height: 220px;
}
.drugi {
    background-color:#fffdd0;
}
.komentariclanova {
    background-color:#f7f0c0;
}
.komentariclanova .naslov2 p {
    font-size:40px;
    text-align:center;
    padding-top:30px;
    font-family: 'Montserrat', sans-serif;
    color:#bf370f;
}
.komentariclanova .komentari{
    display:flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
}
.komentariclanova .komentari .kom{
    margin: 20px;
    height: 170px;
    width: 400px;
    display:flex;
    flex-direction:column;
    padding:20px;
    justify-content:right;
    align-items:right;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.komentariclanova .komentari .kom p {
    font-family: 'Kanit', sans-serif;
    color: #3d426b;
    font-size:14px;
    font-style: italic;
}
.komentariclanova .komentari .kom h5 {
    font-family: 'Montserrat', sans-serif;
    font-size:16px;
    color:#bf370f;
    margin:0;
}
.komentariclanova .komentari .kom h6 {
    font-family: 'Montserrat', sans-serif;
    font-size:14px;
    color:#3d426b;
    margin:0;
}

.star {
    margin:15px;
}
.checked {
  color: orange;
}




</style>
<body>

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
        <div class="menilinkovi">
            <a href="3">POČETNA</a>
            <a href="pocetnaknjige.php">KNJIGE</a>
            

        </div>
        <div class="menilogreg">
            <form method="post" action="">
                <a href="login.php" id="btnlogin" >PRIJAVI SE</a>
                <a href="registracija.php" class="btnregister">REGISTRUJ SE</a>
            </form>
        </div>
    </div>

    <!--NASLOVNA-->

    <div class="naslovna">
        <div class="tekst">
            <div class="txt">
                <h1>Pronađi novu knjigu za svoju kolekciju</h1>
            </div>
            <div class="dugme">
                <a href="pocetnaknjige.php" id="btnknjige">PRONAĐI SVOJU KNJIGU</a>
            </div>
        </div>
        <div class="slika">
            <img src="slike/naslovna.png" alt="naslovna">
        </div>
    </div>

    <!--BESTSELLERS-->
    <div class="drugi">
    <div class="naslov">
        <p>NAJPRODAVANIJE KNJIGE</p>
    </div>
    <div class="bestseleri">
        <div class="knj">
            <img src="slike/hari3.jpg">
            <div class="star">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
            <p>Hari Poter i Dvorana tajni</p>
            <h5>J.K.Rouling</h5>
        </div>
        <div class="knj">
            <img src="slike/anakarenjina.jpg">
            <div class="star">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </div>
            <p>Ana Karenjina</p>
            <h5>Lav Nikolajevič Tolstoj</h5>
        </div>
        <div class="knj">
            <img src="slike/hobbit.jpg">
            <div class="star">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked"></span>
            </div>
            <p>Hobit</p>
            <h5>J.R.R. Tolkin</h5>
        </div>
    </div>
    </div>

    <!--KOMENTARI-->

    <div class="komentariclanova">
        <div class="naslov2">
            <p>KOMENTARI NAŠIH ČLANOVA</p>
        </div>
        <div class="komentari">
        <div class="kom">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud 
                exercitation ullamco laboris nisi ut aliquip ex ea 
                commodo consequat."</p>
            <h5>Hristina Hristic</h5>
            <h6>Student Filozofskog fakulteta</h6>
        </div>
        <div class="kom">
            <p>:Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud 
                exercitation ullamco laboris nisi ut aliquip ex ea 
                commodo consequat."</p>
            <h5>Marija Maric</h5>
            <h6>Profesor srpskog jezika</h6>
        </div>
        <div class="kom">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud 
                exercitation ullamco laboris nisi ut aliquip ex ea 
                commodo consequat."</p>
            <h5>Milica Micic</h5>
            <h6>Inzenjer informacionih tehnologija</h6>
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
                <a href="pocetna.php" class="f">POČETNA</a>
                <a href="pocetnaknjige.php" class="f">KNJIGE</a>
                            
        </div>
        <div class="copyright">
            <h4>MarijaN15 &copy; All Rights Reserved<h4>
        </div>
    <footer>
    

</body>
</html>