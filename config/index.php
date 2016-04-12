<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';

$a = mysql_query("select * from t_penggunaan_lisensi");
?>
<!---====================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
    
<!---=========================================================================================================================--->            
		<!-- Page Heading Buka -->
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-home"></i><strong> Beranda</strong></h3>
			</div>
        </div>
        <!-- /.Page Heading Tutup -->
		
<!---=========================================================================================================================--->
		<!-- Page Content -->
        <div class="row"> 
        	<div class="col-lg-12">
            	<div class="panel panel-info">
					<div class="panel-heading"><i class="fa fa-info-circle"></i></div>
					<div class="panel-body">
					
<!---=========================================================================================================================--->
						<br>
						<!-- /.row -->
						<div class="row">
							<!-------------------------------------------------------->
							<div id="shortcut">
								<a href="../lisensi/lisensi_filstat.php"><img src="../assets/img/short1.png"><br>Data Lisensi</a>
								<a href="../pc/pc.php"><img src="../assets/img/short2.png"><br>Penggunaan</a>
								<a href="../user/user.php"><img src="../assets/img/user.png" width="64"><br>Daftar User</a>	
								<a href="../user/user_add.php"><img src="../assets/img/useradd.png" width="64"><br>Tambah User</a>
							<div>
							
							<!-------------------------------------------------------->
						</div>
						<br><br>
				
<!---=========================================================================================================================--->
						<!-- /.row -->
						<div class="row">
							<!-------------------------------------------------------->
							<div id="shortcut">
								<a href="../tmp/backup.php"><img src="../assets/img/backup.png" width="64"><br>Backup Data</a>
								<a href="../tmp/recovery_data.php"><img src="../assets/img/restore.png" width="64"><br>Restore Data</a>								
							<div>
							
							<!-------------------------------------------------------->
						</div>
						<br>
<!---=========================================================================================================================--->
					</div>	
				</div>
			</div>
		</div>
        <!-- /.Page Content Tutup -->
		<br>
		
<!---=========================================================================================================================--->

	</div>
</div>
<!-- /.Page Wrapper Tutup -->
<br><br>
<!---=========================================================================================================================--->

<?php
include "../config/footer.php";
?>
