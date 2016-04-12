<?php
//menampilkan session user
include "../session/admin.php";
//konekasi ke database
include "../config/header.php";
?>

<!---=========================================================================================================================---> 

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
    <div class="container-fluid">
	
<!---=====================================================================================================================--->	
	
        <!-- Page Heading Buka -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-edit"></i> <strong>Edit Data Lisensi</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
						<i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali Ke Beranda">Beranda</a> &raquo; 
						<a href="../lisensi/lisensi.php" title="Lihat Data License">Data Lisensi</a> &raquo; Edit Data Lisensi
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=====================================================================================================================--->
		
        <!-- /.Page Content Buka -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-info">
					<div class="panel-heading"><i class="fa fa-edit"></i>  Data Lisensi</div>
                    <div class="panel-body">


<!---=====================================================================================================================--->												
					<?php
							include('../config/config.php');
							if($_SERVER['REQUEST_METHOD'] == "POST"){
							$id_license			= $_POST['id_license'];
							$pengembang 		= $_POST['pengembang'];
							$software 			= $_POST['software'];
							$no_license 		= $_POST['no_license'];
							$no_part_license 	= $_POST['no_part_license'];
							$jenis_license	 	= $_POST['jenis_license'];
							$deskripsi		 	= $_POST['deskripsi'];
							$vendor			 	= $_POST['vendor'];
							$no_bantex			= $_POST['no_bantex'];
							$section_pemilik 	= $_POST['section_pemilik'];
							$jumlah			 	= $_POST['jumlah'];
							$tanggal_terbit 	= $_POST['tanggal_terbit'];
							$masa_berlaku	 	= $_POST['masa_berlaku'];
							$status			 	= $_POST['status'];
							$pic_input		 	= $_POST['pic_input'];
							$tgl_input		 	= $_POST['tgl_input'];
							$pic_cek		 	= $_POST['pic_cek'];
							$tgl_cek		 	= $_POST['tgl_cek'];
							$file_gambar	 	= $_POST['file_gambar'];
							$proses				= $_POST['proses'];
							$note				= $_POST['note'];
							$ip_address			= $_SERVER['REMOTE_ADDR'];

							if(isset ($id_license) && isset ($pengembang) && isset ($software) && isset($no_license) && isset ($no_part_license) && isset ($jenis_license) &&
						isset($deskripsi) && isset($vendor) && isset($no_bantex) && isset($section_pemilik) && isset($jumlah) && isset($tanggal_terbit) && isset($masa_berlaku) && 
						isset($status) && isset($pic_input) && isset($tgl_input) && isset($pic_cek) && isset($tgl_cek) && isset($file_gambar) && isset($proses) && isset($note) && isset($ip_address))
						
							$res1 = $mysqli->query("INSERT into t_license_history values('','$id_license', '$pengembang', '$software', '$no_license', '$no_part_license', '$jenis_license', '$deskripsi', '$vendor', 
								'$no_bantex', '$section_pemilik', '$jumlah', '$tanggal_terbit', '$masa_berlaku', '$status', '$pic_input', '$tgl_input', '$pic_cek', '$tgl_cek', '$proses', '$note', '$ip_address')");
							
							$res2 = $mysqli->query("UPDATE t_license SET id_license='$id_license', pengembang='$pengembang', software='$software', no_license='$no_license', no_part_license='$no_part_license', 
								jenis_license='$jenis_license', deskripsi='$deskripsi', vendor='$vendor', no_bantex='$no_bantex', section_pemilik='$section_pemilik', jumlah='$jumlah', tanggal_terbit='$tanggal_terbit', 
								masa_berlaku='$masa_berlaku', status='$status', pic_input='$pic_input', tgl_input='$tgl_input', pic_cek='$pic_cek', tgl_cek='$tgl_cek' WHERE id_license = '$id_license'");
 
							if ($res1 && $res2)  

								{
								?>
							<p></p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h3><strong>Data Berhasil di Update!</strong></h3>jika ingin keluar klik <a href="lisensi.php">kembali</a>.
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
							$id_license = $_GET['id_license'];							 
							$query = mysql_query("select * from t_license where id_license='$id_license'") or die(mysql_error());
							$row = mysql_fetch_assoc($query);
							?>
					<!-------------------------------------------------------->
					<form id="validator" class="form-horizontal" action="" method="post">
					
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">ID</label>
							<div class="col-sm-2">
								<input type="text" name="id_license" class="form-control" value="<?php echo $row['id_license'] ?>" readonly>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Pengembang</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Pengembang..." name="pengembang" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="<?php echo $row['pengembang'] ?>"><?php echo $row['pengembang'] ?></option>
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
							<label class="col-sm-3 control-label">Software</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Software..." name="software" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="<?php echo $row['software'] ?>"><?php echo $row['software'] ?></option>
										<?php
										// koneksi ke database
										include '../config/koneksi.php';
										// melakukan query 
										$result = mysql_query("SELECT * FROM t_software");
										while($data = mysql_fetch_array($result)) {
											echo "<option value='$data[nama_software]'>$data[nama_software]</option>";
										}
										?>
								</select>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">No. License</label>
							<div class="col-sm-6">
								<input type="text" name="no_license" class="form-control" value="<?php echo $row['no_license'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">No. Part License</label>
							<div class="col-sm-6">
								<input type="text" name="no_part_license" class="form-control" value="<?php echo $row['no_part_license'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis License</label>
							<div class="col-sm-6">
								<input type="text" name="jenis_license" class="form-control" value="<?php echo $row['jenis_license'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Deskripsi</label>
							<div class="col-sm-8">
								<textarea name="deskripsi"  rows="5" class="form-control" ><?php echo $row['deskripsi'] ?></textarea>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Vendor</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Vendor..." name="vendor" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="<?php echo $row['vendor'] ?>"><?php echo $row['vendor'] ?></option>
										<?php
											// koneksi ke database
											include '../config/koneksi.php';
											// melakukan query 
											$result = mysql_query("SELECT * FROM t_vendor");
											while($data = mysql_fetch_array($result)) {
												echo "<option value='$data[vendor]'>$data[vendor]</option>";
											}
										?>
								</select>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">No. Bantex</label>
							<div class="col-sm-2">
								<input type="text" name="no_bantex" class="form-control input-mask-bantex" value="<?php echo $row['no_bantex'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Section Pemilik</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Section Pemilik..." name="section_pemilik" class="form-control chosen-select" style="height:75px;" tabindex="2">
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
							<label class="col-sm-3 control-label">Jumlah</label>
							<div class="col-sm-2">
								<input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah'] ?>" required>
							</div>
						</div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Terbit</label>
							<div class="col-sm-4">
								<div class='input-group date' id="datepicker">
								<input type="text" class="form-control calender" name="tanggal_terbit" id="tanggal_terbit" value="<?php echo $row['tanggal_terbit'] ?>" required>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Masa Berlaku</label>
                        	<div class="col-sm-4">
                                <div class="input-group">
									<input type="text" name="masa_berlaku" class="form-control input-mask-date" id="masa_berlaku" value="<?php echo $row['masa_berlaku'] ?>">
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
									</span>
                                </div>
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
							<input type="text" name="pic_input" value="<?php echo "".$_SESSION['userid']."";?>" hidden="hidden">
								<?php
									//menampilkan tanggal dan waktu sekarang
									date_default_timezone_set('Asia/Jakarta');
									$tgl = date("Y-m-d h:i:s");
								?>
							<input type="text" name="tgl_input" value="<?php echo $tgl;?>" hidden="hidden">
                        <!-------------------------------------------------------->
							<input type="text" name="pic_cek" value="" hidden="hidden">
							<input type="text" name="tgl_cek" value="0000-00-00 00:00:00" hidden="hidden">
						<!-------------------------------------------------------->
							<input type="text" name="file_gambar" value="" hidden="hidden">							
						<!-------------------------------------------------------->							
								<input type="text" name="proses" value="Update" hidden="hidden">
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
								<!-- Button untuk update data -->
								<button type="submit" name="update" class="btn btn-success btn-md" title="Update Data Lisensi">
								<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update</button>
								<!-- Button untuk reset data -->
								<button type="reset" class="btn btn-warning btn-md" title="Reset Data Lisensi">
								<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
								<!-- Button untuk kembali ke halaman sebelumnya -->
								<a href="lisensi.php" class="btn btn-md btn-default" title="Kembali">
								<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal</a>
							</div>
						</div>
						</div>
					</form>

<!---=====================================================================================================================--->					
            
					</div>
                </div>
            </div>
		</div>
        <!-- /.Page Content Tutup -->

<!---=====================================================================================================================--->
		
    </div>
</div>
<!-- /.Page Wrapper Tutup -->	

<!---=====================================================================================================================--->
 
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
			id_license: {
                validators: {
				    notEmpty: {
                        message: 'ID Lisensi tidak boleh kosong'
                    }
                    
                }
            },
            pengembang: {
                validators: {
				    notEmpty: {
                        message: 'Pengembang harus di pilih'
                    }
                    
                }
            },
			software: {
                validators: {
				    notEmpty: {
                        message: 'Software harus di pilih'
					}
                    
                }
            },
			no_license: {
                validators: {
				    notEmpty: {
                        message: 'No. Lisensi tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\- ]+$/,
                        message: 'Jenis Lisensi tidak valid'
					}
                    
                }
            },
			no_part_license: {
                validators: {
				    notEmpty: {
                        message: 'No. Part Lisensi tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\- ]+$/,
                        message: 'Jenis Lisensi tidak valid'
					}
                    
                }
            },
            jenis_license: {
                validators: {
                    notEmpty: {
                        message: 'Jenis Lisensi tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_\- ()]+$/,
                        message: 'Jenis Lisensi tidak valid'
                    }
                }
            },
            deskripsi: {
                validators: {
                    notEmpty: {
                        message: 'Deskripsi tidak boleh kosong'
                    },
                stringLength: {
                    max: 300,
                        message: 'Deskripsi tidak bisa lebih dari 300'
					}
                }
            },			
            vendor: {
                validators: {
                    notEmpty: {
                        message: 'Vendor harus di pilih'
                    }
                }
            },
            no_bantex: {
                validators: {
                    notEmpty: {
                        message: 'No. Bantex tidak boleh kosong'
                    },
					regexp: {
                        regexp: /^\d*[0-9](\.\d*[0-9])?$/,
                        message: 'No. Bantex tidak valid'
					}
                }
            },				
            section_pemilik: {
                validators: {
                    notEmpty: {
                        message: 'Section Pemilik tidak boleh kosong'
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
			tanggal_terbit: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Terbit tidak boleh kosong'
					}
                }
            },
			masa_berlaku: {
                validators: {
                    notEmpty: {
                        message: 'Masa Berlaku tidak boleh kosong'
					}
                }
            },
			status: {
                validators: {
                    notEmpty: {
                        message: 'Status harus dipilih'
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
                        message: 'Deskripsi tidak bisa lebih dari 300'
					}
                }
            },
			
        }
    });
});
</script>