<?php 
mysql_connect("localhost","root","");
mysql_select_db("kontrollicense");

$nama_pc				= $_POST['nama_pc'];
$id_pc					= $_POST['id_pc'];
$section_pemilik		= $_POST['section_pemilik'];
$id_license				= $_POST['id_license'];
$jumlah					= $_POST['jumlah'];
$proses					= 'Insert';
$note					= '-';
date_default_timezone_set('Asia/Jakarta');
$tgl_input   			= date("Y-m-d H:i:s");
$pic_input				= $_POST['pic_input'];
$ip_address				= $_SERVER['REMOTE_ADDR'];							

$dt=mysql_query("select * from t_license where id_license='$id_license'");
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysql_query("update t_license set jumlah='$sisa' where id_license='$id_license'");

$pic_instalasi			= $_POST['pic_instalasi'];
$tgl_instalasi			= $_POST['tgl_instalasi'];	
mysql_query("insert into t_penggunaan_lisensi values('','$nama_pc', '$id_pc', '$section_pemilik', '$id_license', '$jumlah', '$pic_instalasi', '$tgl_instalasi')")or die(mysql_error());
$proses					= 'Insert';
mysql_query("insert into t_penggunaan_lisensi_history values('','$nama_pc', '$id_pc', '$section_pemilik', '$id_license', '$jumlah', '$pic_instalasi', '$tgl_instalasi','$proses','$note','$tgl_input','$pic_input','$ip_address')")or die(mysql_error());
echo '<script language="javascript">alert("Data Berhasil di Simpan")</script>';
echo '<script language="javascript">window.location = "../pc/pc.php"</script>';
								
?>