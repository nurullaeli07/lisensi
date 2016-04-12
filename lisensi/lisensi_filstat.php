<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/conn.php';
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
					<td align="left">
							<a href="lisensi_add.php" title="Tambah Data License" class="btn btn-primary btn-md">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>				
						</td>
					<td align="right">
					
					<!-- Untuk Filter Data Aktif dan Tidak Aktif -->
                    <form class="form-inline" method="post">
                        <div class="form-group">
                            <select name="status" class="form-control" onchange="form.submit()">
                                <option value="0">Filter Status</option>
                                <option value="">Semua</option>
								<?php $status = (isset($_POST['status']) ? strtolower($_POST['status']) : NULL);  ?>
                                <option value="Aktif" <?php if($status == 'Aktif'){ echo 'selected'; } ?>>Aktif</option>
                                <option value="Tidak Aktif" <?php if($status == 'Tidak Aktif'){ echo 'selected'; } ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </form>
					<!-- /.Untuk Filter Data Aktif dan Tidak Aktif -->
					
					</td>
					</tr>
					</table>
					<br>
					
<!---=========================================================================================================================--->
					
					<br>
					<table id="table" class="display table table-bordered table-striped table-hover">
					<thead>
     					<tr>
                            <th>ID</th>
          					<th>Pengembang</th>
          					<th>Software</th>
                            <th>Deskripsi</th>
							<th>Qty</th>
          					<th>Status</th>
          					<th>PIC Cek</th>
     					</tr>
					</thead>
					<tbody>

					<?php
						
						if($status){
							//Action Menampilkan data dati database-------------------------------------------
							$sql = mysqli_query($koneksi, "SELECT * FROM t_license WHERE status='$status' ORDER BY id_license ASC");
						}else{
							$sql = mysqli_query($koneksi, "SELECT * FROM t_license ORDER BY id_license ASC");
						}
						if(mysqli_num_rows($sql) == 0){
							echo '';
						}else{
							while($row = mysqli_fetch_assoc($sql)){
								echo '
								<tr>
									<td>'.$row['id_license'].'</td>
									<td>'.$row['pengembang'].'</td>
									<td>'.$row['software'].'</td>
									<td>'.$row['deskripsi'].'</td>
									<td>'.$row['jumlah'].'</td>
									<td>';
									if($row['status'] >= 0){
											echo '<span class="label label-success">Aktif</span>';
										} else if ($row['status'] <0 ){
											echo '<span class="label label-danger">Tidak Aktif</span>';
										}
											echo '
									</td>
									<td>';
										if ($row['pic_cek'] == ''){
											echo '<span class="label label-danger">Belum di cek</span>'; 
										} else {
											echo('<i class="fa fa-check-circle"></i> ' .$row['pic_cek']); 
										}
											echo '
									</td>	
								</tr>
								';
							}
						}
						?>
					</table>

    				<br /><br /><br />
 
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
