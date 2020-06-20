<?php
// Database configuration
$dbHost     = "sql.zoonet.nazwa.pl";
$dbUsername = "zoonet_alaska";
$dbPassword = "ADam-1952";
$dbName     = "zoonet_alaska";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$db -> query("SET NAMES 'utf8'");
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get search term
$searchTerm = $db -> real_escape_string($_GET['term']);

// Fetch matched data from the database
//$query = $db->query("SELECT indeks, nazwa, jm ,vat, cena_brutto FROM towar WHERE indeks LIKE '%".$searchTerm."%' ORDER BY indeks ASC ");
$query = $db->query("SELECT t.id_towar,t.indeks,  t.nazwa, t.jm, t.vat,  t.pkwiu, t.cena_brutto,  thf.ilosc, thf.cena_n_z, f.data_zak,  k.kod_kreskowy
    FROM towar t
    LEFT  JOIN  (faktura f,  faktura_has_towar thf, kod_ean k)      
    ON (t.id_towar=thf.id_towar AND f.id_faktura=thf.id_faktura AND t.id_towar = k.id_towar)
     
    WHERE 
      t.indeks LIKE '%".$searchTerm."%' 
      AND (t.id_towar,f.data_zak) IN (SELECT t.id_towar, MAX(f.data_zak) 
      FROM towar t JOIN  (faktura f,  faktura_has_towar thf) ON (t.id_towar=thf.id_towar 
      AND f.id_faktura=thf.id_faktura ) GROUP BY 1) 
    ORDER BY t.nazwa, f.data_zak ASC ");
// Generate array with skills data
$skillData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $data['indeks'] = $row['indeks'];
      $data['value'] = $row['nazwa'];
      $data['pkwiu'] = $row["pkwiu"];
      $data['jm'] = $row['jm'];
      $data['vat'] = $row['vat'];
		$data['ilosc'] = $row['ilosc'];
		$data['cena_brutto'] = $row['cena_brutto'];
		$data['cena'] = $row['cena_n_z'];
		//$data['$nr_fak	']	=$row["nr_faktury"];
		//$data['$data_zak']	=$row["data_zak"];
		//$data['stan']=$row["stan_mag"];
   	$data['kodKT'] = $row['kod_kreskowy'];
        array_push($skillData, $data);
    }
}

// Return results as json encoded array
echo json_encode($skillData);
//$json = json_encode($skillData);  //sprawdzałem czy json działa. Działa po wstawieniu kodowania w zapytaniu do bazy danych
//var_dump($json);
?>
