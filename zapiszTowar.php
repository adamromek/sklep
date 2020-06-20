<html>
<head>
<meta charset="utf-8" />
<title>Zapis rekordu</title>
<link href="style/multi_drop_menus_class.css" type="text/css" rel="stylesheet" media="all" />
 
<style type="text/css">
    body {
        font-family: Times New Roman, serif;
        font-size: medium;
        
    }
    table {
        font-size: 100%;
        border-collapse: collapse;
        border: 1px solid black;
        margin: 20px auto;
    }

    th {
        border: 1px solid black;  
     }  
  
    td {
        border: 1px solid black;
        vertical-align: top;
        padding: 5px;
    }
    

   
    h1 {
        text-align: center;
    }

    

button {
	border-bottom: 10;
} 
        
    }
    </style>
</head>
<body>

<?php
// Łączymy się z serwerem 

include_once "db/connect.php";

 if (isset($_POST['indeks']) && isset($_POST['nazwa']) )
            {
                if (!empty($_POST['indeks']) && !empty($_POST['nazwa']) )
              {
                $nr_faktury = filter_var($_POST['nr_faktury'], FILTER_SANITIZE_STRING);
                $data_zak = filter_var($_POST['data_zak'], FILTER_SANITIZE_STRING);    
                $id_f = filter_var($_POST['id_f'], FILTER_SANITIZE_STRING);    
                $indeks_dost = filter_var($_POST['indeks_dost'], FILTER_SANITIZE_STRING);
                $nazwa_dost = filter_var($_POST['nazwa_dost'], FILTER_SANITIZE_STRING);    
                    
                $indeks = filter_var($_POST['indeks'], FILTER_SANITIZE_STRING);       
         		 $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
         		// $nazwa =($_POST['nazwa']);
   				 $jm = filter_var($_POST['jm'], FILTER_SANITIZE_STRING);
   				 $pkwiu = filter_var($_POST['pkwiu'], FILTER_SANITIZE_STRING);
   				 $vat = filter_var($_POST['vat'], FILTER_SANITIZE_STRING);
                $ilosc = filter_var($_POST['ilosc'], FILTER_SANITIZE_STRING);
                $cena_z = filter_var($_POST['cena_z'], FILTER_SANITIZE_STRING);
                
                $kod_k = filter_var($_POST['kod_k'], FILTER_SANITIZE_STRING);
                $cena_brutto = filter_var($_POST['cena_brutto'], FILTER_SANITIZE_STRING);
 	              if ($indeks && $nazwa) 
 	               {
                       
                        echo "<br /> Spróbuj ponownie <a href='index.php'>tutaj</a>";
			echo "<table border=1>
			<tr>
                        <th>Nr Faktury</th>
                        <th>Data zakupu</th>
                        <th>Indeks faktury</th>
                        <th>Indeks dostawcy</th>
                        <th>Nazwa Dostawcy</th>
                        
                        <th>Nazwa towaru</th>  
                        <th>Indeks</th>                 
                        <th>Jm</th>
                        <th>Ilość</th>
                        <th>Cena zakupu netto</th>
                        <th>PKWiU</th>
                        <th>VAT</th>
                        <th>Kod kreskowy</th>
                        <th>Cena sprzedaży brutto</th>
                        
			</tr>
								
                        <tr>
                        <td>$nr_faktury</td>
                        <td>$data_zak </td>
                        <td>$id_f </td>   
                        <td>$indeks_dost</td>
                        <td>$nazwa_dost</td>
                        
                        <td>$nazwa</td>
                        <td>$indeks</td>
                        <td>$jm</td>
                        <td>$ilosc</td>
                        <td>$cena_z</td>        
                        <td>$pkwiu</td>
                        <td>$vat</td>
                        <td>$kod_k</td>
                        <td>$cena_brutto</td>
                            
                        </tr>
                        </table>";

}
}
}

echo "<br />Indeks dostawcy:".$indeks_dost."<br />";
echo " Nazwa dostawcy; ". $nazwa_dost."<br />";

