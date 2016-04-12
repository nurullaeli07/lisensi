<html>
<head>
	<!-- untuk font awesome -->
    <link href="../asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- css untuk tabel -->
	<style>
	table { 
	  width: 100%; 
	  border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
	  background: #eee; 
	}
	th { 
	  background: #333; 
	  color: white; 
	  font-weight: bold; 
	}
	td, th { 
	  padding: 6px; 
	  border: 1px solid #ccc; 
	  text-align: left; 
	}
	</style>
</head>
<body>

<?php
//koneksi ke database
include '../config/koneksi.php';
//menampilkan data dari database
$result = mysql_query("SELECT * FROM t_license");
//menghitung jumlah baris yang ada
$num_rows = mysql_num_rows($result); 
?>

<!-- menampilkan jumlah data yang ada di database license -->
<h4>Total ada : <font color="red"><?php echo $num_rows; ?></font> Data</h4>

<table>
<thead>
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th>Pengembang</th>
		<th>Software</th>
		<th>No. License</th>
        <th>No. Part License</th>
        <th>Deskripsi</th>
		<th>Jenis License</th>
		<th>Vendor</th>
		<th>No. Bantex</th>
		<th>Section Pemilik</th>
		<th>Qty</th>
		<th>Tanggal Terbit</th>
		<th>Masa Berlaku</th>
        <th>Status</th>
		<th>PIC Input</th>
		<th>Tangga Input</th>
		<th>PIC Cek</th>
		<th>Tangga Cek</th>
    </tr>
</thead>

<?php
include '../config/koneksi.php';

$query = mysql_query("SELECT * FROM t_license ORDER BY id_license DESC") or die(mysql_error());
if(mysql_num_rows($query) == 0){
	echo '<tr><td colspan="4">Tidak ada data!</td></tr>';
}else{
//membuat penomoran otomatis
	$no = 1;
	while($data = mysql_fetch_assoc($query)){
	echo '<tr>';		
		echo '<td>'.$no.'</td>';
		echo '<td>'.$data['id_license'].'</td>';
		echo '<td>'.$data['pengembang'].'</td>';
		echo '<td>'.$data['software'].'</td>';
		echo '<td>'.$data['no_license'].'</td>';
		echo '<td>'.$data['no_part_license'].'</td>';
		echo '<td>'.$data['deskripsi'].'</td>';
		echo '<td>'.$data['jenis_license'].'</td>';
		echo '<td>'.$data['vendor'].'</td>';
		echo '<td>'.$data['no_bantex'].'</td>';
		echo '<td>'.$data['section_pemilik'].'</td>';
		echo '<td>'.$data['jumlah'].'</td>';
		echo '<td>'.$data['tanggal_terbit'].'</td>';
		echo '<td>'.$data['masa_berlaku'].'</td>';
		echo '<td>';
				if($data['status'] == 'Aktif'){
					echo 'Aktif';
				} else if ($data['status'] == 'Tidak Aktif' ){
					echo 'Tidak Aktif';
				}
					echo '
			</td>';
		echo '<td>'.$data['pic_input'].'</td>';
		echo '<td>'.$data['tgl_input'].'</td>';
		echo '<td>';
				if ($data['pic_cek'] == ''){
        			echo 'Belum di cek';
        		} else {
        			echo('' .$data['pic_cek']); 
        		}
					echo '
			</td>';
		echo '<td>';
				if ($data['tgl_cek'] == '0000-00-00 00:00:00'){
        			echo 'Belum di cek';
        		} else {
        			echo('' .$data['tgl_cek']); 
        		}
					echo '
			</td>';
		echo '</tr>';
		$no++;		
		}		
	}
?>
</table>
</body>
</html>