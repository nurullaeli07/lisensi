<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>

<!---====================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
    
<!---=========================================================================================================================--->            
		<!-- Page Heading Buka -->
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-table"></i> <strong>Data Lisensi</strong></h3>
                <ol class="breadcrumb">
                	<li class="active">
                    	<i class="fa fa-home"></i> 
                        <a href="../config/index.php" title="Kembali Ke Beranda">Beranda</a> &raquo; Data Lisensi
                    </li>
               </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=========================================================================================================================--->

        <!-- Page Content -->
        <div class="row"> 
        	<div class="col-lg-12">
            	<div class="panel panel-default">
                	<div class="panel-body">

<!---=========================================================================================================================--->
					
					<table width="100%">
					<tr>
						<td align="right">
							<form>
								<div class="btn-group" role="group" aria-label="...">
									
									<!-- Action untuk filter kolom -->
									<div class="btn-group" role="group">
										<button type="button" title="Filter Kolom" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-filter fa-fw"></i> Filter <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="#"><input type="checkbox" id="cek" name="col3" checked="checked" /> Pengembang</a></li>
												<li><a href="#"><input type="checkbox" id="cek" name="col4" checked="checked" /> Software</a></li>
												<li><a href="#"><input type="checkbox" id="cek" name="col5" checked="checked" /> No. Lisensi</a></li>
												<li><a href="#"><input type="checkbox" id="cek" name="col6" checked="checked" /> Deskripsi</a></li>
												<li><a href="#"><input type="checkbox" id="cek" name="col7" checked="checked" /> Jumlah</a></li>
												<li><a href="#"><input type="checkbox" id="cek" name="col8" checked="checked" /> Status</a></li>
												<li><a href="#"><input type="checkbox" id="cek" name="col9" checked="checked" /> PIC Cek</a></li>
											</ul>
									</div>
									
									<!-- Button Action untuk Export data ke Excel & PDF -->
									<div class="btn-group" role="group">
										<button type="button" title="Export Data License" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
										<span class="glyphicon glyphicon-export" aria-hidden="true"></span> Export <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="../laporan/excel_lisensi.php"><i class="fa fa-file-excel-o fa-fw"></i> Excel</a></li>
											</ul>
									</div>
									
									<!-- button action untuk melihat data secara fullscreen -->
									<a href="lisensi_fullscreen.php" title="Lihat Layar Penuh" class="btn btn-default"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></a>
								</div>
							</form>
						</td>
					</tr>
					</table>
					
<!---=========================================================================================================================--->
					
					<br>
					<table id="table" class="display table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>ID</th>
							<th class="col3">Pengembang</th>
							<th class="col4">Software</th>
							<th class="col5">No. Lisensi</th>
							<th class="col6">Deskripsi</th>
							<th class="col7">Qty</th>
							<th class="col8">Status</th>
							<th class="col9">PIC Cek</th>						
							<th></th>
						</tr>
					</thead>
					<?php
						//menampilkan data departement dari database
						$res = $mysqli->query("SELECT * FROM t_license");
						$no = 1;
						while ($row = $res->fetch_assoc())
						{
					?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['id_license'] ?></td>
							<td><?php echo $row['pengembang'] ?></td>
							<td><?php echo $row['software'] ?></td>
							<td><?php echo $row['no_license'] ?></td>
							<td><?php echo $row['deskripsi'] ?></td>
							<td><?php echo $row['jumlah'] ?></td>
							<td><?php 
									if($row['status'] == 'Aktif'){
										echo '<span class="label label-success">Aktif</span>';
										}
										else if ($row['status'] == 'Tidak Aktif' ){
											echo '<span class="label label-danger">Tidak Aktif</span>';
										}
									echo '';
								?>
							</td>
							<td><?php 
									if ($row['pic_cek'] == ''){
										echo '<span class="label label-danger">Belum di cek</span>';
									} else {
										echo('<i class="fa fa-check-circle"></i> '.$row['pic_cek']); 
									}
								?>
							</td>
							<td align="center">
							<?php
								if ($_SESSION['level'] == "admin"){
								?>
								<div class="btn-group">
									<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-gear fa-fw"></i> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="lisensi_update.php?id_license=<?php echo $row['id_license']?>" title="Edit Data Lisensi"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
										<li><a href="lisensi_delete.php?d=<?php echo $row['id_license']?>"  onclick="return confirm('Yakin akan hapus data <?php echo $row['id_license']?> ?')" title="Hapus Data License""><i class="fa fa-trash fa-fw"></i> Hapus</a></li>
										<li><a href="lisensi_cek.php?id=<?php echo $row['id_license']?>" title="Cek Data Lisensi"><i class="fa fa-check-square-o fa-fw"></i> Cek</a></li>
										<li><a href="lisensi_scan.php?id_license=<?php echo $row['id_license']?>" title="Upload File"><i class="fa fa-camera fa-fw"></i> Upload File</a></li>
										<li class="divider"></li>
										<li><a href="lisensi_detail.php?id_license=<?php echo $row['id_license']?>" title="Lihat Detail Lisensi"><i class="fa fa-search-plus fa-fw"></i> Detail</a></li>
										</ul>
								</div>
							<?php
								}
								else if ($_SESSION['level'] == "user"){	
								?>
								<a href="lisensi_detail.php?id_license=<?php echo $row['id_license']?>" title="Lihat Detail Lisensi" class="btn btn-default btn-sm"><i class="fa fa-search-plus fa-fw"></i></a>
								<?php
								}
								?>
							</td>
							
						</tr>
						<!--- Penomoran --->
						<?php
							$no++;
						}
						?>
					</table>
					

 
<!---=========================================================================================================================--->

					</div>
				</div>
			</div>
		</div>
        <!-- /.Page Content Tutup -->

<!---=========================================================================================================================--->

	</div>
</div>
<!-- /.Page Wrapper Tutup -->

<!---=========================================================================================================================--->

<?php
include "../config/footer.php";
?>
