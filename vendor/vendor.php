<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>

<!---=================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
 <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-university"></i> <strong>Data Vendor</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Data Vendor
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

					<table width="100%">
					<tr>
						<td><a href="vendor_add.php" title="Tambah Data Vendor" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a><br/>
						</td>
						<td align="right">
							<div class="btn-group" role="group">
								<button type="button" title="Export Data Vendor" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
								<span class="glyphicon glyphicon-export" aria-hidden="true"></span> Export <span class="caret"></span></button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="../laporan/excel_vendor.php"><i class="fa fa-file-excel-o fa-fw"></i> Excel</a></li>
										<li><a href="../laporan/pdf_vendor.php"><i class="fa fa-file-pdf-o fa-fw"></i> PDF</a></li>
									</ul>
							</div>
						</td>
					</tr>
					</table>
					<br/>
			
					<table id="table" class="display table table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Vendor</th>
							<th>Alamat</th>
							<th>Contact Person</th>
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
						$res = $mysqli->query("SELECT * FROM t_vendor");
						while ($row = $res->fetch_assoc()):
					?>
		   
						<tr>
							<td align="center"><?php echo $row['id'] ?></td>
							<td><?php echo $row['vendor'] ?></td>
							<td><i class='fa fa-map-marker fa-fw'></i> <?php echo $row['alamat'] ?>
							<td><i class='fa fa-envelope-o fa-fw'></i> E-mail : <?php echo $row['email'] ?>
							<br><i class='fa fa-phone fa-fw'></i> Telp.  : <?php echo $row['telepon'] ?>
							<br><i class='fa fa-print fa-fw'></i> Fax. : <?php echo $row['fax'] ?></td>
							<?php
							if ($_SESSION['level'] == "admin"){
							?>
							<td>
							<div class="btn-group">
								<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-gear fa-fw"></i> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="vendor_update.php?id=<?php echo $row['id'] ?>" title="Edit Data Vendor" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></li>
									<li><a href="vendor_delete.php?id=<?php echo $row['id'] ?>" title="Hapus Data Vendor" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a></li>
								</ul>
							</div>
							</td>
							<?php
							}
							else if ($_SESSION['level'] == "user"){	
							}
							?>
						</tr>
					<?php
					endwhile;
					?>
					</tbody>
					</table>

<!---=================================================================================================================--->
					
					</div>
                </div>
            </div>
            <!-- /.row -->

<!---=================================================================================================================--->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->	 
	
<!---=================================================================================================================--->
 
<?php
include "../config/footer.php";
?>