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
                        <h3 class="page-header"><i class="fa fa-edit"></i><strong> Edit Data Pengembang</strong></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> 
								<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
								<a href="../pengembang/pengembang.php" title="Lihat Data Pengembang">Data Pengembang</a> &raquo; Edit Data Pengembang
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
							<div class="panel-heading"><i class="fa fa-edit"></i>  Data Pengembang</div>
                            <div class="panel-body">
<!---=================================================================================================================--->
							<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id						= $_POST['id'];
							$pengembang				= $_POST['pengembang'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($pengembang) && isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_pengembang_history values('', '$pengembang', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_pengembang SET pengembang = '$pengembang' WHERE id = '$id'");
							  
							if ($res1 && $res2)  

								{
								?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="pengembang.php">kembali</a>.
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
							$query = mysql_query("select * from t_pengembang where id='$id'") or die(mysql_error());
							$row = mysql_fetch_assoc($query);
							?>
							
<!---=================================================================================================================--->	 
	      
							<form id="validasi" class="form-horizontal" action="" method="post">
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">ID</label>
									<div class="col-sm-2">
										<input type="text" name="id" class="form-control" value="<?php echo $row['id'] ?>" readonly>
									</div>
								</div>
								<!-------------------------------------------------------->
								<div class="form-group">
									<label class="col-sm-3 control-label">Pengembang</label>
									<div class="col-sm-6">
										<input type="text" name="pengembang" class="form-control" value="<?php echo $row['pengembang'] ?>" required>
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
										<button type="submit" class="btn btn-success btn-md" title="Update Data Pengembang"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
										<a href="pengembang.php" class="btn btn-md btn-default" title="Kembali"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
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
				<!-- /.container-fluid -->
<!---=================================================================================================================--->
			</div>
		</div>
        <!-- /#page-wrapper -->	
<!---=================================================================================================================--->
<?php
include '../config/footer.php';
?>
<!---==========================Action Untuk Update Data============================--->

<script type="text/javascript">
$(document).ready(function() {
    $('#validasi').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			pengembang: {
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
