<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Baza Sklepu ZooNet</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;width: 600px;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:0.3em;
  overflow:hidden;padding:5px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:1em;
  font-weight:normal;overflow:hidden;padding:5px 5px;word-break:normal;width: auto;}
.tg .tg-0lax{text-align:left;vertical-align:top;background-color: #BFBFBF;font-family:Arial, sans-serif;font-size:0.5em;}
</style>
<link type="text/css" href="css/style.css" rel="stylesheet" >
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<div id="pojemnik">

<header><h2>Wprowadzanie towaru - wyszukiwanie po indeksie, nazwie towaru lub kodach kreskowych</h2></header>
<!--
<table class="tg">

<thead>
  <tr>
  	 <th class="tg-0lax">Lp</th>
    <th class="tg-0lax">Indeks:</th>
    <th class="tg-0lax">Nazwa towaru</th>
    <th class="tg-0lax">Jm</th>
    <th class="tg-0lax">Ilość</th>
    <th class="tg-0lax">Cena netto zakupu</th>
    <th class="tg-0lax">VAT</th>
    <th class="tg-0lax">PKWiU</th>
    <th class="tg-0lax">Cena brutto sprzedaży</th>
    <th class="tg-0lax">Kod kreskowy</th>
    <th class="tg-0lax">Data zakupów</th>
   </tr>
</thead>
<tbody>
<form>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"><input id="indeks" type="text" name="indeks" /></td>
    <td class="tg-0lax"><input id="nazwa" type="text" name="nazwa" /></td>
    <td class="tg-0lax"><input id="jm" type="text" name="jm" /></td>
    <td class="tg-0lax"><input id="ilosc" type="text" name="ilosc" /></td>
    <td class="tg-0lax"><input id="cena" type="text" name="cena" /> </td>
    <td class="tg-0lax"><input id="vat" type="text" name="vat" /></td>
    <td class="tg-0lax"><input id="pkwiu" type="text" name="pkwiu" /></td>
    <td class="tg-0lax"><input id="cena_brutto" type="text" name="cena_brutto" /></td>
    <td class="tg-0lax"><input id="kodK" type="text" name="kodK" /></td>
    <td class="tg-0lax"><input id="data_zak" type="text" name="data_zak" /></td>
    
    
  </tr>
  <input class="btn" type="reset" value="Wyczyść rekord" ></form>
</form> 
</table> -->

<div id="form">
	 	<form action="admin_addrecord2.php" method="post" enctype="multipart/form-data"> 

 			<div id="faktura">


 	 	   <label class="lab" for="nr_faktury">Nr faktury</label>
 	      <input type="text" name="nr_faktury" value="<?php echo ($_SESSION['nr_faktury'])?>" />
	     
	      <label class="lab" for="data_zakF">Data zakupu</label>
		   <input type="text" name="data_zakF" value="<?php echo ($_SESSION['data_zak']) ?>"   />
        
         <label class="lab" for="id_f">Indeks faktury.   (może być nr faktury)</label>
         <input type="text" name="id_f" value="<?php echo ($_SESSION['id_f']) ?>"  />

         <label class="lab" for="indeks_dost">Indeks dostawcy</label>
         <input id="indeksD" type="text" name="indeks_dost" value="<?php echo ($_SESSION['indeks_dost']) ?>"  />
        
         <label class="lab" for="nazwa_dost">Nazwa dostawcy</label>
  		   <input id="nazwa1" type="text" name="nazwa_dost" value="<?php echo ($_SESSION['nazwa_dost']) ?>"  />
 		  
 		   <input type="submit" value="Dodaj fakturę" />

			</div>

			<div id="towar">

			<label class="lab" for="indeks">Indeks towaru</label>
			<input class="lab" id="indeksT" type="text" name="indeks"  value="<?php echo ($_GET['indeksT']) ?>"  required >

			<label class="lab" for="nazwa">Nazwa towaru</label>
			<input id="nazwaT" type="text" name="nazwaT" value="<?php echo ($_GET['nazwaT']) ?>" required >

			<label class="lab" for="Jm">Jm </label>
			<input id="jm" type="text" name="jm" value="szt" >
			
			<label for="ilosc">Ilość</label>
			<input id="ilosc" type="text" name="ilosc" value="<?php echo ($_GET['ilosc']) ?>"  required >
			
			
			<label class="lab">Cena netto wyliczana z brutto</label>
	<input type="text" name="bruttoZb" size="10" onkeyup="licz_Z_brutto(this.form)"> VAT lub RABAT 
	<input type="text" name="vatZb" size="5" onkeyup="licz_Z_brutto(this.form)"> Cena netto z wyliczenia: 
	<input type="text" name="nettoZb" size="10">
			
			<label class="lab">Cena netto</label>
			<input id="cena" type="text" name="cena_z" value="<?php echo ($_GET['cena_z']) ?> "  required >
			
			

			<label class="lab" for="pkwiu">PKWiU</label>
			<input id="pkwiu" type="text" name="pkwiu" value="<?php echo ($_GET['pkwiu']) ?>"  >
			
			<label class="lab" for="vat">VAT</label>
			<input id="vat" type="text" name="vat" value="<?php echo ($_GET['vat']) ?>"  required >

			<label class="lab" for="kod_k">Kod kreskowy</label>
			<input id="kodKT" type="text" name="kod_k" value="<?php echo ($_GET['kod_k']) ?>"  >
			
			<label class="lab" for="cena_brutto">Cena sprzedaży brutto</label> 
			<input type="text" id="cena_brutto" name="cena_brutto" value="<?php echo ($_GET['cena_brutto']) ?>"  required  >

        			<div id="button">               
						<button>Dodaj nowy towar...</button>
					</div> 
	</div>
	
	</form> 

</div>
</div>
<script>
$(function() {
    $("#nazwaT").autocomplete({
			minLength:3,
        source: "searchTowar.php",
             focus: function(event, ui) {
	               $("#nazwaT").val(ui.item.value);
	               $("#indeksT").val(ui.item.indeks);  //wyszukujemy po nazwie, równocześnie pokazuje indeks a dopiero po kliknięciu id
	               $("#jm").val(ui.item.jm);
	               $("#vat").val(ui.item.vat);
	               $("#ilosc").val(ui.item.ilosc);
	               $("#cena").val(ui.item.cena);
	               $("#cena_brutto").val(ui.item.cena_brutto);
	               $("#pkwiu").val(ui.item.pkwiu);  
	               $("#kodKT").val(ui.item.kodK);
	               $("#data_zak").val(ui.item.dataZak); 
                  return false;
         },
            select: function(event, ui) {
                 $("#nazwaT").val(ui.item.value);
                 $("#indeksT").val(ui.item.indeks);
                 $("#jm").val(ui.item.jm);
                 $("#vat").val(ui.item.vat);
                 $("#cena").val(ui.item.cena);
                 $("#ilosc").val(ui.item.ilosc);
                 $("#cena_brutto").val(ui.item.cena_brutto);
                 $("#pkwiu").val(ui.item.pkwiu);  
                 $("#kodKT").val(ui.item.kodKT);
                 $("#data_zak").val(ui.item.dataZak);
								// alert("Selected: " + ui.item.value + " aka " + ui.item.label); 
                return false;
            }
    });
});

$(function() {
    $("#indeksT").autocomplete({
			minLength:3,
        source: "searchIndeks.php",
             focus: function(event, ui) {
	               $("#nazwaT").val(ui.item.value);
	               $("#indeksT").val(ui.item.indeks);  //wyszukujemy po nazwie, równocześnie pokazuje indeks a dopiero po kliknięciu id
	           /*    $("#jm").val(ui.item.jm);
	               $("#vat").val(ui.item.vat);
	               $("#ilosc").val(ui.item.ilosc);
	               $("#cena").val(ui.item.cena);
	               $("#cena_brutto").val(ui.item.cena_brutto);
	               $("#pkwiu").val(ui.item.pkwiu); */
	               $("#kodKT").val(ui.item.kodKT);
	               //$("#stan_mag").val(ui.item.stan);  
                  return false;
         },
            select: function(event, ui) {
                 $("#nazwaT").val(ui.item.value);
                 $("#indeksT").val(ui.item.indeks);
                 $("#jm").val(ui.item.jm);
                 $("#vat").val(ui.item.vat);
                 $("#cena").val(ui.item.cena);
                 $("#ilosc").val(ui.item.ilosc);
                 $("#cena_brutto").val(ui.item.cena_brutto);
                 $("#pkwiu").val(ui.item.pkwiu);
                 $("#kodKT").val(ui.item.kodKT);
                 // $("#stan_mag").val(ui.item.stan);
                return false;
            }
    });
});   

$(function() {
    $("#kodKT").autocomplete({
			minLength:3,
        source: "searchKod.php",
             focus: function(event, ui) {
	               $("#nazwaT").val(ui.item.value);
	               $("#indeksT").val(ui.item.indeks);  //wyszukujemy po nazwie, równocześnie pokazuje indeks a dopiero po kliknięciu id
	             /*  $("#jm").val(ui.item.jm);
	               $("#vat").val(ui.item.vat);
	               $("#ilosc").val(ui.item.ilosc);
	               $("#cena").val(ui.item.cena);
	               $("#cena_brutto").val(ui.item.cena_brutto);
	               $("#pkwiu").val(ui.item.pkwiu); */
	               $("#kodKT").val(ui.item.kodKT);
	             //  $("#stan_mag").val(ui.item.stan);  
                  return false;
         },
            select: function(event, ui) {
                 $("#nazwaT").val(ui.item.value);
                 $("#indeksT").val(ui.item.indeks);
                 $("#jm").val(ui.item.jm);
                 $("#vat").val(ui.item.vat);
                 $("#cena").val(ui.item.cena);
                 $("#ilosc").val(ui.item.ilosc);
                 $("#cena_brutto").val(ui.item.cena_brutto);
                 $("#pkwiu").val(ui.item.pkwiu);
                 $("#kodKT").val(ui.item.kodKT);
               //   $("#stan_mag").val(ui.item.stan);
								 alert("Selected: " + ui.item.value + " aka " + ui.item.label); 
                return false;
            }
    });
});

$(function() {
    $("#nazwa1").autocomplete({
        source: "search2.php",
             focus: function(event, ui) {
					$("#indeksD").val(ui.item.idD);
               $("#nazwa1").val(ui.item.value);  //wyszukujemy po nazwie, równocześnie pokazuje indeks a dopiero po kliknięciu id
              // $("#kraj").val(ui.item.kraj);
               //$("#id_dostawcy").val(ui.item.id);
                return false;
         },
            select: function(event, ui) {
               $("#indeksD").val(ui.item.idD);
               $("#nazwa1").val(ui.item.value);
              // $("#kraj").val(ui.item.kraj);
               //$("#id_dostawcy").val(ui.item.id);
                return false;
            }
    });
});
</script>
<script src="script/funkcje.js" ></script>
</body>
</html>
