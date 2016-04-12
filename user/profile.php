<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
?>

<!---=================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
 
<!---=================================================================================================================--->
 
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-user-secret"></i> <strong>Profil</strong></h3>
                <ol class="breadcrumb">
                	<li class="active">
                    	<i class="fa fa-home"></i>
                        <a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Profil
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading -->

<!---=================================================================================================================--->

        <!-- Page Content -->
        <div class="row"> 
        	<div class="col-lg-12">
            	<div class="panel panel-info">
                	<div class="panel-body">
					
<!---=================================================================================================================--->
 
					<?php
					//konkesi ke database
                    include '../config/koneksi.php';
					//action untuk menampilkan data user dari database
                    $proses = "select * from t_user where userid = '".$_SESSION['userid']."'";
                    $hasil = mysql_query($proses);
                    $data = mysql_fetch_array ($hasil);
                    ?>
                    <br>
					<!-------------------------------------------------------->
					<div class="col-xs-12 col-sm-6 col-md-8">
                    <form class="form-horizontal" action="" method="post">					
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Lengkap</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="<?php echo $data['nama_lengkap'];?>" disabled>
                            </div>
                        </div>
                        <!-------------------------------------------------------->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Userid</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" value="<?php echo $data['userid'];?>" disabled>
                            </div>
                        </div>   
						<!-------------------------------------------------------->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Level</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" value="<?php echo $data['level'];?>" disabled>
                            </div>
                        </div>
						<!-------------------------------------------------------->
						<?php
						if ($_SESSION['level'] == "admin"){
						?><div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-2">
                                <a href="user_changepassword.php?userid=<?php echo $data['userid'] ?>" title="Ganti Password" class="btn btn-primary btn-sm">
								<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Ganti Password</a>
                            </div>
                        </div>
						<?php
						}
						else if ($_SESSION['level'] == "user"){	
						?>
						<div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-2">
                                <a href="user_changepassword2.php?userid=<?php echo $data['userid'] ?>" title="Ganti Password" class="btn btn-primary btn-sm">
								<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Ganti Password</a>
                            </div>
                        </div>
						<?php
						} 
					?>	
						<!-------------------------------------------------------->
                    </form> 
					</div>
					<!-------------------------------------------------------->
					<div class="col-xs-6 col-md-4">
					<img class="img-responsive img-square " src="../assets/img/avatar.png" width="250">
					</div>
					
<!---=================================================================================================================--->
					
					</div>
				</div>
			</div>
		 </div>
		 <br><br><br><br><br>

         <!-- /.Page Content Tutup -->

<!---=================================================================================================================--->

	</div>
</div>
<!-- /.Page Wrapper Tutup -->

<!---=================================================================================================================--->

<?php
include '../config/footer.php';
?>

