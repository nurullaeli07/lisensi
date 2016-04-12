<?php
//menampilkan session
include "../session/user.php";
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
                <h3 class="page-header"><i class="fa fa-plus-square"></i><strong> Tambah Data Section</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali Ke Beranda">Beranda</a> &raquo; 
						<a href="../section/section.php" title="Lihat Data Section">Data Section</a> &raquo; Tambah Data Section
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
					<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data Section</div>
                    <div class="panel-body">
					
<!---=================================================================================================================--->
					
					<?php
							if(isset($_POST['bts'])):
							  if($_POST['departement']!=null && $_POST['section']!=null && $_POST['kode_section']!=null && $_POST['status']!=null){
								$stmt1 = $mysqli->prepare("INSERT INTO t_section_history(departement, section, kode_section, status, proses, note, tgl_input, pic_input, ip_address) VALUES (?,?,?,?,?,?,?,?,?)");
								$stmt2 = $mysqli->prepare("INSERT INTO t_section(departement, section, kode_section, status) VALUES (?,?,?,?)"); 
								$stmt1->bind_param('sssssssss',  $departement, $section, $kode_section, $status, $proses, $note, $tgl_input, $pic_input, $ip_address);
								$stmt2->bind_param('ssss', $departement, $section, $kode_section, $status);

								
								$departement 		= $_POST['departement'];
								$section 			= $_POST['section'];
								$kode_section 		= $_POST['kode_section'];
								$status 			= $_POST['status'];
								$proses				= 'Insert';
								$note				= '-';
								date_default_timezone_set('Asia/Jakarta');
								$tgl_input   		= date("Y-m-d H:i:s");
								$pic_input			= $_SESSION['userid'];
								$ip_address			= $_SERVER['REMOTE_ADDR'];

								 if($stmt1->execute());
								 if($stmt2->execute()):
							?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil disimpan!</strong></h3> Silahkan tambah lagi, jika ingin keluar klik <a href="section.php">kembali</a>.
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
							<label class="col-sm-3 control-label">Departement</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Departement..." name="departement" class="form-control chosen-select" style="height:75px;" tabindex="2">
       							<option value="">Pilih Departement..</option>
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
								<input type="text" name="section" class="form-control" placeholder="Enter Section" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Kode Section</label>
							<div class="col-sm-6">
								<input type="text" name="kode_section" class="form-control" placeholder="Enter Kode Section" required>
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
								<button type="submit" name="bts" class="btn btn-success btn-md" title="Simpan Data Section">
								<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
								<!-- Button untuk kembali ke halaman sebelumnya -->
								<a href="section.php" title="Kembali" class="btn btn-md btn-default">
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
<!-- /.Page Wrapper Tutup -->	

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
                        regexp: /^[a-zA-Z0-9& ]+$/,
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
                        regexp: /^[a-zA-Z0-9& ]+$/,
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
        }
    });
});
</script>

