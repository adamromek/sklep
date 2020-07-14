function licz_Z_brutto(x)
{
	x.cena_z.value =(x.bruttoZb.value) / ((+x.vatZb.value / 100) +1 )
}
 function marzaB(m) 
 {
 	m.cena_brutto.value =(m.cena_z.value) * ((m.vat.value / 100) +1) * ((m.marza.value /100) +1)
 }	
 
  function marzaN(n) 
 {
 	n.cena_brutto.value =(n.cena_z.value) * ((n.vat.value / 100) +1) * ((n.marza.value /100) +1)
 }
 
  $(function () {
var btn = document.getElementById('button').style.visibility= "<?php print $button; ?>";
 
 if (button == btn.hidden) {
		document.getElementsByTagName('p').style.color="green";
 	} else {
 		"cosik nie wyszło";
 	}
 	
})