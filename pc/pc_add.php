<?php
include "../session/admin.php";
include "../config/header.php";
// koneksi ke database
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
                <h3 class="page-header"><i class="fa fa-plus-square"></i> <strong>Tambah Penggunaan Lisensi</strong></h3>
                <ol class="breadcrumb">
					<li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../pc/pc.php" title="Lihat Data Penggunaan Lisensi">Data PC</a> &raquo; Tambah Data PC
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
					<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data Penggunaan Lisensi</div>
                    <div class="panel-body">				
<!---=================================================================================================================--->
					
					<form id="validator" action="act.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama PC</label>
							<div class="col-sm-4">
								<input type="text" name="nama_pc" class="form-control" placeholder="Enter Nama PC" maxlength="7" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">ID PC</label>
							<div class="col-sm-4">
								<input type="text" name="id_pc" class="form-control" placeholder="Enter ID PC" maxlength="6" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Section Pemilik</label>
							<div class="col-sm-6">
								<select data-placeholder="Pilih Section..." name="section_pemilik" class="form-control chosen-select" style="height:75px;" tabindex="2">
        						<option value="" selected="selected">Pilih Section..</option>
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
        						<option value="">Pilih ID Lisensi..</option>
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
							<label class="col-sm-3 control-label">Jumlah</label>
							<div class="col-sm-3">
								<input type="text" name="jumlah" class="form-control" placeholder="0" required>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">PIC Instalasi</label>
							<div class="col-sm-4">
								<div class='input-group'>
								<input type="text" name="pic_instalasi" class="form-control" placeholder="Enter PIC Instalasi" required>
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								</div>
							</div>
						</div>
						<!-------------------------------------------------------->
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Instalasi</label>
							<div class="col-sm-4">
								<div class='input-group date' id="datepicker1">
								<input type="text" class="form-control" name="tgl_instalasi" placeholder="0000-00-00" required>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<!-------------------------------------------------------->
								<input type="text" name="pic_input" value="<?php echo "".$_SESSION['userid']."";?>" hidden="hidden">
								
						<!-------------------------------------------------------->
						
						<div class="form-actions well">
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success btn-md" title="Simpan Data PC"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
								<button type="reset" class="btn btn-warning btn-md" title="Reset Data PC"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
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
                        regexp: /^\d*[1-9](\.\d*[1-9])?$/,
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
        }
    });
});
</script>

<!---=====================Function Untuk Validasi Data===============================--->
</body>
</html>