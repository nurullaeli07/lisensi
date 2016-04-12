<?php
include "../session/user.php";
include '../config/config.php';
include "../config/header.php";
?>

<!--#####################################
	Project : Aplikasi Kontrol Lisensi
	Versi 	: 1.0
	Author 	: Nurul Laeli Mahmudah
######################################-->

<!---=================================================================================================================--->

<!-- Page Wrapper Tutup -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
			
        <!-- Page Heading Tutup -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-plus-square"></i><strong> Tambah Data Departemen</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../departement/departement.php" title="Lihat Data departement">Data Departemen</a> &raquo; Tambah Data Departemen
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
					<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data Departemen</div>
                    <div class="panel-body">

<!---=================================================================================================================--->
										
						<?php
							if(isset($_POST['bts'])):
							  if($_POST['departement']!=null &&
							  $_POST['kode_departement']!=null &&
							  $_POST['status']!=null){
								$stmt1 = $mysqli->prepare("INSERT INTO t_departement_history(departement, kode_departement, status, proses, note, tgl_input, pic_input,ip_address) VALUES (?,?,?,?,?,?,?,?)");
								$stmt2 = $mysqli->prepare("INSERT INTO t_departement(departement, kode_departement, status) VALUES (?,?,?)"); 
								$stmt1->bind_param('ssssssss', $departement, $kode_departement, $status, $proses, $note, $tgl_input, $pic_input, $ip_address);
								$stmt2->bind_param('sss', $departement, $kode_departement, $status);

								$departement 		= $_POST['departement'];
								$kode_departement 	= $_POST['kode_departement'];
								$status 			= $_POST['status'];
								$proses				= 'Insert';
								$note				= '-';
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
							  <h3><strong>Data Berhasil disimpan!</strong></h3> Silahkan tambah lagi, jika ingin keluar klik <a href="departement.php">kembali</a>.
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
								<label class="col-sm-3 control-label">Departemen</label>
								<div class="col-sm-7">
									<input type="text" name="departement" class="form-control" placeholder="Enter Departemen" required>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode Departemen</label>
								<div class="col-sm-6">
									<input type="text" name="kode_departement" class="form-control" placeholder="Enter Kode Departemen" required>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-6">
									<select data-placeholder="Pilih Status..." name="status" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="">Pilih Status..</option>
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
							<div class="form-actions well">
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-6">
									<!-- Button untuk menyimpan data -->
									<button type="submit" name="bts" class="btn btn-success btn-md" title="Simpan Data departement">
									<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
									<!-- Button untuk kembali ke halaman sebelumnya -->
									<a href="departement.php" title="Kembali" class="btn btn-md btn-default">
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
<!-- /,Page Wrapper Tutup -->	  

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
        }
    });
});
</script>
</body>
</html>