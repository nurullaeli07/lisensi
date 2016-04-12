<?php
//menampilkan session
include "../session/admin.php";
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
                <h3 class="page-header"><i class="fa fa-university"></i> <strong>Rekap Data Vendor</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Rekap Data Vendor
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

					
			
					<table id="table" class="display table table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Vendor</th>
							<th>Alamat</th>
							<th>Contact Person</th>
							<th>Proses</th>
							<th>Note</th>
							<th>Author</th>
							<th>Tanggal Proses</th>
							<th>IP Address</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$res = $mysqli->query("SELECT * FROM t_vendor_history");
						while ($row = $res->fetch_assoc()):
					?>
		   
						<tr>
							<td align="center"><?php echo $row['id'] ?></td>
							<td><?php echo $row['vendor'] ?></td>
							<td><i class='fa fa-map-marker fa-fw'></i> <?php echo $row['alamat'] ?>
							<td><i class='fa fa-envelope-o fa-fw'></i> E-mail : <?php echo $row['email'] ?>
								<br><i class='fa fa-phone fa-fw'></i> Telp.  : <?php echo $row['telepon'] ?>
								<br><i class='fa fa-print fa-fw'></i> Fax. : <?php echo $row['fax'] ?>
							</td>
							<td><?php echo $row['proses'] ?></td>
							<td><?php echo $row['note'] ?></td>
							<td><?php echo $row['pic_input'] ?></td>
							<td><?php echo $row['tgl_input'] ?></td>
							<td><?php echo $row['ip_address'] ?></td>
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