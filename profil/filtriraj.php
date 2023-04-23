<?php

require "konekcija.php";
require "knjiga.php";
require "zanrklasa.php";

if(isset($_POST['request'])) {

    $request = $_POST['request'];

    $query = "SELECT * FROM knjige,zanr,autor WHERE knjige.zanr=zanr.idzanra AND knjige.autor=autor.idautora AND zanr.nazivzanra = '$request'";
    $rezultat = mysqli_query($conn, $query);
    $brojac = mysqli_num_rows($rezultat);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap'); /*'Montserrat', sans-serif;*/
@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap'); /*font-family: 'Kanit', sans-serif;*/
@import url('https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap'); /*font-family: 'Unbounded', cursive;*/
/*KNJIGE*/
.filt {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
}

.knjige {
        /*flex: 0 1 25%; 0 ako ne zelimo da se siri div*/
    flex: 1 1 15%;
    max-width: 280px;
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
</style>
<body>
    <div class="filtrirano">


    <div class="filt">

        <?php
        if($brojac) {
        while($red = mysqli_fetch_assoc($rezultat)) {     
        ?>

        <div class="knjige" id="<?php echo $red["idknjige"]; ?>"> 

            <div class="slika">
                <?php echo '<img src="data:image/jpg;base64,'.base64_encode($red['naslovnica']). '"width="150" ; />' ?>
            </div>

            <div class="tekstknjige" id="<?php echo $red["idknjige"]; ?>">

            <h3 class="naziv"> <?php echo $red["naziv"]; ?> </h3>
            <h4 class="autor"> <?php echo $red["imeiprezime"]; ?> </h4>
            <h5 class="zanr">  <?php echo $red["nazivzanra"]; ?> </h5> 
            <button class="opis_knjige" id="btnopis">OPIS</button>

            
            <input type="hidden" name="naziv" value="<?php echo $red["naziv"]; ?>">
            <input type="hidden" name="imeiprezime" value="<?php echo $red["imeiprezime"]; ?>">
            <input type="hidden" name="zanr" value="<?php echo $red["nazivzanra"]; ?>">
            <input type="hidden" name="idmojeknjige" value="<?php echo $red["idknjige"] ?>">
            <input type="hidden" name="idautora" value="<?php echo $red["idautora"] ?>">

            <div id="divopisknjige" class="hidden">
            <h6 >KRATAK OPIS KNJIGE</h6>
            <p class="paragraph"  >
    
            </p>
            <button onclick="hideInfo()" style="position: absolute;top: 0;right: 0;margin: 7px;" ><b>X</b></button>
            </div>
            
            <button type="button" class="addbtn" id="addbtn" name="addbtn">SAČUVAJ U OMILJENE</button>
        </div> 

        </div>
        <?php       
            };
        ?>
    </div>


    <?php
    } else {
        echo "Izvinite! Nema knjiga u tom zanru!";
    }
    ?>

    </div>


<script type="text/javascript">

    //DUGME ZA DODAVANJE U MOJE KNJIGE 

    $(".addbtn").click(function(){
        var elmId = $(this).parent().attr("id");
        
        console.log(elmId);
        req= $.ajax({
                type: "POST",
                url: "sacuvaneknjige.php",
                data: {"id":elmId},
            });

            req.done(function(res, textStatus, jqXHR){
            if(res=="Success"){
            alert('Knjiga sačuvana!');
            console.log('Sačuvana');
            }else {
            console.log("Greska prilikom čuvanja! " + res);
            alert("Knjiga je vec dodata u korpu!");
            }
            console.log(res);
        });
    });


    //DUGME ZA OPIS KNJIGE

    $(".opis_knjige").click(function() {
        console.log("Click");
        var elementId = $(this).parent().attr("id");
        //alert(elementId);
        var x = document.getElementById("divopisknjige");
        if (x.style.display === "none") {
        x.style.display = "block";
        
        req= $.ajax({
                type: "POST",
                url: "opisknjige.php",
                data: {'idknjige':elementId},
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