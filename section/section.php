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
                <h3 class="page-header"><i class="fa fa-university"></i> <strong>Data Section</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Data Section
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
					<!-- Tombol untuk menambah data section -->					<p>
					<a href="../section/section_add.php" title="Tambah Data Pengembang" class="btn btn-primary btn-md">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a><br/>
					</p>
<!---=================================================================================================================--->
					
					<table id="table" class="display table table-th table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Departement</th>
							<th>Section</th>
							<th>Kode Section</th>
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
						//menampilkan data section dari database
						$res = $mysqli->query("SELECT * FROM t_section");
						$no = 1;
						while ($row = $res->fetch_assoc())
						{
					?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['departement'] ?></td>
							<td><?php echo $row['section'] ?></td> 
							<td><?php echo $row['kode_section'] ?></td>
							<td><?php echo $row['status'] ?></td>							
							<?php
							if ($_SESSION['level'] == "admin"){
							?>
							<td>
								<a href="../section/section_update.php?id=<?php echo $row['id'] ?>" title="Edit Data Section" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Edit</a>
								<a href="../section/section_delete.php?id=<?php echo $row['id'] ?>" title="Hapus Data Section" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Hapus</a>
							</td>
							<?php
							}
							else if ($_SESSION['level'] == "user"){	
							}
							?>
						</tr>
												  
						<!--- Penomoran --->
						<?php
							$no++;
						}
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

