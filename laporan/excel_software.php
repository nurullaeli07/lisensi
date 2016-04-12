<?php
if( mysql_connect("localhost","root","") ){
mysql_select_db("kontrollicense");
}


$title = "<center><h3>DATA SOFTWARE</h3></center>";
$content_header = "<table border=1>
				   <tr>
					   <th bgcolor=#CCCCCC>ID</th>
					   <th bgcolor=#CCCCCC>Pengembang</th>
					   <th bgcolor=#CCCCCC>Nama Software</th>
				   </tr>";
$content_footer = "</table>";
$content_dalam = "";


$sql = "SELECT * FROM t_section";
$q   = mysql_query( $sql );
while( $r=mysql_fetch_array( $q ) ){

$data = "<tr>
			<td>".$r['id']."</td>
			<td>".$r['pengembang']."</td>
			<td>".$r['nama_software']."</td>
		</tr>";
$content_dalam = $content_dalam ."\n". $data;
}

$content_sheet = $title . "\n". $content_header . "\n" . $content_dalam . "\n" . $content_footer;


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=DataSoftware.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>