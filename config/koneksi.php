<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "kontrollicense";
$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($database, $koneksi) or die("Tidak ada database yang dipilih!");
?>