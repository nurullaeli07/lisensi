<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';

?>
<!---=========================================================================================================--->
		<div id="page-wrapper">
            <div class="container-fluid">
<!---=========================================================================================================--->			
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-edit"></i> <strong>Edit Data Vendor</strong></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-home"></i> 
								 <a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; <a href="vendor.php" title="Lihat Data Vendor">Data Vendor</a> &raquo; Edit Data Vendor
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<!---=========================================================================================================--->
                <!-- /.row -->
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="panel panel-info">
						<div class="panel-heading"><i class="fa fa-edit"></i>  Data Vendor</div>
                            <div class="panel-body">
							
<!---=========================================================================================================--->							
							
							<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id						= $_POST['id'];
							$vendor					= $_POST['vendor'];
							$alamat					= $_POST['alamat'];
							$email					= $_POST['email'];
							$telepon				= $_POST['telepon'];
							$fax					= $_POST['fax'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($vendor) && isset($alamat) && isset($email) && isset($telepon) && isset($fax)&& isset($proses) && isset($note)&& isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_vendor_history values('', '$vendor', '$alamat', '$email', '$telepon', '$fax', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_vendor SET vendor = '$vendor', alamat = '$alamat' WHERE id = '$id'");
							  
							if ($res1 && $res2)  

							{
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="vendor.php">kembali</a>.
							</div>
							<?php
							}
							else
								{
							}							
								echo $stmt->error; 						
							}
							?>
							
							<?php
							include '../config/koneksi.php';
							$id = $_GET['id'];							 
							$query = mysql_query("select * from t_vendor where id='$id'") or die(mysql_error());
							$row = mysql_fetch_assoc($query);
							?>
<!---=========================================================================================================--->	      
							<form id="validator" class="form-horizontal" action="" method="post">
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">ID</label>
									<div class="col-sm-4">
										<input type="text" name="id" class="form-control" value="<?php echo $row['id'] ?>" readonly>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Vendor</label>
									<div class="col-sm-4">
										<input type="text" name="vendor" class="form-control" value="<?php echo $row['vendor'] ?>" required>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label"><i class='fa fa-map-marker fa-fw'></i> Alamat</label>
									<div class="col-sm-7">
										<textarea class="form-control" rows="6" name="alamat"><?php echo $row['alamat'] ?></textarea>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Email</label>
									<div class="col-sm-4">
										<input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" required>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Telepon</label>
									<div class="col-sm-4">
										<input type="text" name="telepon" class="form-control input-mask-phone" id="form-field-mask-2" value="<?php echo $row['telepon'] ?>" required>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Fax.</label>
									<div class="col-sm-4">
										<input type="text" name="fax" class="form-control input-mask-fax" id="form-field-mask-2" value="<?php echo $row['fax'] ?>" required>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Note</label>
										<div class="col-sm-8">
											<textarea rows="6" class="form-control" name="note"><?php echo $row['note'] ?></textarea>
										</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-actions well">
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<button type="submit" name="update" class="btn btn-success btn-md" title="Update Data Vendor"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
										<a href="vendor.php" title="Kembali" class="btn btn-md btn-default"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
									</div>
								</div>
								</div>
								<!-------------------------------------------------------->
							</form>
<!---=========================================================================================================--->							
						</div>
                    </div>
                </div>
                <!-- /.row -->
<!---=========================================================================================================--->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->	
<!---=========================================================================================================--->
    
<?php
include '../config/footer.php';
?>

<script type="text/javascript">
$(document).ready(function() {
    $('#validator').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            vendor: {
                validators: {
                    notEmpty: {
                        message: 'Nama Vendor Harus di isi'
                    },
					regexp: {
                        regexp: /^[a-zA-Z_\ .]+$/,
                        message: 'Nama Vendor tidak valid'
                    }
                }
            },	
			alamat: {
                validators: {
                    notEmpty: {
                        message: 'Alamat tidak boleh kosong'
					},
					stringLength: {
                    max: 300,
                        message: 'Alamat tidak bisa lebih dari 300'
                    }
                }
            },	
			email: {
                validators: {
                    notEmpty: {
                        message: 'E-mail tidak boleh kosong'
                    },
					regexp: {
                        regexp: /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/,
                        message: 'E-mail tidak valid'
                    }
                }
            },	
			telepon: {
                validators: {
                    notEmpty: {
                        message: 'Telepon harus di isi'
                    }
                }
            },	
            fax: {
                validators: {
                    notEmpty: {
                        message: 'Fax harus di isi'
                    }
                }
            },
			note: {
                validators: {
                    notEmpty: {
                        message: 'Note tidak boleh kosong'
                    },
                stringLength: {
                    max: 300,
                        message: 'Note tidak bisa lebih dari 300'
					}
                }
            },
        }
    });
});
</script>

<!---=====================Function Untuk Validasi Data===============================--->
</body>
</html>