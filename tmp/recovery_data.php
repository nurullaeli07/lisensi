<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>
<!---=================================================================================================================--->

<!-- Page Wrapper Tutup -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
			
        <!-- Start of Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-upload"></i><strong> Restore Data</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Restore Database Lisensi
                    </li>
                </ol>
            </div>
        </div>
        <!-- End of Page Heading -->
				
<!---=================================================================================================================--->

        <!-- Start of Page Content -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-info">
					<div class="panel-heading"><i class="fa fa-download"></i>  Restore Data</div>
                    <div class="panel-body">

<!---=================================================================================================================--->

					Restore semua data yang ada didalam database &quot;<strong>kontrollicense</strong>&quot;.
					<br><br><br><br>
						<form enctype="multipart/form-data" action="recovery_data.php" method="post">
							<label>File Backup Database (*.sql)</label>
								<input type="file" name="datafile" size="50"  />
								<br>
								<button type="submit" onclick="return confirm('Apakah Anda yakin akan restore database?')" name="restore" class="btn btn-success btn-md" title="Restore Data" id="loading-btn">
								<i class="fa fa-upload"></i> Restore Data</button>
						</form>

						<?php
						if(isset($_POST['restore'])){
							$koneksi=mysql_connect("localhost","root","");
							mysql_select_db("kontrollicense",$koneksi);
							
							$nama_file=$_FILES['datafile']['name'];
							$ukuran=$_FILES['datafile']['size'];
							
							//periksa jika data yang dimasukan belum lengkap
							if ($nama_file=="")
							{
								echo "Fatal Error";
							}else{
								//definisikan variabel file dan alamat file
								$uploaddir='./restore/';
								$alamatfile=$uploaddir.$nama_file;

								//periksa jika proses upload berjalan sukses
								if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
								{
									
									$filename = './restore/'.$nama_file.'';
									
									// Temporary variable, used to store current query
									$templine = '';
									// Read in entire file
									$lines = file($filename);
									// Loop through each line
									foreach ($lines as $line)
									{
										// Skip it if it's a comment
										if (substr($line, 0, 2) == '--' || $line == '')
											continue;
									 
										// Add this line to the current segment
										$templine .= $line;
										// If it has a semicolon at the end, it's the end of the query
										if (substr(trim($line), -1, 1) == ';')
										{
											// Perform the query
											mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
											// Reset temp variable to empty
											$templine = '';
										}
									}
									?>
									<p align="center">&nbsp;</p>
									<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4><strong>Berhasil Restore Database</strong></h4> 
									<a href="http://localhost/phpmyadmin/index.php?db=kontrollicense">Silahkan di Cek</a> 
									</div>
									<?php
								
								}else{
									//jika gagal
									echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
								}	
							}

						}else{
							unset($_POST['restore']);
						}
						?>

<!---=================================================================================================================--->
        
                    </div>
                </div>
            </div>
		</div>		
        <!-- /.Page Content Tutup -->
				
<!---=================================================================================================================--->
            
	</div>
</div>
<!-- /,Page Wrapper Tutup -->	  

<!---=================================================================================================================--->        

<?php
include '../config/footer.php';
?>
	