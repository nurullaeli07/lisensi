<?php
$mysqli = new mysqli("localhost", "root", "", "kontrollicense");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
<!--#####################################
	Project : Aplikasi Kontrol Lisensi
	Versi 	: 1.0
	Author 	: Nurul Laeli Mahmudah
######################################-->