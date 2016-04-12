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
                <h3 class="page-header"><i class="fa fa-edit"></i> <strong>Edit User</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> <a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../user/user.php" title="Lihat Data User">User</a> &raquo; Edit User 
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
				<div class="panel-heading"><i class="fa fa-edit"></i>  Data User</div>
                    <div class="panel-body">
							
<!---=================================================================================================================--->							
							<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$nama_lengkap			= $_POST['nama_lengkap'];
							$userid					= $_POST['userid'];
							$password				= $_POST['password'];
							$password				= md5($password);
							$level					= $_POST['level'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($nama_lengkap) && isset($userid) && isset($password) && isset($level) && isset($proses) && isset($note)&& isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_user_history values('', '$nama_lengkap', '$userid', '$password', '$level', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_user SET nama_lengkap = '$nama_lengkap', password = '$password', level = '$level' WHERE userid = '$userid'");
							  
							if ($res1 && $res2)  

							{
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="user.php">kembali</a>.
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
							$query = mysql_query("select * from t_user where userid='$id'") or die(mysql_error());
							$row = mysql_fetch_assoc($query);
						?>
							
<!---=================================================================================================================--->														
							
							<form id="validator" action="" method="post" class="form-horizontal">
								<!-------------------------------------------------------->
                				<div class="form-group" align="right">
									<label class="col-sm-3 control-label">Userid</label>
										<div class="col-sm-6">
											<input type="text" name="userid" class="form-control" value="<?php echo $row['userid']?>" readonly>
										</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group" align="right">
									<label class="col-sm-3 control-label">Nama Lengkap</label>
										<div class="col-sm-7">
											<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row['nama_lengkap']?>" required>
										</div>
								</div>
								<!-------------------------------------------------------->
                				<input type="hidden" class="form-control" name="password" value="<?php echo $row['password']?>">
								<!-------------------------------------------------------->
                                <div class="form-group">
									<label class="col-sm-3 control-label">Hak Akses</label>
										<div class="col-sm-6">
											<select data-placeholder="Pilih Hak Akses..." name="level" class="form-control chosen-select" style="height:75px;" tabindex="2">
												<option><?php echo $row['level'] ?></option>
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
								<div class="form-group">
									<label class="col-sm-3 control-label">Note</label>
									<div class="col-sm-8">
										<textarea rows="6" class="form-control" name="note"><?php echo $row['note'] ?></textarea>
									</div>
								</div>
								<!-------------------------------------------------------->
                                <div class="form-actions well">
								<div class="form-group">
									<label class="col-sm-3 control-label"></label>
										<div class="col-sm-4">
											<button type="submit" name="update" class="btn btn-success btn-md"><i class="fa fa-fw fa-refresh"></i> Update</button>
											<a href="../user/user.php" class="btn btn-md btn-default" title="Kembali">
											<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
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
                    }
                }
            },
			userid: {
                validators: {
                    notEmpty: {
                        message: 'User ID Harus di isi'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'User ID tidak valid'
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