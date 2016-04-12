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

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
	
        <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-edit"></i><strong> Edit Data Section</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali Ke Beranda">Beranda</a> &raquo; 
						<a href="../section/section.php" title="Lihat Data Section">Data Section</a> &raquo; Edit Data Section
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
					<div class="panel-heading"><i class="fa fa-edit"></i>  Data Section</div>
                    <div class="panel-body">
					
<!---=================================================================================================================--->					
						<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id						= $_POST['id'];
							$departement			= $_POST['departement'];
							$section				= $_POST['section'];
							$kode_section			= $_POST['kode_section'];
							$status					= $_POST['status'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($departement) && isset($section) && isset($kode_section) &&  isset($status) && isset($proses) && isset($note)&& isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_section_history values('', '$departement', '$section', '$kode_section', '$status', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_section SET departement = '$departement', section = '$section', kode_section = '$kode_section', status = '$status' WHERE id = '$id'");
							  
							if ($res1 && $res2)  

							{
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="section.php">kembali</a>.
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
							$query = mysql_query("select * from t_section where id='$id'") or die(mysql_error());
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
							<label class="col-sm-3 control-label">Departement</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Departement..." name="departement" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option><?php echo $row['departement'] ?></option>
										<?php
										// koneksi ke database
										include '../config/koneksi.php';
										// melakukan query 
										$result = mysql_query("SELECT * FROM t_departement");
										while($data = mysql_fetch_array($result)) {
											echo "<option value='$data[departement]'>$data[departement]</option>";
										}
										?>
								</select>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Section</label>
							<div class="col-sm-6">
								<input type="text" name="section" class="form-control" value="<?php echo $row['section'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Kode Section</label>
							<div class="col-sm-6">
								<input type="text" name="kode_section" class="form-control" value="<?php echo $row['kode_section'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Status</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Status..." name="status" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option><?php echo $row['status'] ?></option>
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
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-6">
								<button type="submit" name="update" class="btn btn-success btn-md" title="Update Data Section"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
								<a href="section.php" class="btn btn-md btn-default" title="Kembali"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
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
			departement: {
                validators: {
                    notEmpty: {
                        message: 'Departement Harus di pilih'
                    }
                }
            },
			section: {
                validators: {
                    notEmpty: {
                        message: 'Harus di isi'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'Isi tidak valid'
                    }
                }
            },
			kode_section: {
                validators: {
                    notEmpty: {
                        message: 'Harus di isi'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'Isi tidak valid'
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
