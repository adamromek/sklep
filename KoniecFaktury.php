<?php
session_start();
$_SESSION = array();
//$_SESSION['dostawcy'] == 0;
session_destroy();

	if($_SESSION['nr_faktury']) {
echo "Sesja ;" .$_SESSION['nr_faktury'];
	} else {
		echo " Brak sesji: <br />";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Wyloguj</title>
</head>
<body>

  <div id="top">Dostawcy:<a href="dostawcy.php">Powrót do dostawców</a></div>
  
</body>
</html>