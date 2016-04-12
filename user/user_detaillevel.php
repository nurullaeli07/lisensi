<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/koneksi.php';


//action menampilkan data leveluser dari database
$level = $_GET['level'];
$sql = mysql_query("SELECT * FROM t_leveluser WHERE level='$level'");
if(mysql_num_rows($sql) == 0){
	header("Location: user.php");
}else{
	$row = mysql_fetch_assoc($sql);
}

//---=================================================================================================================---//

//action untuk menghapus data leveluser dari database			
if(isset($_GET['proses']) == 'delete'){
	$delete = mysql_query("DELETE FROM t_leveluser WHERE level='$level'");
	if($delete){
		echo '<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
	}else{
		echo '<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
	}
}
?>

<!---=================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">
 <!---=================================================================================================================--->        
		<!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user"></i> <strong>Detail Level User</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../user/user.php" title="Lihat Daftar User">Daftar User</a> &raquo; Detail Level User
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
					<form class="form-horizontal">
                        	<div class="form-group">
							<label class="col-sm-3 control-label">Level</label>
								<div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $row['level']; ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group">
							<label class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
							<label class="col-sm-3 control-label">Note</label>
								<div class="col-sm-6">
                                    <input type="text" class="form-control" value="<?php echo $row['note']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
							<label class="col-sm-3 control-label"></label>
								<div class="col-sm-6">
                                    <a href="../user/user.php" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
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
//menampilkan footer halaman
include '../config/footer.php';
?>