/***************************** wpiszemy dostawców  *******************************/
		$stmt = $mysqli->prepare("SELECT id_dostawcy, indeks, nazwa1 FROM dostawcy WHERE nazwa1 = ? ");
		$stmt->bind_param('s', $nazwa_dost);
		$stmt->execute();
		$stmt->bind_result($id_dostawcy, $indeks_d, $nazwa1);
		$stmt->fetch();
		$stmt->close();

if($nazwa1) {	
	printf("<br />Jest taki dostawca : %s ", $nazwa1 );
	} else {	       
$stmt1 = $mysqli->prepare("INSERT INTO dostawcy (indeks, nazwa1) VALUES (?,?)");

$stmt1->bind_param('ss',$indeks_dost, $nazwa_dost);

$stmt1->execute(); 
$stmt1->close();
$id_dostawcy = $mysqli->insert_id;
echo " -- ostatnie id dostawcy1 ;".$id_dostawcy."<br />";
}
  
/***********************wprowadzamy fakturę*****************************************/

$sprawdzF = $mysqli->prepare("SELECT nr_faktury, id_faktura FROM faktura WHERE nr_faktury =? ");
$sprawdzF->bind_param('s', $nr_faktury);
$sprawdzF->execute();
$sprawdzF->bind_result($col1, $col2);
$sprawdzF->fetch();
$sprawdzF->close();

echo "<br />Faktura w bazie nr:", $col1 ,"<br />";
   
	
if($nr_faktury == $col1) 
{	
	printf("<br />Jest taka faktura : %s ", $col1 );

	} else 
	{
	printf("<br />Wstawiamy nową fakturę : %s ", $nr_faktury);
	
$stmtf = $mysqli->prepare("INSERT INTO faktura (indeks, nr_faktury, data_zak, id_dostawcy) VALUES (?,?,?,?)");
$stmtf->bind_param('sssi',$id_f, $nr_faktury, $data_zak, $id_dostawcy);	
$stmtf->execute();
echo"<br />Błąd ;".$stmtf->error."<br />";
$stmtf->close();

}




   
/***************przygotowana instrukcja sql do wprowadzenia towarów******************/

$stmtt = $mysqli->prepare("SELECT id_towar, indeks, nazwa, cena_brutto FROM towar WHERE indeks=?");
    $stmtt->bind_param("s", $indeks);
    $stmtt->execute();
    $stmtt->bind_result($col11, $col22, $col33, $col44);
    $stmtt->fetch();
    $stmtt->close();
    
    echo "<br /> Id towaru; ". $col11."<br />";

	if($indeks) 
	{

    
	printf("<br />Wstawiamy nowy towar : %s ", $nazwa);
	
$stmtts = $mysqli->prepare("INSERT INTO towar (indeks, nazwa, jm, pkwiu, vat, cena_brutto) VALUES (?,?,?,?,?,?)");

$stmtts->bind_param('ssssis',$indeks, $nazwa, $jm, $pkwiu, $vat, $cena_brutto);
$stmtts->execute();
$stmtts->close();

printf("<br /> Dodano towary: %s",$stmt->affected_rows);
echo " Nazwa towaru: " .$nazwa. "  Cena Sprzedaży Brutto" .$cena_brutto. "<br />";
}
	if($col11) {

		$stmtts = $mysqli->prepare("UPDATE towar SET cena_brutto =? WHERE id_towar = ? ");
		$stmtts->bind_param("ds",$cena_brutto, $col11);
		$stmtts->execute();
		$stmtts->close();


}	  
	  
$id_tow = $stmtts->insert_id;
echo " OSTATNIE id towaru ;" .$id_tow. "<br />";     

/******************************** pora na faktura_has_towar*******************************/

