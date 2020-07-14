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
	               //$("#data_zak").val(ui.item.dataZak);
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
                 //$("#data_zak").val(ui.item.dataZak);
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
	               $("#jm").val(ui.item.jm);
	               $("#vat").val(ui.item.vat);
	               $("#ilosc").val(ui.item.ilosc);
	               $("#cena").val(ui.item.cena);
	               $("#cena_brutto").val(ui.item.cena_brutto);
	               $("#pkwiu").val(ui.item.pkwiu);
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
					//			 alert("Selected: " + ui.item.value + " aka " + ui.item.label);
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
 $(document).ready(function () {
var btn = document.getElementById('button').style.visibility= "<?php print $button; ?>";
 
 if (button == btn.hidden) {
		document.getElementsByTagName('p').style.color="green";
 	} else {
 		"cosik nie wyszło";
 	}
 	
})

