<?php
session_start();
include('../config/config.php');
$timeout = 30; // Set timeout menit
$logout_redirect_url = "../index.php"; // Set logout URL

 $timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis! Silahkan login kembali!'); document.location='../index.php';</script>";
    }
}
$_SESSION['start_time'] = time();
//cek apakah user sudah login
if(!isset($_SESSION['userid'])){
?>
   		<script language="JavaScript">
			alert('Anda Belum Login');
			document.location='../index.php';
		</script>
	<?php
}
//cek level user
if($_SESSION['level']!="admin"){
?>
		<script language="JavaScript">
			alert('Anda tidak memiliki akses ini!');
			document.location='../config/index.php';
		</script>
	<?php
}
?>