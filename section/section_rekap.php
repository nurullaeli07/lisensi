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

<!---=================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
	
        <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-link"></i> <strong>Rekap Data Section</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Rekap Data Section
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
					
<!---=================================================================================================================--->
					
					<table id="table" class="display table table-th table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Departement</th>
							<th>Section</th>
							<th>Kode Section</th>
							<th>Status</th>
							<th>Proses</th>
							<th>Note</th>
							<th>Author</th>
							<th>Tanggal Proses</th>
							<th>IP Address</th>
						 </tr>
					</thead>
					<tbody>
					<?php
						//menampilkan data section dari database
						$res = $mysqli->query("SELECT * FROM t_section_history");
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
							<td><?php echo $row['proses'] ?></td>
							<td><?php echo $row['note'] ?></td>
							<td><?php echo $row['pic_input'] ?></td>
							<td><?php echo $row['tgl_input'] ?></td>
							<td><?php echo $row['ip_address'] ?></td>
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

