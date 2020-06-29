<?php
session_start();
//session_register('dostawcy');
$_SESSION['dostawcy'] == 1;
//session_start(); //$_SESSION['nazwa'] = wartosc;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Dostawcy</title>
<!-- jQuery UI library -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="css/style.css" type="text/css" rel="stylesheet" media="all" />
</head>
<body>

<?php
// dane dostawców
echo "Dzisiajsza data ";
include("script/data.js");

 ?>
<form action="index.php" metod="post" enctype="multipart/form-data">

<div id="faktura">

    <label for="nr_faktury">Nr faktury</label>
       <input type="text" name="nr_faktury"  autofocus size="20" maxlength="30" tabindex="5" required/><br>

    <label for="id_f">Indeks faktury.   (może być nr faktury)</label>
       <input type="text" name="id_f" size="30" maxlength="30" tabindex="7" placeholder="nr_faktury" required/><br>
    <label for="data_zak">Data zakupu</label>
       <input type="date" name="data_zak" size="15" /><br>

    <label for="nazwa_dost">Nazwa dostawcy</label>
       <input id="nazwa1" type="text" name="nazwa_dost" size="30" maxleng="30" tabindex="9" required/>

    <label for="indeks_dost">Indeks dostawcy</label>
       <input id="indeksD" type="text" name="indeks_dost"  size="30" maxlength="30"tabindex="8" required/><br>

	    <input type="submit" value="Dodaj fakturę" />

 </div>
</form>

<script>
$(function() {
    $("#nazwa1").autocomplete({
        source: "search2.php",
             focus: function(event, ui) {
				   $("#indeksD").val(ui.item.idD);
               $("#nazwa1").val(ui.item.value);  //wyszukujemy po nazwie, równocześnie pokazuje indeks a dopiero po kliknięciu id
               //$("#kraj").val(ui.item.kraj);
               //$("#id_dostawcy").val(ui.item.ind);
                return false;
         },
            select: function(event, ui) {
               $("#indeksD").val(ui.item.idD);
               $("#nazwa1").val(ui.item.value);
               //$("#kraj").val(ui.item.kraj);
               //$("#id_dostawcy").val(ui.item.ind);
                return false;
            }
    });
});
</script>

</body>
</html>
