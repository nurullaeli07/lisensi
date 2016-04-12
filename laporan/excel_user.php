<?php
if( mysql_connect("localhost","root","") ){
mysql_select_db("kontrollicense");
}


$title = "<center><h3>DATA USER</h3></center>";
$content_header = "<table border=1>
				   <tr>
					   <th bgcolor=#CCCCCC>Nama Lengkap</th>
					   <th bgcolor=#CCCCCC>Userid</th>
					   <th bgcolor=#CCCCCC>Level</th>
				   </tr>";
$content_footer = "</table>";
$content_dalam = "";


$sql = "SELECT * FROM t_user";
$q   = mysql_query( $sql );
while( $r=mysql_fetch_array( $q ) ){

$data = "<tr>
			<td>".$r['nama_lengkap']."</td>
			<td>".$r['userid']."</td>
			<td>".$r['level']."</td>
		</tr>";
$content_dalam = $content_dalam ."\n". $data;
}

$content_sheet = $title . "\n". $content_header . "\n" . $content_dalam . "\n" . $content_footer;


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=DataUser.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>