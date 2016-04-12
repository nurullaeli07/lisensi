<?php
//menampilkan session
include "../session/user.php";
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

<!---=================================================================================================================--->
<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
	
        <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-building"></i> <strong>Data Departemen</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda"> Beranda</a> &raquo; Data Departemen
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=================================================================================================================--->

        <!-- Page Content Buka -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

<!---=================================================================================================================--->
					<!-- Tombol untuk menambah data departement -->
					<p>
					<a href="../departement/departement_add.php" title="Tambah Data Pengembang" class="btn btn-primary btn-md">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a><br/>
					</p>
<!---=================================================================================================================--->

					<table id="table" class="display table table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Departemen</th>
							<th>Kode Departemen</th>
							<th>Status</th>
							<?php
							if ($_SESSION['level'] == "admin"){
							?>
							<th>Opsi</th>
							<?php
							}
							else if ($_SESSION['level'] == "user"){	
							}
							?>
						</tr>
					</thead>
					<tbody>
					<?php
							//menampilkan data pc dari database
							$res = $mysqli->query("SELECT * FROM t_departement");
							$no =1;
							while ($row = $res->fetch_assoc()):
						?>
					   
						<tr>
							<td align="center"><?php echo $no++; ?></td>							 
							<td><?php echo $row['departement'] ?></td>
							<td><?php echo $row['kode_departement'] ?></td>
							<td><?php if($row['status'] == 'Aktif'){
										echo '<span class="label label-success">Aktif</span>';
									} else if ($row['status'] == 'Tidak Aktif' ){
										echo '<span class="label label-danger">Tidak Aktif</span>';
									}	
										echo '';
								?>
							</td>
							<?php
							if ($_SESSION['level'] == "admin"){
							?>
							<td>
								<a href="../departement/departement_update.php?id=<?php echo $row['id'] ?>" title="Edit Data Departement" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Edit</a>
								<a href="../departement/departement_delete.php?id=<?php echo $row['id'] ?>" title="Hapus Data Departement" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Hapus</a>
							</td>
							<?php
							}
							else if ($_SESSION['level'] == "user"){	
							}
							?>
						</tr>
						<?php
							//menutup action tampil data
							endwhile; 
						?>
					</tbody>
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
<!-- /.Page Wrapper -->	

<!---=================================================================================================================--->
	    	    
<?php
include "../config/footer.php";
?>


