<?php
//menampilkan session
include "../session/admin.php";
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
 
		<!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user-plus"></i> <strong>Tambah User</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> <a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Tambah User 
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
				<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data User</div>
                    <div class="panel-body">
					

<!---=================================================================================================================--->	
						
					<?php // jika submit button diklik
						if($_SERVER['REQUEST_METHOD'] == "POST"){
						$nama_lengkap	= $_POST['nama_lengkap'];
						$userid			= $_POST['userid'];
						$password		= $_POST['password'];
						$password		= md5($password);
						$level			= $_POST['level'];
						$proses			= 'Insert';
						$note			= '-';
						date_default_timezone_set('Asia/Jakarta');
						$tgl_input   	= date("Y-m-d H:i:s");
						$pic_input		= $_SESSION['userid'];
						$ip_address		= $_SERVER['REMOTE_ADDR'];

						if(isset ($nama_lengkap) && isset ($userid) && isset ($password) && isset($level)  
						&& isset($proses) && isset($note) && isset($pic_input) && isset($tgl_input) && isset($ip_address))
						
						$res1 = $mysqli->query("insert into t_user_history values('', '$nama_lengkap', '$userid', '$password', '$level', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
						$res2 = $mysqli->query("insert into t_user values('$nama_lengkap', '$userid', '$password', '$level')");
						if ($res1 && $res2){
							}else{
								echo '';
							}
						?>
						<p></p>
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h3><strong>Data Berhasil disimpan!</strong></h3> Silahkan tambah lagi, jika ingin keluar klik <a href="user.php">kembali</a>.
						</div>
						<?php
						}
						?> 							
<!---=================================================================================================================--->								
							<form id="validator" action="" method="post" class="form-horizontal">
								<!-------------------------------------------------------->
                                <div class="form-group">
									<label class="col-sm-3 control-label">Nama Lengkap</label>
										<div class="col-sm-7">
											<input type="text" name="nama_lengkap" class="form-control" placeholder="Enter Nama Lengkap" required>
										</div>
								</div>
								<!-------------------------------------------------------->
                				<div class="form-group">
									<label class="col-sm-3 control-label">Userid</label>
										<div class="col-sm-6">
											<input type="text" name="userid" id="userid" class="form-control" placeholder="Enter Userid" required>
										</div>
								</div>
								<!-------------------------------------------------------->
                				<div class="form-group">
									<label class="col-sm-3 control-label">password</label>
										<div class="col-sm-4">
											<input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
										</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Konfirmasi Password</label>
										<div class="col-sm-4">
											<input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Enter Konfirmasi password" required>
										</div>
								</div>
								<!-------------------------------------------------------->
                               <div class="form-group">
									<label class="col-sm-3 control-label">Hak Akses</label>
										<div class="col-sm-6">
											<select data-placeholder="Pilih Hak Akses..." name="level" class="form-control chosen-select" style="height:75px;" tabindex="2">
												<option></option>
														<?php
														// koneksi ke database
															include '../config/koneksi.php';
														// melakukan query 
															$result = mysql_query("SELECT * FROM t_leveluser");
															while($row = mysql_fetch_array($result)) 
															{
																echo "<option value='$row[level]'>$row[level]</option>";
															}
														?>
											</select>
										</div>
								</div>
								<!-------------------------------------------------------->
                                <div class="form-actions well">
								<div class="form-group">
									<label class="col-sm-3 control-label"></label>
										<div class="col-sm-4">
											<button type="submit" name="bts" class="btn btn-success btn-md"><i class="fa fa-fw fa-plus-square"></i> Tambah</button>
											<button type="reset" class="btn btn-warning btn-md"><i class="fa fa-fw fa-refresh"></i> Reset</button>
										</div>
								</div>
								</div>
								<!-------------------------------------------------------->
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
<!-- /.Page Wrapper -->	

<!---=================================================================================================================--->
<?php
include "../config/footer.php";
?>


<script type="text/javascript">
$(document).ready(function() {
    $('#validator')
    .find('.chosen-selects')
        .chosen({
            width: '100%',
            allow_single_deselect : true,
            no_results_text : 'Oops, No Results Found for - '
        })
        // Revalidate your field when it is changed
        .change(function(e) {
            $('#validator').bootstrapValidator('revalidateField');
	 })
        .end()
	.bootstrapValidator({
		excluded: ':disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_lengkap: {
                validators: {
                    notEmpty: {
                        message: 'Nama Harus di isi'
                    },
					regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Nama tidak valid'
					}
                }
            },
			userid: {
                validators: {
                    notEmpty: {
                        message: 'User ID Harus di isi'
                    },
                    
					stringLength:{
						min: 5,
						max: 10,
						message: 'User ID harus lebih dari 5 dan tidak boleh lebih dari 10'
					},
					regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'User ID tidak valid'
                    }
                }
            },	
			password: {
                validators: {
                    notEmpty: {
                        message: 'Password tidak boleh kosong'
                    },
                    callback: {
                        message: 'Password Tidak Valid',
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }

                            // Check the password strength
                            if (value.length < 8) {
                                return {
                                    valid: false,
                                    message: 'Minimal password 8 karakter'
                                };
                            }

                            // The password doesn't contain any uppercase character
                            if (value === value.toLowerCase()) {
                                return {
                                    valid: false,
                                    message: 'Harus disertai dengan huruf kapital'
                                }
                            }

                            // The password doesn't contain any uppercase character
                            if (value === value.toUpperCase()) {
                                return {
                                    valid: false,
                                    message: 'Harus disertai degan huruf biasa'
                                }
                            }

                            // The password doesn't contain any digit
                            if (value.search(/[0-9]/) < 0) {
                                return {
                                    valid: false,
                                    message: 'Harus disertai degan angka'
                                }
                            }

                            return true;
                        }
                    }
				}
            },	
			konfirmasi_password: {
                validators: {
                    notEmpty: {
                        message: 'Konfirimasi password tidak boleh kosong'
				},					
                    identical: {
                        field: 'password',
                        message: 'Password tidak cocok'
                    }
                }
            },
            level: {
                validators: {
                    notEmpty: {
                        message: 'Level Harus di pilih'
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