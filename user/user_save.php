<?php
//action untuk menyimpan data user ke database
if(isset($_POST['simpan'])){
	include('../config/koneksi.php');
	$Nama				= $_POST['nama_lengkap'];
	$Email				= $_POST['email'];
	$Userid				= $_POST['userid'];
	$Pwd				= $_POST['password'];
	$Password			= md5($Pwd); //membuat password menjadi md5
	$Level				= $_POST['level'];

	$input = mysql_query("INSERT INTO t_user VALUES('$Nama', '$Email', '$Userid', '$Password', '$Level')") or die(mysql_error());
	if($input){	
		header('location:user.php');	
	}else{	
		header('location:user.php');	
	}
		}else{
			echo '<script>window.history.back()</script>';

		}
?>