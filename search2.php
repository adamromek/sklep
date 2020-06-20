<?php
// Database configuration
$dbHost     = "sql.zoonet.nazwa.pl";
$dbUsername = "zoonet_alaska";
$dbPassword = "ADam-1952";
$dbName     = "zoonet_alaska";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get search term
$searchTerm = $_GET['term'];

// Fetch matched data from the database
$query = $db->query("SELECT id_dostawcy,indeks, nazwa1, kraj FROM dostawcy WHERE nazwa1 LIKE '%".$searchTerm."%' ORDER BY nazwa1 ASC");

// Generate array with skills data
$skillData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['idD'] = $row['indeks'];
        $data['value'] = $row['nazwa1'];
        $data['ind'] = $row['indeks'];
        $data['kraj'] = $row['kraj'];
        array_push($skillData, $data);
    }
}

// Return results as json encoded array
echo json_encode($skillData);
?>
