<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>
<!---=================================================================================================================--->

		<div id="page-wrapper">
            <div class="container-fluid">
<!---=================================================================================================================--->
			
                <!-- Start of Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-plus-square"></i><strong> Tambah Data Vendor</strong></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> 
								<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
								<a href="../vendor/vendor.php" title="Lihat Data Vendor">Data Vendor</a> &raquo; Tambah Data Vendor
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
							<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data Vendor</div>
                            <div class="panel-body">
							
<!---=================================================================================================================--->
							
							<?php
							if(isset($_POST['bts'])):
							  if($_POST['vendor']!=null &&
							  $_POST['alamat']!=null &&
							  $_POST['email']!=null &&
							  $_POST['telepon']!=null &&
							  $_POST['fax']!=null){
								$stmt1 = $mysqli->prepare("INSERT INTO t_vendor_history(vendor, alamat, email, telepon, fax, proses, note, tgl_input, pic_input,ip_address) VALUES (?,?,?,?,?,?,?,?,?,?)");
								$stmt2 = $mysqli->prepare("INSERT INTO t_vendor(vendor, alamat, email, telepon, fax) VALUES (?,?,?,?,?)"); 
								$stmt1->bind_param('ssssssssss', $vendor, $alamat, $email, $telepon, $fax, $proses, $note, $tgl_input, $pic_input, $ip_address);
								$stmt2->bind_param('sssss', $vendor, $alamat, $email, $telepon, $fax);

								$vendor 				= $_POST['vendor'];
								$alamat 				= $_POST['alamat'];
								$email 					= $_POST['email'];
								$telepon 				= $_POST['telepon'];
								$fax 					= $_POST['fax'];
								$proses					= 'Insert';
								$note					= '-';
								date_default_timezone_set('Asia/Jakarta');
								$tgl_input   			= date("Y-m-d H:i:s");
								$pic_input				= $_SESSION['userid'];
								$ip_address				= $_SERVER['REMOTE_ADDR'];

								 if($stmt1->execute());
								 if($stmt2->execute()):
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil disimpan!</strong></h3> Silahkan tambah lagi, jika ingin keluar klik <a href="vendor.php">kembali</a>.
							</div>
							<?php
								 else:
							?>
							<p></p>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Gagal disimpan!</strong></h3> Silahkan coba lagi!.<?php echo $stmt->error; ?>
							</div>
							<?php
								 endif;
							  } else{
							?>
							<p></p>
							<div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Maaf, </strong></h3> Form tidak boleh kosong, tolong diisi!
							</div>
							<?php
							  }
							endif;
							?>

<!---=================================================================================================================--->

							<form id="validator" class="form-horizontal" action="" method="post">
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Vendor</label>
									<div class="col-sm-6">
										<input type="text" name="vendor" class="form-control" placeholder="Enter Vendor" required>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-7">
										<textarea class="form-control" rows="6" name="alamat"></textarea>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Email</label>
									<div class="col-sm-6">
										<div class="input-group">
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-envelope"></span>
										</span>
										<input type="text" name="email" class="form-control" placeholder="example@mail.com" required>
										</div>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Telepon</label>
									<div class="col-sm-4">
										<div class="input-group">
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-phone-alt"></span>
										</span>
											<input type="text" name="telepon" class="form-control" required>
										</div>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Fax</label>
									<div class="col-sm-4">
										<div class="input-group">
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-print"></span>
										</span>
										<input type="text" name="fax" class="form-control" required>
										</div>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-actions well">
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<button type="submit" name="bts" class="btn btn-success btn-md" title="Simpan Data Vendor"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
										<a href="vendor.php" title="Kembali" class="btn btn-md btn-default"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
									</div>
								</div>
								</div>
								<!-------------------------------------------------------->
							</form>
<!---=================================================================================================================--->
							
						</div>
                    </div>
                </div>
                <!-- /.row -->
<!---=================================================================================================================--->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->	 
<!---=================================================================================================================--->



<!---=================================================================================================================--->

<?php
include "../config/footer.php";
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
                            message: 'Telepon tidak boleh kosong'
                        },
                        regexp: {
                            message: 'Telepon hanya memuat angka, spasi, -, (, ), + dan .',
                            regexp: /^[0-9\s\-()+\.]+$/
                        }
                    }
                },
	
            fax: {
                    validators: {
                        notEmpty: {
                            message: 'Fax tidak boleh kosong'
                        },
                        regexp: {
                            message: 'Fax hanya memuat angka, spasi, -, (, ), + dan .',
                            regexp: /^[0-9\s\-()+\.]+$/
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