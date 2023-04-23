<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">


//funkcija za registraciju korisnika
function submitData(){
    $(document).ready(function() {
        var data = {
            ime: $('#ime').val(),
            prezime: $('#prezime').val(),
            username: $('#username').val(),
            email: $('#email').val(),
            lozinka: $('#lozinka').val(),
            opetlozinka: $('#opetlozinka').val(),
            action: $('#action').val(),
        };

        $.ajax({
            url: 'funkcija.php',
            type: 'post',
            data: data,
            success:function(response) {
                alert(response);
                if(response == "Uspesna registracija!") {
                    window.location.reload();
                }
            }
        });
    });
}

//funckija za prijavu korisnika
function submitData2(){
    $(document).ready(function() {
        var data = {
            username: $('#username').val(),
            lozinka: $('#lozinka').val(),
            action: $('#action').val(),
        };

        $.ajax({
            url: 'funkcija.php',
            type: 'post', 
            data: data,
            success:function(response) {
                alert(response);
                if(response == "Uspesna prijava!") {
                    window.location.reload();
                }
            }
        });
    });
}
</script>