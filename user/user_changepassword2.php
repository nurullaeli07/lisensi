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
	
		<!-- Page Heading Buka-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-lock"></i><strong> Ganti Password</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda </a> &raquo; Ganti Password
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=================================================================================================================--->
		
        <!-- Page Content Buka -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-info">
					<div class="panel-heading"><i class="fa fa-unlock"></i>  Ganti Password</div>
                    <div class="panel-body">

<!---=================================================================================================================--->
					<?php
					//action untuk mengganti password
					include '../config/config.php';
					if(isset($_POST['ganti'])){
						$userid		= $_GET['userid'];
						$password 	= md5($_POST['password']);
						$password1 	= $_POST['password1'];
						$password2 	= $_POST['password2'];
						
						$cek = mysqli_query($koneksi, "SELECT * FROM t_user WHERE userid='$userid' AND password='$password'");
						if(mysqli_num_rows($cek) == 0){
							echo '<div class="alert alert-danger">Password sekarang tidak tepat.</div>';
						}else{
							if($password1 == $password2){
								if(strlen($password1) >= 5){
									$pass = md5($password1);
									$update = mysqli_query($koneksi, "UPDATE t_user SET password='$pass' WHERE userid='$userid'");
									if($update){
										echo '<div class="alert alert-success">Password berhasil dirubah.</div>';
									}else{
										echo '<div class="alert alert-danger">Password gagal dirubah.</div>';
									}
								}else{
									echo '<div class="alert alert-danger">Panjang karakter Password minimal 5 karakter.</div>';
								}
							}else{
								echo '<div class="alert alert-danger">Konfirmasi Password tidak tepat.</div>';
							}
						}
					}
					?>
			
					<form class="form-horizontal" action="" method="post">
						<div class="form-group">
							<label class="col-sm-3 control-label">Userid</label>
							<div class="col-sm-2">
								<input type="text" name="userid" class="form-control" value="<?php echo "".$_SESSION['userid']."";?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Password Sekarang</label>
							<div class="col-sm-3">
								<input type="password" name="password" class="form-control" placeholder="Masukkan Password Sekarang" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Password Baru</label>
							<div class="col-sm-3">
								<input type="password" name="password1" class="form-control" placeholder="Masukkan Password Baru" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
							<div class="col-sm-3">
								<input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password Baru" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-6">
								<button type="submit" name="ganti" class="btn btn-primary">
								<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Ganti</button>
							</div>
						</div>
					</form>
					
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
include '../config/footer.php';
?>