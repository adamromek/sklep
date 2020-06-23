function licz_Z_brutto(x)
{
	x.cena_z.value =(x.bruttoZb.value) / ((+x.vatZb.value / 100) +1 )
}
 function marzaB(m) 
 {
 	m.cena_brutto.value =(m.cena_z.value) * ((m.vat.value / 100) +1) * ((m.marza.value /100) +1)
 }	