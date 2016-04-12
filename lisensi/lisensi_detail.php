<?php
include '../session/user.php';
//koneksi ke database
include '../config/koneksi.php';
//======================================= Action untuk mengambil data dari database license ====================================//

$id_license = $_GET['id_license'];
$sql = mysql_query("SELECT * FROM t_license WHERE id_license='$id_license'");
if(mysql_num_rows($sql) == 0){
	header("Location: index.php");
}else{
	$row = mysql_fetch_assoc($sql);
}
			
//===================================================== Action untuk delete ====================================================//

if(isset($_GET['proses']) == 'delete'){
$delete = mysql_query("DELETE FROM t_license WHERE id_license='$id_license'");
	if($delete){
		echo '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  Data berhasil dihapus.</div>';
	}else{
		echo '<div class="alert alert-info alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  Data gagal dihapus.</div>';
	}
}
?>

<!---=========================================================================================================================--->

<?php
//meanmpilkan header halaman
include "../config/header.php";
?>   

<!---=========================================================================================================================--->         

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
    
<!---=========================================================================================================================--->	
    	
        <!-- Page Heading Buka -->
		<div class="row">
       		<div class="col-lg-12">
            	<h3 class="page-header"><i class="fa fa-search-plus"></i> <strong> Detail Lisensi</strong></h3>
                <ol class="breadcrumb">
                	<li class="active">
						<i class="fa fa-home"></i>
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda </a>&raquo; 
						<a href="../lisensi/lisensi.php" title="Lihat Data License"> Data Lisensi</a> &raquo; Detail Lisensi
					</li>
                </ol>
            </div>
        </div>
		<!-- /.Page Heading Tutup -->

<!---========================================================================================================================---> 
		
        <!-- Page Content Buka -->
        <div class="row"> 
        	<div class="col-lg-12">
            	<div class="panel panel-default">
                	<div class="panel-body">
        
<!---========================================================================================================================--->        
					
					<div class="form-actions well">
					<?php
					if ($_SESSION['level'] == "admin"){
					?>
					<!-- Button untuk edit data -->
					<a href="lisensi_update.php?id_license=<?php echo $row['id_license'] ?>" title="Edit Data" class="btn btn-default btn-md">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
					
					<!-- Button untuk kembali -->
					<a onclick="return confirm('Yakin akan di hapus?')" href="lisensi_delete.php?d=<?php echo $row['id_license'] ?>"title="Hapus Data" class="btn btn-default btn-md">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
					<?php
					}
					else if ($_SESSION['level'] == "user"){
					?>
					<a href="lisensi.php" title="Kembali" class="btn btn-default btn-md">
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
					<?php
					}
					?>
					</div>
					

<!---========================================================================================================================--->
						<?php
						if ($_SESSION['level'] == "admin"){
							echo '<div class="col-xs-12 col-sm-6 col-md-8">';
							}
							else if ($_SESSION['level'] == "user"){
								echo '<div class="col-lg-11">';
							}
						?>
						<div class="panel panel-info">
							<div class="panel-heading" align="center"><i class="fa fa-info-circle"></i> Detail Lisensi dengan ID : <h4><strong><?php echo $row['id_license']; ?></strong></h4></div>
							
							<table class="table" align="center" width="100%">
								<tr><td></td><td></td></tr>
								<tr>
									<th width="49%"><div align="right">Pengembang</div></th>
									<td width="2%"align="center">:</td>
									<td width="49%"><div align="left"><?php echo $row['pengembang']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Software</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['software']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">No. License</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['no_license']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">No. Part License</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['no_part_license']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Jenis License</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['jenis_license']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Deskripsi</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['deskripsi']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Vendor</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['vendor']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">No. Bantex</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['no_bantex']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Section Pemilik</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['section_pemilik']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Jumlah</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['jumlah']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Tanggal Terbit</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['tanggal_terbit']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Masa Berlaku</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php 
										if ($row['masa_berlaku'] == '0000-00-00'){
											echo '<span class="label label-warning">Unlimited</span>';
										} else {
											echo($row['masa_berlaku']); 
										}
										?></div>
									 </td>
								</tr>
								<tr>
									<th><div align="right">Status</div></th>
									<td align="center">:</td>
									<td><div align="left">
										<?php 
											if($row['status'] == 'Aktif'){
												echo '<span class="label label-success">Aktif</span>';
												}
												else if ($row['status'] == 'Tidak Aktif' ){
													echo '<span class="label label-danger">Tidak Aktif</span>';
												}
											echo '';
										?>
										</div>
									</td>
								</tr>
								
								<tr>
									<th><div align="right">PIC Input</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['pic_input']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">Tanggal Input</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php echo $row['tgl_input']; ?></div></td>
								</tr>
								<tr>
									<th><div align="right">PIC Cek</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php 
										if ($row['pic_cek'] == ''){
											echo '<span class="label label-danger">Belum di cek</span>';
										} else {
											echo($row['pic_cek']); 
										}
										?></div>
									 </td>
								</tr>
								<tr>
									<th><div align="right">Tanggal Cek</div></th>
									<td align="center">:</td>
									<td><div align="left"><?php 
										if ($row['tgl_cek'] == '0000-00-00 00:00:00'){
											echo '<span class="label label-danger">Belum di cek</span>';
										} else {
											echo($row['tgl_cek']); 
										}
										?></div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
					
					<?php
					if ($_SESSION['level'] == "admin"){
					?>
					<div class="col-xs-6 col-md-4" align="center">
					<?php
					if ($row['file_gambar'] == ''){
						echo '<img src="../assets/img/none.jpg" alt="..." class="img-thumbnail" width=300px height=auto/>';
						echo '<br><br>';
						echo '<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<strong>File belum ada!</strong> <br>Silahkan tambahkan hasil scan lisensi. <br><a href="lisensi_scan.php?id_license='.$row['id_license'].'" title="Upload File"><i class="fa fa-camera fa-fw"></i> Upload File</a>
						</div>';
						} else {
							echo '<a class="fancybox" href='.$row['file_gambar'].' title="Klik gambar untuk melihat lebih jelas"><img src='.$row['file_gambar'].' alt="..." class="img-thumbnail" width=300px height=auto /></a>';
						}
					?>
					</div>
					
					<?php
					}
					else if ($_SESSION['level'] == "user"){	
					}
					?>

<!---=====================================================================================================================--->					
					</div>
				</div>
			</div>
		</div>
		<!-- /.Page Content Tutup -->
		
<!---=====================================================================================================================--->
	
    </div>
</div>
 <!-- /.Page Wrapper Tutup -->
 
<!---=====================================================================================================================--->        

<?php 
include '../config/footer.php';
?>
