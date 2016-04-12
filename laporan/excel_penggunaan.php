<?php
if( mysql_connect("localhost","root","") ){
mysql_select_db("kontrollicense");
}


$title = "<center><h3>DATA PENGGUNAAN LISENSI</h3></center>";
$content_header = "<table border=1>
				   <tr>
					   <th bgcolor=#CCCCCC>ID</th>
					   <th bgcolor=#CCCCCC>Nama PC</th>
					   <th bgcolor=#CCCCCC>ID PC</th>
					   <th bgcolor=#CCCCCC>Section Pemilik</th>
					   <th bgcolor=#CCCCCC>ID Lisensi</th>
					   <th bgcolor=#CCCCCC>Qty</th>
					   <th bgcolor=#CCCCCC>PIC Instalasi</th>
					   <th bgcolor=#CCCCCC>Tanggal Instalasi</th>
				   </tr>";
$content_footer = "</table>";
$content_dalam = "";


$sql = "SELECT * FROM t_pc";
$q   = mysql_query( $sql );
while( $r=mysql_fetch_array( $q ) ){

$data = "<tr>
			<td>".$r['id']."</td>
			<td>".$r['nama_pc']."</td>
			<td>".$r['id_pc']."</td>
			<td>".$r['section_pemilik']."</td>
			<td>".$r['id_lisensi']."</td>
			<td>".$r['qty']."</td>
			<td>".$r['pic_instalasi']."</td>
			<td>".$r['tgl_instalasi']."</td>
		</tr>";
$content_dalam = $content_dalam ."\n". $data;
}

$content_sheet = $title . "\n". $content_header . "\n" . $content_dalam . "\n" . $content_footer;


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=DataPenggunaanLisensi.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>