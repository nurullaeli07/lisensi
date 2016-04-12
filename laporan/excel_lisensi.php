<?php
if( mysql_connect("localhost","root","") ){
mysql_select_db("kontrollicense");
}


$title = "<center><h3>DATA LISENSI</h3></center>";
$content_header = "<table border=1>
				   <tr>
					   <th bgcolor=#CCCCCC>ID</th>
					   <th bgcolor=#CCCCCC>Pengembang</th>
					   <th bgcolor=#CCCCCC>Software</th>
					   <th bgcolor=#CCCCCC>No. Lisensi</th>
					   <th bgcolor=#CCCCCC>No. Part Lisensi</th>
					   <th bgcolor=#CCCCCC>Deskripsi</th>
					   <th bgcolor=#CCCCCC>Jenis Lisensi</th>
					   <th bgcolor=#CCCCCC>Vendor</th>
					   <th bgcolor=#CCCCCC>Section Pemilik</th>
					   <th bgcolor=#CCCCCC>No. Bantex</th>
					   <th bgcolor=#CCCCCC>Qty</th>
					   <th bgcolor=#CCCCCC>Tanggal Terbit</th>
					   <th bgcolor=#CCCCCC>Masa Berlaku</th>
					   <th bgcolor=#CCCCCC>Status</th>
					   <th bgcolor=#CCCCCC>PIC Input</th>
					   <th bgcolor=#CCCCCC>Tanggal Input</th>
					   <th bgcolor=#CCCCCC>PIC Cek</th>
					   <th bgcolor=#CCCCCC>Tanggal Cek</th>
				   </tr>";
$content_footer = "</table>";
$content_dalam = "";


$sql = "SELECT * FROM t_license";
$q   = mysql_query( $sql );
while( $r=mysql_fetch_array( $q ) ){

$data = "<tr>
			<td>".$r['id_license']."</td>
			<td>".$r['pengembang']."</td>
			<td>".$r['software']."</td>
			<td>".$r['no_license']."</td>
			<td>".$r['no_part_license']."</td>
			<td>".$r['deskripsi']."</td>
			<td>".$r['jenis_license']."</td>
			<td>".$r['vendor']."</td>
			<td>".$r['section_pemilik']."</td>
			<td>".$r['no_bantex']."</td>
			<td>".$r['jumlah']."</td>
			<td>".$r['tanggal_terbit']."</td>
			<td>".$r['masa_berlaku']."</td>
			<td>".$r['status']."</td>
			<td>".$r['pic_input']."</td>
			<td>".$r['tgl_input']."</td>
			<td>".$r['pic_cek']."</td>
			<td>".$r['tgl_cek']."</td>
		</tr>";
$content_dalam = $content_dalam ."\n". $data;
}

$content_sheet = $title . "\n". $content_header . "\n" . $content_dalam . "\n" . $content_footer;


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=DataLisensi.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>