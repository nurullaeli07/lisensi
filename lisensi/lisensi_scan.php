<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
include "../config/conn.php";
?>
<style>
		.content {
			margin-top: 80px;
		}
		.btn-file {
			position: relative;
			overflow: hidden;
		}
		.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			background: red;
			cursor: inherit;
			display: block;
		}
		input[readonly] {
			background-color: white !important;
			cursor: text !important;
		}
	</style>
<!---=========================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
    
<!---=========================================================================================================--->    
    	
		<!-- Page Heading Buka -->
        <div class="row">
        	<div class="col-lg-12">
            	<h3 class="page-header"><i class="fa fa-upload"></i> <strong>Upload File</strong></h3>
                <ol class="breadcrumb">
                	<li class="active">
                    	<i class="fa fa-home"></i> 
                        <a href="../config/index.php" title="Kembali Ke Beranda">Beranda</a> &raquo; 
                        <a href="lisensi.php" title="Lihat Data License">Data Lisensi</a> &raquo; Upload File
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->
<!---=========================================================================================================--->
        <!-- /.Page Content Buka-->
        <div class="row"> 
        	<div class="col-lg-12">
            	<div class="panel panel-info">
				<div class="panel-heading" align="center"><i class="fa fa-upload"></i> Upload Hasil Scan Lisensi untuk <br>ID Lisensi : <strong><?php echo $_GET['id_license']; ?></strong></div>
                	<div class="panel-body">
                    
<!---=========================================================================================================--->                    
	
			
			
			<?php
			$id_license = $_GET['id_license'];			
			$sql = mysqli_query($koneksi, "SELECT * FROM t_license WHERE id_license='$id_license'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_FILES['fileToUpload'])){
				$target_dir = "../scan/";
				$target_file =$target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				if(isset($_POST["upload"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}

				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo '<div class="alert alert-danger">File size terlalu besar.</div>';
					$uploadOk = 0;
				}
				
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" && $imageFileType != "tif") {
					echo '<div class="alert alert-danger">Hanya JPG, JPEG, PNG & GIF yang di izinkan.</div>';
					$uploadOk = 0;
				}
				
				if ($uploadOk == 0) {
					echo '<div class="alert alert-danger">File gagal di upload.</div>';
				} else {
					$file = $target_dir.''.$id_license.'.'.$imageFileType;
					$new = '../scan/'.$id_license.'.'.$imageFileType;
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
						$up = mysqli_query($koneksi, "UPDATE t_license SET file_gambar='$new' WHERE id_license='$id_license'");
						if($up){
							echo '<script language="javascript">window.location = "../lisensi/lisensi.php"</script>';
						}
					} else {
						echo '<div class="alert alert-danger">File gagal di upload.</div>';
					}
				}
			}
			
			if(isset($_GET['sukses']) == 'ya'){
				echo '<div class="alert alert-success">File berhasil di upload.</div>';
			}
			?>
				<div align="center">
				<?php
					if ($row['file_gambar'] == ''){
						echo '<img src="../assets/img/none.jpg" alt="..." class="img-thumbnail" width=270px height=auto/>';
						echo '<br><br>';
						} else {
							echo '<img src='.$row['file_gambar'].' alt="..." class="img-thumbnail" width=155px height=auto />';
							echo '<br><br>';
						}
				?>
				</div>
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
					<label class="col-sm-3 control-label">Pilih file</label>
						<div class="col-sm-6">
							<div class="input-group">
							<input type="text" class="form-control" readonly>
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										Browse&hellip;<input type="file" name="fileToUpload" class="form-control">		
									</span>
								</span>
								
							</div>
						</div>	
					</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
						<div class="col-sm-6">
								<button type="submit" name="upload" class="btn btn-success">
								<span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
						</div>	
					</div>
				</form>
		<!---=====================================================================================================================--->				
                	
                    </div>
                </div>
			</div>
    	</div>
		<!-- Page Content Tutup -->
        
<!---=====================================================================================================================--->        
	
	</div>
</div>
<!-- Page Wrapper Tutup -->
<!---=====================================================================================================================--->
</script>
<?php
include '../config/footer.php';
?>
	<script>
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});
	
	$(document).ready( function() {
		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			var input = $(this).parents('.input-group').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}
		});
	});
	</script>
</body>
</html>