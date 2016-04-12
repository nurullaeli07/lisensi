<?php
include '../session/admin.php';
include '../config/config.php';
include '../config/header.php';

?>

<!---=================================================================================================================--->

<!-- Page Heading Buka -->
<div id="page-wrapper">
    <div class="container-fluid">
			
<!---=================================================================================================================--->

        <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-desktop"></i> <strong>Penggunaan Lisensi</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Penggunaan Lisensi
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=================================================================================================================--->
				
        <!-- /.Page Content Buka -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
					
<!---=================================================================================================================--->

					<table width="100%">
					<tr>
						<td align="right">
							<div class="btn-group" role="group">
								<button type="button" title="Export Data Penggunaan Lisensi" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
								<span class="glyphicon glyphicon-export" aria-hidden="true"></span> Export <span class="caret"></span></button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="../laporan/excel_penggunaan.php"><i class="fa fa-file-excel-o fa-fw"></i> Excel</a></li>
										<li><a href="../laporan/pdf_penggunaan.php"><i class="fa fa-file-pdf-o fa-fw"></i> PDF</a></li>
									</ul>
							</div>
						</td>
					</tr>
					</table>
					<br/>
					

<!---=================================================================================================================--->
					
					<form action="" method="get">
						<div class="input-group col-md-5 col-md-offset-7">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
							<select type="submit" name="id_license" class="form-control" onchange="this.form.submit()">
								<option>Pilih ID Lisensi ..</option>
								<?php 
								$pil=mysql_query("select distinct id_license from t_penggunaan_lisensi order by id_license desc");
								while($p=mysql_fetch_array($pil)){
									?>
									<option><?php echo $p['id_license'] ?></option>
									<?php
								}
								?>			
							</select>
						</div>
					</form>
					<br>
					<?php 
					if(isset($_GET['id_license'])){
						echo "<div class='alert alert-success alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
						<i class='fa fa-info-circle fa-fw'></i> Data Penggunaan Lisensi  untuk ID : <strong>  ". $_GET['id_license']."</strong></div>";
					}
					?>
					<table id="table" class="display table table-striped table-hover" cellspacing="0" width="100%">
						<tr>
							<th>ID</th>
							<th>Nama PC</th>
							<th>ID PC</th>
							<th>Section</th>
							<th>ID Lisensi</th>
							<th>Jumlah</th>
							<th>PIC Instal</th>
							<th><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tanggal Instal</th>
							<th>Action</th>
						</tr>
						<?php 
						if(isset($_GET['id_license'])){
							$tanggal=mysql_real_escape_string($_GET['id_license']);
							$brg=mysql_query("select * from t_penggunaan_lisensi where id_license like '$tanggal' order by id_license desc");
						}else{
							$brg=mysql_query("select * from t_penggunaan_lisensi order by id_license desc");
						}
						$no=1;
						while($row=mysql_fetch_array($brg)){

						?>
						<tr>
							<td align="center"><?php echo $no++ ?></td>
							<td><?php echo $row['nama_pc']; ?></a></td>
							<td><i class="fa fa-desktop fa-fw"></i> <?php echo $row['id_pc'] ?></td>
							<td><?php echo $row['section_pemilik'] ?></td>
							<td><?php echo $row['id_license'] ?></td>
							<td align="center"><?php echo $row['jumlah'] ?></td>
							<td><?php echo $row['pic_instalasi'] ?></td>
							<td><?php echo $row['tgl_instalasi'] ?></td>
							<td>
								<!-- Button untuk meng-update data -->	
								<a href="../pc/pc_update.php?id=<?php echo $row['id'] ?>"" title="Edit Data PC" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<!-- Button untuk menghapus data -->
								<a onclick="return confirm('Yakin akan di hapus?')" href="pc_delete.php?d=<?php echo $row['id'] ?>"title="Hapus Data PC" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						<?php 
						}
						?>
						<tr>
						<td></td>
						<td colspan="4"><strong><i class="fa fa-calculator fa-fw"></i> Total Penggunaan License :</strong></td>
						<td align="center"><strong>
						<?php 
						if(isset($_GET['id_license'])){
							$tanggal=mysql_real_escape_string($_GET['id_license']);
							$x=mysql_query("select sum(jumlah) as total from t_penggunaan_lisensi where id_license='$tanggal'");	
							$xx=mysql_fetch_array($x);			
							?>
							<?php echo $xx['total'];?>
							<?php
						}else{

						}

						?></strong>
						</td>
						<td colspan="3"></td>
						</tr>
						<tr><td colspan="9"></td></tr>
					</table>

<!---=================================================================================================================--->

					</div>
				</div>
			</div>
        </div>
        <!-- /.Page Content Tutup -->
				
<!---=================================================================================================================--->
    
	</div>
</div>
<!-- /.Page Wrapper Tutup -->	
	    
<!---=================================================================================================================--->

<?php
//menampilkan halaman footer
include "../config/footer.php";
?>