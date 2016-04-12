<?php
//menampilkan session
include "../session/admin.php";
//menampilkan header halaman
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

					<a href="pc_excel.php" title="Cetak Data PC ke Excel" class="btn btn-primary btn-md">
					<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Excel</a>
					<!-- Button untuk Export ke PDF -->
					<a href="pc_pdf.php" title="Cetak Data PC ke PDF" class="btn btn-primary btn-md">
					<span class="glyphicon glyphicon-print" aria-hidden="true"></span> PDF</a>
					<br/>
					</p>

<!---=================================================================================================================--->

					<table id="tbl" class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama PC</th>
							<th>ID PC</th>
							<th>Section Pemilik</th>
							<th>ID Lisensi</th>
							<th>jumlah</th>
							<th>PIC Instal</th>
							<th><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tanggal Instal</th>
							<th>Proses</th>
							<th>Note</th>
							<th>Author</th>
							<th><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tanggal Proses</th>
							<th>IP Address</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//menampilkan data pc dari database
							$res = $mysqli->query("SELECT * FROM t_penggunaan_lisensi_history");
							while ($row = $res->fetch_assoc()):
						?>
						<tr>
							<td align="center"><?php echo $row['id'] ?></td>
							<td><?php echo $row['nama_pc']; ?></a></td>
							<td><i class="fa fa-desktop fa-fw"></i> <?php echo $row['id_pc'] ?></td>
							<td><?php echo $row['section_pemilik'] ?></td>
							<td><?php echo $row['id_license'] ?></td>
							<td><?php echo $row['jumlah'] ?></td>
							<td><?php echo $row['pic_instalasi'] ?></td>
							<td><?php echo $row['tgl_instalasi'] ?></td>
							<td><?php echo $row['proses'] ?></td>
							<td><?php echo $row['note'] ?></td>
							<td><?php echo $row['pic_input'] ?></td>
							<td><?php echo $row['tgl_input'] ?></td>
							<td><?php echo $row['ip_address'] ?></td>
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
<!-- /.Page Wrapper Tutup -->	
	    
<!---=================================================================================================================--->

<?php
//menampilkan halaman footer
include "../config/footer.php";
?>
<script type="text/javascript">
$(document).ready( function () {
var oTable = $('#tbl').dataTable( {
    "sScrollX": "100%",
    "sScrollXInner": "150%",
    "bScrollCollapse": true,
    "bPaginate": false
} );
new FixedColumns( oTable );
} );
</script>