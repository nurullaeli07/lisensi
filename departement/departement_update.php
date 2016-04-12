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
                <h3 class="page-header"><i class="fa fa-edit"></i><strong> Edit Data Departemen</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../departement/departement.php" title="Lihat Data departement">Data Departemen</a> &raquo; Edit Data Departemen
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
					<div class="panel-heading"><i class="fa fa-edit"></i>  Data Departemen</div>
                    <div class="panel-body">

<!---=================================================================================================================--->
					
						<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id						= $_POST['id'];
							$departement			= $_POST['departement'];
							$kode_departement		= $_POST['kode_departement'];
							$status					= $_POST['status'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($departement) && isset($kode_departement) &&  isset($status) && isset($proses) && isset($note)&& isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_departement_history values('', '$departement', '$kode_departement', '$status', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_departement SET departement = '$departement', kode_departement = '$kode_departement', status = '$status' WHERE id = '$id'");
							  
							if ($res1 && $res2)  

							{
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="departement.php">kembali</a>.
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
							$query = mysql_query("select * from t_departement where id='$id'") or die(mysql_error());
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
							<label class="col-sm-3 control-label">Departemen</label>
							<div class="col-sm-7">
								<input type="text" name="departement" class="form-control" value="<?php echo $row['departement'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Kode Departemen</label>
							<div class="col-sm-4">
								<input type="text" name="kode_departement" class="form-control" value="<?php echo $row['kode_departement'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-6">
									<select data-placeholder="Pilih Status..." name="status" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
										<?php
										// koneksi ke database
										include '../config/koneksi.php';
										// melakukan query 
										$result = mysql_query("SELECT * FROM t_status");
										while($data = mysql_fetch_array($result)) {
											echo "<option value='$data[status]'>$data[status]</option>";
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
								<!-- Button untuk Update data -->
								<button type="submit" name="update" class="btn btn-success btn-md" title="Update Data Departemen">
								<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
								<!-- Button untuk kembali ke halaman sebelumnya -->
								<a href="../departement/departement.php" class="btn btn-md btn-default" title="Kembali">
								<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
							</div>
						</div>
						<div>
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
<!-- /.Page Wrapper Tutup -->

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
            kode_departement: {
                validators: {
                    notEmpty: {
                        message: 'Kode Departemen tidak boleh kosong'
                    },
					regexp: {
                        regexp: /^[a-zA-Z& ]+$/,
                        message: 'Kode Departemen tidak valid'
                    }
                }
            },	
			departement: {
                validators: {
                    notEmpty: {
                        message: 'Departemen tidak boleh kosong'
					},
					regexp: {
                        regexp: /^[a-zA-Z& ]+$/,
                        message: 'Departemen tidak valid'
                    }
                }
            },	
			status: {
                validators: {
                    notEmpty: {
                        message: 'Status Harus di pilih'
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