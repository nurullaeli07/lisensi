<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
include '../config/koneksi.php';
$id = $_GET['id'];
//mengambil data dari database
$show = mysql_query("SELECT * FROM t_license WHERE id_license='$id'");
if(mysql_num_rows($show) == 0){
	echo '<script>window.history.back()</script>';	
}else{
	$row = mysql_fetch_assoc($show);
}							
?>

<!---=========================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
    
<!---=========================================================================================================================--->    	
        <!-- Page Heading Buka-->
        <div class="row">
        	<div class="col-lg-12">
            	<h3 class="page-header"><i class="fa fa-check-square"></i> <strong>Cek Data Lisensi</strong></h3>
                <ol class="breadcrumb">
                	<li class="active">
                    	<i class="fa fa-home"></i> 
                        <a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
                        <a href="../lisensi/lisensi.php" title="Lihat Data Lisensi">Data Lisensi</a> &raquo; Cek Data Lisensi
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=========================================================================================================================--->	      				
						<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id_license			= $_POST['id_license'];
							$pengembang 		= $_POST['pengembang'];
							$software 			= $_POST['software'];
							$no_license 		= $_POST['no_license'];
							$no_part_license 	= $_POST['no_part_license'];
							$jenis_license	 	= $_POST['jenis_license'];
							$deskripsi		 	= $_POST['deskripsi'];
							$vendor			 	= $_POST['vendor'];
							$no_bantex			= $_POST['no_bantex'];
							$section_pemilik 	= $_POST['section_pemilik'];
							$jumlah			 	= $_POST['jumlah'];
							$tanggal_terbit 	= $_POST['tanggal_terbit'];
							$masa_berlaku	 	= $_POST['masa_berlaku'];
							$status			 	= $_POST['status'];
							$pic_input		 	= $_POST['pic_input'];
							$tgl_input		 	= $_POST['tgl_input'];
							$pic_cek		 	= $_POST['pic_cek'];
							$tgl_cek		 	= $_POST['tgl_cek'];
							$file_gambar	 	= $_POST['file_gambar'];
							$proses				= $_POST['proses'];
							$note				= $_POST['note'];
							$ip_address			= $_SERVER['REMOTE_ADDR'];

							if(isset ($id_license) && isset ($pengembang) && isset ($software) && isset($no_license) && isset ($no_part_license) && isset ($jenis_license) &&
						isset($deskripsi) && isset($vendor) && isset($no_bantex) && isset($section_pemilik) && isset($jumlah) && isset($tanggal_terbit) && isset($masa_berlaku) && 
						isset($status) && isset($pic_input) && isset($tgl_input) && isset($pic_cek) && isset($tgl_cek) && isset($file_gambar) && isset($proses) && isset($note) && isset($ip_address))
						
							$res1 = $mysqli->query("INSERT into t_license_history values('','$id_license', '$pengembang', '$software', '$no_license', '$no_part_license', '$jenis_license', '$deskripsi', '$vendor', 
								'$no_bantex', '$section_pemilik', '$jumlah', '$tanggal_terbit', '$masa_berlaku', '$status', '$pic_input', '$tgl_input', '$pic_cek', '$tgl_cek', '$proses', '$note', '$ip_address')");
							
							$res2 = $mysqli->query("UPDATE t_license SET id_license='$id_license', pengembang='$pengembang', software='$software', no_license='$no_license', no_part_license='$no_part_license', 
								jenis_license='$jenis_license', deskripsi='$deskripsi', vendor='$vendor', no_bantex='$no_bantex', section_pemilik='$section_pemilik', jumlah='$jumlah', tanggal_terbit='$tanggal_terbit', 
								masa_berlaku='$masa_berlaku', status='$status', pic_input='$pic_input', tgl_input='$tgl_input', pic_cek='$pic_cek', tgl_cek='$tgl_cek' WHERE id_license = '$id_license'");
 
							if ($res1 && $res2)  

								{
								?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Sudah di Cek!</strong></h3>jika ingin keluar klik <a href="lisensi.php">kembali</a>.
							</div>
							<?php
							}
							else
								{
							}							
								echo $stmt->error; 						
							}
							?>

