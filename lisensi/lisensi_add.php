<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>
<!-------------------------------------------------------->
						
<!---=========================================================================================================--->

<!-- Page Wrapper Buka -->
<div id="page-wrapper">
	<div class="container-fluid">
    
<!---=========================================================================================================--->    
    	
		<!-- Page Heading Buka -->
        <div class="row">
        	<div class="col-lg-12">
            	<h3 class="page-header"><i class="fa fa-plus-square"></i> <strong>Tambah Data Lisensi</strong></h3>
                <ol class="breadcrumb">
                	<li class="active">
                    	<i class="fa fa-home"></i> 
                        <a href="../config/index.php" title="Kembali Ke Beranda">Beranda</a> &raquo; 
                        <a href="lisensi.php" title="Lihat Data License">Data Lisensi</a> &raquo; Tambah Data Lisensi
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->
<!---=========================================================================================================--->
        <!-- /.Page Content Buka-->
        <div class="row"> 
        	<div class="col-lg-12">
            	<div class="panel panel-info">
				<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data Lisensi</div>
                	<div class="panel-body">
                    
<!---=========================================================================================================--->                    

						<?php // jika submit button diklik
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
						
						$res1 = $mysqli->query("insert into t_license_history 	values('','$id_license', '$pengembang', '$software', '$no_license', '$no_part_license', '$jenis_license', '$deskripsi', '$vendor', '$no_bantex', '$section_pemilik', '$jumlah', '$tanggal_terbit', '$masa_berlaku', '$status', '$pic_input', '$tgl_input', '$pic_cek', '$tgl_cek', '$proses', '$note', '$ip_address')");
						$res2 = $mysqli->query("insert into t_license 			values(	  '$id_license', '$pengembang', '$software', '$no_license', '$no_part_license', '$jenis_license', '$deskripsi', '$vendor', '$no_bantex', '$section_pemilik', '$jumlah', '$tanggal_terbit', '$masa_berlaku', '$status', '$pic_input', '$tgl_input', '$pic_cek', '$tgl_cek', '$file_gambar' )");

						if ($res1 && $res2){
						}else{
								echo '';
						}
						?>
						<p></p>
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h3><strong>Data Berhasil disimpan!</strong></h3> Silahkan tambah lagi, jika ingin keluar klik <a href="lisensi.php">kembali</a>.
						</div>
						<?php 
						}
						?> 
<!---=================================================================================================================--->
					
					<form id="validator" method="POST" class="form-horizontal" enctype="multipart/form-data" action="">                      
                        <!-------------------------------------------------------->
						<?php
							//koneksi ke database
							$hostname = 'localhost';
							$username = 'root';
							$password = '';
							$database = 'kontrollicense';
							try
							{
								$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
							}
							catch(PDOException $e)
							{
								echo $e->getMessage();
							}
							//membuat kode otomatis
							$query = $dbh->query('SELECT MAX(id_license) as kodex  FROM  t_license');
							$data = $query->fetch();
							$kode = $data['kodex'];
							$nourut = (int)substr($kode, 2, 4); //mengambil 2 dari depan "LC" dan 4 dari belakang 0000
							$nourut++; 
							$char = "LC"; //kode untuk license
							$newID = $char . sprintf("%04s", $nourut) ; //tampilannya menjadi LC0000
						?>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">ID License</label>
                        	<div class="col-sm-2">
								<input type="text" name="id_license" class="form-control" value="<?php echo $newID; ?>" readonly="readonly">
                            </div>
                        </div>
                        <!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Pengembang</label>
							<div class="col-sm-6">				
								<select data-placeholder="Pilih Pengembang..." name="pengembang" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="">Pilih Pengembang..</option>
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
									<option value="">Pilih Software..</option>
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
								<input type="text" name="no_license" class="form-control" placeholder="Enter No. License" />
                            </div>
                        </div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">No. Part License</label>
                        	<div class="col-sm-6">
								<input type="text" name="no_part_license" class="form-control" placeholder="Enter No. Part License">
                            </div>
                        </div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Jenis License</label>
                        	<div class="col-sm-6">
								<input type="text" name="jenis_license" class="form-control" placeholder="Enter Jenis license">
                             </div>
                        </div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Deskripsi</label>
                        	<div class="col-sm-7">
								<textarea class="form-control" rows="6" name="deskripsi"></textarea>
                            </div>
                        </div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Vendor</label>
                        	<div class="col-sm-6">
								<select data-placeholder="Pilih Vendor..." name="vendor" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="">Pilih Vendor..</option>
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
                        	<div class="col-sm-3">
								<input type="text" name="no_bantex" class="form-control" placeholder="0000">
                            </div>
                        </div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Section Pemilik</label>
                        	<div class="col-sm-6">
								<select data-placeholder="Pilih Section..." name="section_pemilik" class="form-control chosen-select" style="height:75px;" tabindex="2">
									<option value="">Pilih Section..</option>
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
                        	<div class="col-sm-3">
								<input type="text" name="jumlah" class="form-control" placeholder="0">
                            </div>
                        </div>
						<!-------------------------------------------------------->
                        <div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Terbit</label>
							<div class="col-sm-4">
								<div class='input-group date' id="datepicker">
								<input type="text" class="form-control calender" name="tanggal_terbit" id="tanggal_terbit" placeholder="0000-00-00" required>
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
									<input type="text" name="masa_berlaku" class="form-control input-mask-date">
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
							<input type="text" name="proses" value="Insert" hidden="hidden">
							<input type="text" name="note" value="-" hidden="hidden">
						<!-------------------------------------------------------->
                        <div class="form-actions well">
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-6">
									<!-- Button untuk menyimpan data -->
									<button type="submit" name="bts" class="btn btn-success btn-md" title="Simpan Data Lisensi">
									<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
									<!-- Button untuk menyimpan data -->
									<button type="reset" class="btn btn-warning btn-md" title="Reset Data Lisensi">
									<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
									
								</div>
							</div>
						</div>
						<!-------------------------------------------------------->
					</form>

<!---=====================================================================================================================--->				
                	
                    </div>
                </div>
			</div>
    	</div>
		<!-- Page Content Tutup -->
        
<!---=====================================================================================================================--->        
	
	</div>
</div>
<!-- Page Wrapper Tutup -->
<!---=====================================================================================================================--->
</script>
<?php
include '../config/footer.php';
?> 

<!---==========================Action Untuk Insert Data============================--->


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
			
        }
    });
});
</script>
</body>
</html>