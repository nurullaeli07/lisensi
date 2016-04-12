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

<!-- Page Wrapper Buka-->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
	
        <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-trash"></i><strong> Hapus Data Vendor</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../vendor/vendor.php" title="Lihat Data Vendor">Data Vendor</a> &raquo; Hapus Data Vendor
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

 <!---=================================================================================================================--->
 
		<!-- /.Page Content Buka --> 
		<div class="row"> 
			<div class="col-lg-12">
                <div class="panel panel-info">
					<div class="panel-heading"><i class="fa fa-trash"></i>  Data Vendor</div>
                    <div class="panel-body">

<!---=================================================================================================================---> 
					<?php
					include '../config/koneksi.php';
					$id = $_GET['id'];
					$query = mysql_query("select * from t_vendor where id='$id'") or die(mysql_error());
					$data = mysql_fetch_assoc($query);
					?>
 
 
<!---=================================================================================================================--->
						<form id="update"  method="POST" class="form-horizontal">
							<!-------------------------------------------------------->  
							<div class="alert alert-danger">
								<div align="Center">
									<i class="fa fa-warning fa-2x"></i>  <h5><strong>Apa anda yakin akan menghapus data ini???</strong></h5>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-5 control-label">ID</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-5 control-label">vendor</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="vendor" value="<?php echo $data['vendor']?>" readonly>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-5 control-label">Alamat</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" readonly>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-5 control-label">E-mail</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" readonly>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-5 control-label">Telepon</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="telepon" value="<?php echo $data['telepon']; ?>" readonly>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-5 control-label">Fax</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="fax" value="<?php echo $data['fax']; ?>" readonly>
								</div>
							</div>
							<!-------------------------------------------------------->
							<br>
								<div class="form-actions well">
								<div class="form-group">
									<label class="col-sm-5 control-label">&nbsp;</label>
										<div class="col-sm-6">
										<!-- Button untuk Update data -->
										<button type="submit" name="update" class="btn btn-danger btn-md" title="Update Data vendor">
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Ya</button>
										<!-- Button untuk kembali ke halaman sebelumnya -->
										<a href="../vendor/vendor.php" class="btn btn-md btn-default" title="Kembali">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Tidak</a>
										</div>
								</div>
								</div>
							<!-------------------------------------------------------->
						</form>
<!---=====================================================================================================================--->				
                	
                    </div>
                </div>
			</div>
    	</div>
		<!-- Page Content Tutup -->
       
<!---=====================================================================================================================--->

<?php
include '../config/footer.php';
?>

<!---=====================================================================================================================--->
<?php
include('../config/config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
$id						= $_POST['id'];
$vendor					= $_POST['vendor'];
$alamat					= $_POST['alamat'];
$email					= $_POST['email'];
$telepon				= $_POST['telepon'];
$fax					= $_POST['fax'];
$proses					= 'Delete';
$note					= '-';
date_default_timezone_set('Asia/Jakarta');
$tgl_input   			= date("Y-m-d H:i:s");
$pic_input				= $_SESSION['userid'];
$ip_address				= $_SERVER['REMOTE_ADDR'];

if(isset($vendor) && isset($alamat) && isset($email) && isset($telepon) && isset($fax) && isset($proses) && isset($note)&& isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
$res1 = $mysqli->query("INSERT into t_vendor_history values('', '$vendor', '$alamat', '$email', '$telepon', '$fax', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
$res2 = $mysqli->query("delete from t_vendor where id='$id'");	
						  
if ($res1 && $res2)  {
	echo '<script language="javascript">alert("Data Berhasil Di Hapus")</script>';
	echo '<script language="javascript">window.location = "../vendor/vendor.php"</script>';
	}else{
	}
	echo '<script language="javascript">alert("Data Gagal Di Hapus")</script>';
	echo '<script language="javascript">window.location = "../vendor/vendor_delete.php"</script>';
}
?>
<!---=====================================================================================================================--->
