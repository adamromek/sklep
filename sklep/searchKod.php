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
//("SELECT indeks, nazwa FROM towar WHERE nazwa LIKE '%".$searchTerm."%' ORDER BY nazwa ASC ");
$query = $db->query("SELECT t.nazwa, t.indeks, t.vat, t.pkwiu, t.jm, t.cena_brutto, k.kod_kreskowy
FROM towar t 
LEFT  JOIN   kod_ean k 
ON t.id_towar=k.id_towar
WHERE k.kod_kreskowy like '%".$searchTerm."%'  ORDER BY t.nazwa ASC ");
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
		//$data['cena'] = $row['cena_n_z'];
		//$data['$nr_fak	']	=$row["nr_faktury"];
		//$data['$data_zak']	=$row["data_zak"];
		//$data['stan']=$row["stan_mag"];
   	$data['kod_k'] = $row['kod_kreskowy'];
        array_push($skillData, $data);
    }
}

// Return results as json encoded array
echo json_encode($skillData);
//$json = json_encode($skillData);  //sprawdzałem czy json działa. Działa po wstawieniu kodowania w zapytaniu do bazy danych
//var_dump($json);
?>