<!---=========================================================================================================================--->
		
		<!-- Page Content Buka -->
		<div class="row"> 
			<div class="col-lg-12">
				<div class="panel panel-info">
				<div class="panel-heading" align="center">
				<i class="fa fa-info-circle"></i> Detail Lisensi dengan ID : <strong><?php echo $row['id_license']; ?></strong></div>
					<div class="panel-body">
					
<!---=========================================================================================================================--->					
						<input type="hidden" name="id" value="<?php echo $id; ?>">
							<table  align="center" width="100%">
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
									<td height="70"><div align="left"><?php echo $row['deskripsi']; ?></div></td>
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
											if($row['status'] <= 0){
												echo '<span class="label label-success">Aktif</span>';
												}
												else if ($row['status'] >0 ){
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
							</table>
							<br>
						
						
						<form class="form-horizontal" action="" method="post">
						<!-------------------------------------------------------->
							<input type="hidden" name="id" value="<?php echo $id; ?>">
						<!-------------------------------------------------------->
							<input type="text" name="id_license" value="<?php echo $row['id_license'] ?>" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="pengembang" value="<?php echo $row['pengembang'] ?>" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="software" value="<?php echo $row['software'] ?>" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="no_license" value="<?php echo $row['no_license'] ?>" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="no_part_license" value="<?php echo $row['no_part_license'] ?>" hidden="hidden">
						<!-------------------------------------------------------->	
							<input type="text" name="jenis_license" value="<?php echo $row['jenis_license'] ?>" hidden="hidden">
						<!-------------------------------------------------------->	
							<input type="text" name="deskripsi" value="<?php echo $row['deskripsi'] ?>" hidden="hidden">
						<!-------------------------------------------------------->	
							<input type="text" name="vendor" value="<?php echo $row['vendor'] ?>" hidden="hidden">
						<!-------------------------------------------------------->	
							<input type="text" name="section_pemilik" value="<?php echo $row['section_pemilik'] ?>" hidden="hidden">
						<!-------------------------------------------------------->	
							<input type="text" name="no_bantex" value="<?php echo $row['no_bantex'] ?>" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="jumlah" value="<?php echo $row['jumlah'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->
							<input type="text" name="tanggal_terbit" value="<?php echo $row['tanggal_terbit'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->
							<input type="text" name="masa_berlaku" value="<?php echo $row['masa_berlaku'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->
							<input type="text" name="status"  value="<?php echo $row['status'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->
							<input type="text" name="pic_input" value="<?php echo $row['pic_input'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->
							<input type="text" name="tgl_input" value="<?php echo $row['tgl_input'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->							
							<input type="text" name="pic_cek" value="<?php echo "".$_SESSION['userid']."";?>" hidden="hidden">
						<!-------------------------------------------------------->	
								<?php
									//menampilkan tanggal dan waktu sekarang
									date_default_timezone_set('Asia/Jakarta');
									$tgl = date("Y-m-d h:i:s");
								?>
							<input type="text" name="tgl_cek" value="<?php echo $tgl;?>" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="file_gambar" value="<?php echo $row['file_gambar'] ?>" hidden="hidden">
                        <!-------------------------------------------------------->					
							<input type="text" name="proses" value="Check" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="note" value="" hidden="hidden">
                        <!-------------------------------------------------------->
						<div class="form-actions well" align="center">
								<!-- Button untuk mengecek data -->
								<button type="submit" name="update" class="btn btn-success btn-md" title="Cek Data License">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Konfirmasi</button>
						</div>
						<!-------------------------------------------------------->
					</form>
            
<!---===================================================================================================================--->
            
           			</div>
				</div>
        	</div>
		</div>
        <!-- /.Page Content Tutup-->
    
<!---===================================================================================================================--->

	</div>
</div>
<!-- /.Page Wrapper Tutup-->

<!---===================================================================================================================--->     
<?php
include '../config/footer.php';
?>

