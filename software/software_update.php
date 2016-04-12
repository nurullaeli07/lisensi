<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>
<!---=================================================================================================================--->

		<div id="page-wrapper">
            <div class="container-fluid">
<!---=================================================================================================================--->			
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-edit"></i><strong> Edit Data Software</strong></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> 
								<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
								<a href="../software/software.php" title="Lihat Data Software">Data Software</a> &raquo; Edit Data Software
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<!---=================================================================================================================--->
                <!-- /.row -->
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="panel panel-info">
							<div class="panel-heading"><i class="fa fa-edit"></i>  Data Software</div>
                            <div class="panel-body">
<!---=================================================================================================================--->							
							
							<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id						= $_POST['id'];
							$nama_software			= $_POST['nama_software'];
							$pengembang				= $_POST['pengembang'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($nama_software) && isset($pengembang) && isset($proses) && isset($note)&& isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_software_history values('', '$nama_software', '$pengembang', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_software SET nama_software = '$nama_software', pengembang = '$pengembang' WHERE id = '$id'");
							  
							if ($res1 && $res2)  

							{
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="software.php">kembali</a>.
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
							$query = mysql_query("select * from t_software where id='$id'") or die(mysql_error());
							$row = mysql_fetch_assoc($query);
							?>
<!---=================================================================================================================--->							
							<form id="validator" class="form-horizontal" action="" method="post">
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">ID</label>
									<div class="col-sm-2">
										<input type="text" name="id" class="form-control" value="<?php echo $row['id'] ?>" readonly>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Software</label>
									<div class="col-sm-6">
										<input type="text" name="nama_software" class="form-control" value="<?php echo $row['nama_software'] ?>" required>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Pengembang</label>
									<div class="col-sm-6">
										<select data-placeholder="Pilih Pengembang..." name="pengembang" class="form-control chosen-select" style="height:75px;" tabindex="2">
											<option><?php echo $row['pengembang'] ?></option>
												<?php
												// koneksi ke database
												include '../config/koneksi.php';
												// melakukan query 
												$result = mysql_query("SELECT * FROM t_pengembang");
												while($data = mysql_fetch_array($result)) {
													echo "<option value='$data[pengembang]'>$data[pengembang]</option>";
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
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<button type="submit" name="upadate" class="btn btn-success btn-md" title="Update Data Software"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
										<a href="../software/software.php" title="Kembali" class="btn btn-md btn-default"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
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
                <!-- /.row -->
<!---=================================================================================================================--->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->	 
 <!---=================================================================================================================--->       


<?php
include '../config/footer.php';
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
			nama_software: {
                validators: {
                    notEmpty: {
                        message: 'Harus di isi'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Isi tidak valid'
                    }
                }
            },
			pengembang: {
                validators: {
                    notEmpty: {
                        message: 'ID Lisensi Harus di pilih'
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
</body>
</html>