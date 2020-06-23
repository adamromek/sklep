<?php
session_start();
//Utworzenie poĹ‚Ä…czenia

include_once 'db/connect.php';

if(empty($_SESSION["nr_faktury"]))$_SESSION["nr_faktury"] = $_GET["nr_faktury"];
	if(empty($_SESSION["data_zak"]))$_SESSION["data_zak"] = $_GET["data_zak"] ;
$sn1 = $_POST['nr_faktury'];
$sn2 = $_POST['data_zak'];
//$sn3 = $_POST['data2'];



//Instrukcja SQL wybierajÄ…ca rekordy

$stmt = $mysqli->prepare("SELECT  t.nazwa, t.id_towar, t.indeks, t.vat, t.pkwiu, t.jm, t.cena_brutto, thf.ilosc, thf.cena_n_z, f.nr_faktury, f.data_zak, d.stan_mag, k.kod_kreskowy
FROM towar t
LEFT  JOIN  (faktura f,  faktura_has_towar thf, dane_towaru d, kod_ean k)
ON (t.id_towar=thf.id_towar AND f.id_faktura=thf.id_faktura AND t.id_towar=d.id_towar AND t.id_towar=k.id_towar)
WHERE f.nr_faktury like '%$sn1%' AND f.data_zak	>= '$sn2'  ORDER BY t.nazwa");


$stmt->bind_param("sss", $sn1, $sn2, $sn3);
$stmt->bind_result( $nazwa, $id_towar, $indeks, $vat, $pkwiu, $jm, $cena_brutto, $ilosc, $cena_n_z, $nr_faktury,$data_zak,$stan_mag,$kod_kreskowy);
$stmt->execute();




//formatowanie wyniku
echo "<br /><table border=1 >";
echo "<tr>
<th>LP</th>
<th>Id towaru</th>
<th>Nazwa towaru</th>

<th>Indeks towaru</th>
<th>Miara</th>
<th>Ilość</th>
<th>Cena Zakupu</th>
<th>VAT</th>
<th>Brutto</th>
<th>PKWiU</th>
<th>Nr faktury</th>
<th>Data zakupu</th>
<th>Razem ilość</th>
<th>Kod kreskowy</th>
<th>Wartość netto</th>
<th>Cena sprzedaży brutto</th>
<th>Marża</th>
</tr>";

//formatowanie wyniku wierszami  długo szukałem błędu w warunkach for() i doszedłem że ma być ...$stmt->fech() bez żadnych dodatków
//również w <td> należało od razu wpisywać zmienne
for($lp = 1; $stmt->fetch(); ++$lp) {

$brutto =number_format((($cena_n_z*$vat/100)+$cena_n_z), 2, '.', '');
$razem = number_format(($cena_n_z * $ilosc), 2, '.', '');
$marza = number_format((( $cena_brutto / $brutto )*100-100), 2, '.', '');

	echo "<tr>
	<td>$lp</td>
   <td>$id_towar</td>
	<td>$nazwa</td>

	<td>$indeks</td>
	<td>$jm</td>
	<td>$ilosc</td>
	<td>$cena_n_z</td>
	<td>$vat</td>
	<td bgcolor='#ADD8E6'><font color='#FF0000'><strong> $brutto</strong></font></td>
	<td>$pkwiu</td>
	<td>$nr_faktury</td>
	<td>$data_zak</td>
	<td>$stan_mag</td>
	<td>$kod_kreskowy</td>
	<td>$razem</td>
	<td>$cena_brutto</td>
	<td>$marza</td>


	</tr>";


	$wy[] = $razem;		//Zmienna $wy jako tablica do której dopisujemy wartości z kolumny Wartość netto, zmienna $razem
	$tab = array_sum($wy);    //  Funkcją array_sum dodajemy wszystkie wystąpienia w kolumnie Wartość netto
	}

	echo "</table>";
	echo 'Nr faktury:   ', $nr_faktury,"<br />";
	echo "<div align='center'><strong>Razem netto = $tab</strong></div>";
	$ile = $stmt->num_rows();

	function iloscRecordow() {
			echo "Ile rekordów;" ;
		    }

		    echo "Ilość rekordów na fakturze;", $ile;
           return printf("<br /> Znaleziono : %d", $stmt->num_rows);
echo "Zmienione rekordy;", $stmt->affected_rows;
iloscRecordow();

echo "Affected rows: " . mysqli_affected_rows($stmt->fetch());

	$thread_id = $mysqli->thread_id;
	$stmt->free_result();
	$stmt->close();

$mysqli->close();
?>
