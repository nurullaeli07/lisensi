<?php
session_start();
include('../config/koneksi.php'); 
require('../assets/fpdf17/fpdf.php');

$query = "SELECT * FROM t_vendor ORDER BY id";
$sql =mysql_query($query) or die("Query Gagal");
$data = array();
while ($row = mysql_fetch_assoc($sql)){
		array_push($data,$row);
}

$judul = "Laporan Data Vendor";
$header = array(
				
				array("label"=>"ID","length"=>7,"align"=>"L"),
				array("label"=>"Nama Vendor","length"=>40,"align"=>"L"),
				array("label"=>"Alamat","length"=>110,"align"=>"L"),
				array("label"=>"E-mail","length"=>50,"align"=>"L"),
				array("label"=>"Telepon","length"=>35,"align"=>"L"),
				array("label"=>"Fax","length"=>35,"align"=>"L")
				);
#sertakan library FPDF dan bentuk objel				
require_once ('../assets/fpdf17/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

#menampilkan judul laporan
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,20, $judul,'0', 1,'C');

#buat header table
$pdf->SetFont('Arial','','9');
$pdf->SetFillColor(255,0,0);;
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom){
		$pdf->Cell($kolom['length'],10, $kolom['label'],1, '0','C',true);
	}
	$pdf->Ln();

#menampilkan data tabel
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach($data as $baris){
	$i = 0;
	foreach ($baris as $cell){
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'],$fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}

$pdf->Output();
?>