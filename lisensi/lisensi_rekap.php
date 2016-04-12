<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>

<!--#####################################
	Project : Aplikasi Kontrol Lisensi
	Versi 	: 1.0
	Author 	: Nurul Laeli Mahmudah
######################################-->

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
	

					<table id="tbl" class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>ID</th>
							<th>Pengembang</th>
							<th>Software</th>
							<th>No. Lisensi</th>
							<th>Deskripsi</th>
							<th>Jenis Lisensi</th>
							<th>Vendor</th>
							<th>Section Pemilik</th>
							<th>No. Bantex</th>
							<th>Qty</th>
							<th>Status</th>
							<th>PIC Input</th>
							<th>Tanggal Input</th>
							<th>PIC Cek</th>
							<th>Tanggal Cek</th>							
							<th>Proses</th>
							<th>Note</th>
							<th>IP Address</th>
						</tr>
					</thead>
					<?php
						//menampilkan data departement dari database
						$res = $mysqli->query("SELECT * FROM t_license_history");
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
							<td><?php echo $row['jenis_license'] ?></td>
							<td><?php echo $row['vendor'] ?></td>
							<td><?php echo $row['section_pemilik'] ?></td>
							<td><?php echo $row['no_bantex'] ?></td>
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
							<td><?php echo $row['pic_input'] ?></td>
							<td><?php echo $row['tgl_input'] ?></td>
							<td><?php 
									if ($row['pic_cek'] == ''){
										echo '<span class="label label-danger">Belum di cek</span>';
									} else {
										echo('<i class="fa fa-check-circle"></i> '.$row['pic_cek']); 
									}
								?>
							</td>
							<td><?php 
									if ($row['tgl_cek'] == '0000-00-00 00:00:00'){
										echo '<span class="label label-danger">Belum di cek</span>';
									} else {
										echo(''.$row['tgl_cek']); 
									}
								?>
							</td>
							<td><?php echo $row['proses'] ?></td>
							<td><?php echo $row['note'] ?></td>
							<td><?php echo $row['ip_address'] ?></td>
							
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
<script type="text/javascript">
$(document).ready( function () {
var oTable = $('#tbl').dataTable( {
    "sScrollX": "100%",
    "sScrollXInner": "250%",
    "bScrollCollapse": true,
    "bPaginate": false
} );
new FixedColumns( oTable );
} );
</script>