echo "Dla tabeli fht indeks towaru ;".$indeks."<br />";

			$sprawdzF = $mysqli->prepare("SELECT id_faktura FROM faktura WHERE nr_faktury =? ");
			$sprawdzF->bind_param('s', $nr_faktury);
			$sprawdzF->execute();
			$sprawdzF->bind_result($id_faktury);
			$sprawdzF->fetch();
			$sprawdzF->close();
	
				$stmt3 = $mysqli->prepare("SELECT id_towar FROM towar WHERE indeks=? ");
				$stmt3->bind_param("s", $indeks);
				$stmt3->execute();
				$stmt3->bind_result($id_to);
				$stmt3->fetch();
				$stmt3->close();	
	echo "Id towaru z tabeli towar;".$id_to. "<br />";
$id_towar = $id_to;	


$stmt2 = $mysqli->prepare("INSERT INTO faktura_has_towar (id_faktura, id_towar, ilosc, cena_n_z) VALUES (?,?,?,?)");
$stmt2->bind_param("iidd", $id_faktury, $id_towar, $ilosc, $cena_z);	
$stmt2->execute();
$stmt2->close();

$id_hasz = $mysqli->insert_id;
echo " OsTaTnI wiersz tabeli FhT;" .$id_hasz."<br /><br />";
	


/**************************************** kody kreskowe**********************************/

				$stmt3 = $mysqli->prepare("SELECT id_towar FROM towar WHERE indeks=? ");
				$stmt3->bind_param("s", $indeks);
				$stmt3->execute();
				$stmt3->bind_result($id_t);
				$stmt3->fetch();
				$stmt3->close();	
	echo "Id towaru z tabeli towary dla kody ean;".$id_t. "<br />";
		
			$stmt4 = $mysqli->prepare("INSERT INTO kod_ean (kod_kreskowy, id_towar) VALUES (?,?)");
			$stmt4->bind_param('ss', $kod_k, $id_t);

			$stmt4->execute();
			$stmt4->fetch();

			echo "<br />kody kreskowe : ". $kod_k. "<br />";
			$stmt4->close();
			
	
//Wstawiamy dane do tabeli dane_towaru
//Są tam dwa pola....id_towar oraz stan_mag

$sprawdz = $mysqli->prepare("SELECT id_towar, stan_mag, indeks FROM dane_towaru WHERE indeks=?");
		
		$sprawdz->bind_param("s", $indeks);
		$sprawdz->execute();
		$sprawdz->bind_result($col1, $col2,$col3);
		$sprawdz->fetch();
		$sprawdz->close();

echo " PLUS1: ".$col1. "   stan bieżący;" .$col2."<br />";
	
	if($indeks == $col3){

		$dodaj = $mysqli->prepare("UPDATE dane_towaru SET stan_mag = stan_mag + ? WHERE id_towar = ? ");
		$dodaj->bind_param("ds", $ilosc, $col1);
		$dodaj->execute();
		$dodaj->fetch();
		$dodaj->close(); 
		

	 
	 	} else {
	 	
	 	echo "Czy przechodzi id_dane ;".$indeks."<br />";
				$stmt33= $mysqli->prepare("SELECT id_towar FROM towar WHERE indeks= ? ");
				
				$stmt33->bind_param("s", $indeks);
				$stmt33->execute();
				$stmt33->bind_result($id_t);
				$stmt33->fetch();
				$stmt33->close();	
	echo "Id towaru z tabeli towar do dane towaru;".$id_t. "<br />";
	echo "Czy przechodzi ilość;".$ilosc."<br />";
	
		$stmt55 = $mysqli->prepare("INSERT INTO dane_towaru (stan_mag, id_towar, indeks) VALUES (?,?,?)");
		$stmt55->bind_param('dss',$ilosc, $id_t, $indeks);	
		$stmt55->execute();
		$stmt55->close();
 
		}



echo "<br /> Wróć do zapisów <a href='admin_addrecord11.php'>Powrót</a>"; 

 
$mysqli->close()

?>
<div id="form">
<form action="index.php" method="post" enctype="multipart/form-data"> 
		<div id="button">              
			<button>Wróć do dostawy </button>	 
		</div>

</div>

</body>
</html>