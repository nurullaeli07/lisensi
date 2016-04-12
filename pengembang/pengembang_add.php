<?php
//menampilkan session
include "../session/user.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
include '../config/config.php';
?>
<!---=================================================================================================================--->

<!-- Page Wrapper Tutup -->
<div id="page-wrapper">
    <div class="container-fluid">

<!---=================================================================================================================--->
			
        <!-- Start of Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-plus-square"></i><strong> Tambah Data Pengembang</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; 
						<a href="../pengembang/pengembang.php" title="Lihat Data Pengembang">Data Pengembang</a> &raquo; Tambah Data Pengembang
                    </li>
                </ol>
            </div>
        </div>
        <!-- End of Page Heading -->
				
<!---=================================================================================================================--->

        <!-- Start of Page Content -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-info">
					<div class="panel-heading"><i class="fa fa-plus-circle"></i>  Data Pengembang</div>
                    <div class="panel-body">

<!---=================================================================================================================--->
						<?php
							if(isset($_POST['bts'])):
							  if($_POST['pengembang']!=null){
								$stmt1 = $mysqli->prepare("INSERT INTO t_pengembang_history(pengembang, proses, note, tgl_input, pic_input,ip_address) VALUES (?,?,?,?,?,?)");
								$stmt2 = $mysqli->prepare("INSERT INTO t_pengembang(pengembang) VALUES (?)"); 
								$stmt1->bind_param('ssssss', $pengembang, $proses, $note, $tgl_input, $pic_input, $ip_address);
								$stmt2->bind_param('s', $pengembang);

								$pengembang = $_POST['pengembang'];
								$proses					= 'Insert';
								$note					= '-';
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
							  <h3><strong>Data Berhasil disimpan!</strong></h3> Silahkan tambah lagi, jika ingin keluar klik <a href="pengembang.php">kembali</a>.
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
							<input type="text" name="proses" value="Input" hidden="hidden">
							<div class="form-group">
								<label class="col-sm-3 control-label">Pengembang Software</label>
								<div class="col-sm-6">
									<input type="text" name="pengembang" class="form-control" placeholder="Enter Pengembang Software" required>
								</div>
							</div>
							<!-------------------------------------------------------->
							<div class="form-actions well">
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-6">
									<!-- Button untuk menyimpan data -->
									<button type="submit" name="bts" class="btn btn-success btn-md" title="Simpan Data Pengembang">
									<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
									<!-- Button untuk kembali ke halaman sebelumnya -->
									<a href="pengembang.php" title="Kembali" class="btn btn-md btn-default">
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
    $('#validator').bootstrapValidator({
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
        }
    });
});
</script>

<!---=====================Function Untuk Validasi Data===============================--->
</body>
</html>
