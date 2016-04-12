<?php
//menampilkan session
include "../session/admin.php";
//koneksi ke database
include '../config/config.php';
//menampilkan halaman header
include "../config/header.php";
?>

<!---=================================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
	
		<!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-edit"></i> <strong>Edit Penggunaan Lisensi</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../pc/pc.php" title="Lihat Data Penggunaan Lisensi">Data Penggunaan Lisensi</a> &raquo; Edit Penggunaan Lisensi
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
					<div class="panel-heading"><i class="fa fa-edit"></i>  Edit Penggunaan Lisensi</div>
                    <div class="panel-body">
					
<!---=================================================================================================================--->	      
					<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id						= $_POST['id'];
							$nama_pc				= $_POST['nama_pc'];
							$id_pc					= $_POST['id_pc'];
							$section_pemilik		= $_POST['section_pemilik'];
							$id_license				= $_POST['id_license'];
							$jumlah					= $_POST['jumlah'];
							$pic_instalasi			= $_POST['pic_instalasi'];
							$tgl_instalasi			= $_POST['tgl_instalasi'];
							$proses					= 'Update';
							$note					= $_POST['note'];
							date_default_timezone_set('Asia/Jakarta');
							$tgl_input   			= date("Y-m-d H:i:s");
							$pic_input				= $_SESSION['userid'];
							$ip_address				= $_SERVER['REMOTE_ADDR'];

							if(isset($nama_pc) && isset($id_pc) && isset($section_pemilik) && isset($id_license) && isset($jumlah) && isset($pic_instalasi) && isset($tgl_instalasi) && isset($tgl_input) && isset($pic_input) && isset($ip_address))
							 
							$res1 = $mysqli->query("INSERT into t_penggunaan_lisensi_history values('', '$nama_pc', '$id_pc', '$section_pemilik', '$id_license', '$jumlah', '$pic_instalasi', '$tgl_instalasi', '$proses', '$note', '$tgl_input','$pic_input', '$ip_address')");
							$res2 = $mysqli->query("UPDATE t_penggunaan_lisensi SET nama_pc = '$nama_pc', id_pc = '$id_pc', section_pemilik = '$section_pemilik', id_license = '$id_license', jumlah = '$jumlah', pic_instalasi='$pic_instalasi', tgl_instalasi='$tgl_instalasi' WHERE id = '$id'");
							  
							if ($res1 && $res2)  

								{
								?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="pc.php">kembali</a>.
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
							$query = mysql_query("select * from t_penggunaan_lisensi where id='$id'") or die(mysql_error());
							$row = mysql_fetch_assoc($query);
							?>
					
					
					
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
							<label class="col-sm-3 control-label">Nama PC</label>
							<div class="col-sm-4">
								<input type="text" name="nama_pc" class="form-control" value="<?php echo $row['nama_pc'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">ID PC</label>
							<div class="col-sm-4">
								<input type="text" name="id_pc" class="form-control" value="<?php echo $row['id_pc'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Section Pemilik</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Section..." name="section_pemilik" class="form-control chosen-select" style="height:75px;" tabindex="2">
								<option value="<?php echo $row['section_pemilik'] ?>"><?php echo $row['section_pemilik'] ?></option>
								<?php
									// koneksi ke database
									include '../config/koneksi.php';
									// melakukan query 
									$result = mysql_query("SELECT * FROM t_section");
									while($data = mysql_fetch_array($result)) {
									echo "<option value='$data[section]'>$data[section]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">ID Lisensi</label>
							<div class="col-sm-8">
								<select data-placeholder="Pilih ID Lisensi..." name="id_license" class="form-control chosen-select" style="height:75px;" tabindex="2">
								<option value="<?php echo $row['id_license'] ?>"><?php echo $row['id_license'] ?></option>
								<?php
									// koneksi ke database
									include '../config/koneksi.php';
									// melakukan query 
									$result = mysql_query("SELECT * FROM t_license");
									while($data = mysql_fetch_array($result)) {
									echo "<option value='$data[id_license]'>$data[id_license] - $data[deskripsi]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">jumlah License</label>
							<div class="col-sm-2">
								<input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">PIC Instalasi</label>
							<div class="col-sm-4">
							<div class='input-group'>
								<input type="text" name="pic_instalasi" class="form-control" value="<?php echo $row['pic_instalasi'] ?>" required>
								<span class="input-group-addon">
										<span class="glyphicon glyphicon-user"></span>
									</span>
							</div>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Instalasi</label>
							<div class="col-sm-4">
								<div class='input-group date' id="datepicker1">
								<input type="text" class="form-control" name="tgl_instalasi" value="<?php echo $row['tgl_instalasi'] ?>" required>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
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
								<button type="submit" name="update" class="btn btn-success btn-md" title="Update Data"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
								<button type="reset" class="btn btn-warning btn-md" title="Reset Data"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
								<a href="pc.php" class="btn btn-md btn-default" title="Kembali"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
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
include '../config/footer.php';
?>
<!---=====================Function Untuk Validasi Data===============================--->
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
            nama_pc: {
                validators: {
				    notEmpty: {
                        message: 'Nama PC tidak boleh kosong'
                    },
                }
            },
            id_pc: {
                validators: {
                    notEmpty: {
                        message: 'ID PC tidak boleh kosong'
                    }, 
                }
            },
            section_pemilik: {
                validators: {
                    notEmpty: {
                        message: 'Section Pemilik Harus di pilih'
                    }
                }
            },			
            id_license: {
                validators: {
                    notEmpty: {
                        message: 'ID Lisensi Harus di pilih'
                    }
                }
            },
            jumlah: {
                validators: {
                    notEmpty: {
                        message: 'Jumlah tidak boleh kosong'
                    },
					regexp: {
                        regexp: /^\d*[0-9](\.\d*[0-9])?$/,
                        message: 'Jumlah tidak valid'
                    }
                }
            },	
			pic_instalasi: {
                validators: {
                    notEmpty: {
                        message: 'PIC Instalasi tidak boleh kosong'
                    },
					regexp: {
                        regexp: /^[a-zA-Z_\.]+$/,
                        message: 'PIC Instalasi tidak valid'
                    }
                }
            },	
			tgl_instalasi: {
				validators: {
					notEmpty: {
						message: 'Tanggal Instalasi tidak boleh kosong'
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