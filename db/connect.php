<?php
$mysqli = new mysqli("sql.zoonet.nazwa.pl", "zoonet_alaska", "ADam-1952", "zoonet_alaska");

$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


?>
