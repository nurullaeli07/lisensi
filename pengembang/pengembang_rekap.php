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
                <h3 class="page-header"><i class="fa fa-building"></i><strong> Rekap Data Pengembang</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda"> Beranda</a> &raquo; Rekap Data Pengembang
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

					<table id="tbl" class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Pengembang Software</th>
							<th>Proses</th>
							<th>Note</th>
							<th>Author</th>
							<th>Tanggal Proses</th>
							<th>IP Address</th>
						</tr>
					</thead>
					<tbody>
					<?php
						//menampilkan data departement dari database
						$res = $mysqli->query("SELECT * FROM t_pengembang_history");
						$no = 1;
						while ($row = $res->fetch_assoc())
						{
					?>
					   
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['pengembang'] ?></td>
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
<script type="text/javascript">
$(document).ready( function () {
var oTable = $('#tbl').dataTable( {
    "bPaginate": false
} );
new FixedColumns( oTable );
} );
</script>
