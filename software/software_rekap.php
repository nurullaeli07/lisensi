<?php
//menampilkan session
include "../session/admin.php";
//menmapilkan header halaman
include "../config/header.php";
//koneksi ke database
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
                <h3 class="page-header"><i class="fa fa-link"></i><strong> Rekap Data Software</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Rekap Data Software
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->
<!---=================================================================================================================--->

        <!-- Page Content Buka -->
        <div class="row"> 
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

<!---=================================================================================================================--->
					
<!---=================================================================================================================--->
					
					<table id="table" class="display table table-th table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Software</th>
							<th>Pengembang</th>
							<th>Proses</th>
							<th>Note</th>
							<th>Author</th>
							<th>Tanggal Proses</th>
							<th>IP Address</th>
						 </tr>
					</thead>
					<tbody>
					<?php
						//menampilkan data software dari database
						$res = $mysqli->query("SELECT * FROM t_software_history");
						$no = 1;
						while ($row = $res->fetch_assoc())
						{
					?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['nama_software'] ?></td>
							<td><?php echo $row['pengembang'] ?></td> 
							<td><?php echo $row['proses'] ?></td>
							<td><?php echo $row['note'] ?></td>
							<td><?php echo $row['pic_input'] ?></td>
							<td><?php echo $row['tgl_input'] ?></td>
							<td><?php echo $row['ip_address'] ?></td>
						</tr>
						<!--- Penomoran --->
						<?php
							$no++;
						}
						?>
					</tbody>
					</table>

<!---=================================================================================================================--->
					
					</div>
                </div>
            </div>
		</div>
        <!-- /.Page Content Tutup -->

<!---=================================================================================================================--->

    </div>
</div>
<!-- /.Page Wrapper -->	

<!---=================================================================================================================--->
	    	    
<?php
include "../config/footer.php";
?>


<!---========================================= Modal Untuk Insert Data Buka ==========================================--->

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
<!------------------------------------------------------------------------------------------------->		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><strong>Tambah Data Software</strong></h4>
			</div>
<!------------------------------------------------------------------------------------------------->
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-body">
<!------------------------------------------------------------------------------------------------->					
					<form class="form-horizontal" method="POST" class="form-inline" onsubmit="return validasi_input(this)">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Software</label>
							<div class="col-sm-9">
								<input type="text" name="nama_software" class="form-control" placeholder="Enter Nama Software">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Pengembang</label>
							<div class="col-sm-9">
								<select name="pengembang" class="form-control">
									<option value="0? selected="selected">-- Pilih Pengembang --</option>
										<?php
										$query = mysqli_query($mysqli,"SELECT * FROM t_pengembang"); 
									while ($row = mysqli_fetch_array($query))
									{
									echo "<option value='$row[pengembang]'>$row[pengembang]</option>";
									}
									?>
								</select>
							</div>
						</div>
<!------------------------------------------------------------------------------------------------->		
					</div> <!----/.Panel Body--->
				</div> <!----/.Panel Default---->
			</div><!----/.Modal Body---->
			
<!------------------------------------------------------------------------------------------------->

			<div class="modal-footer">
				<input type="submit" name="add" class="btn btn-primary" value="Simpan">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup </button>
			</div>
			
				</form>

<!------------------------------------------------------------------------------------------------->

		</div><!---Modal Konten---->
	</div><!---Modal Dialog---->
</div><!---Modal--->

<!---========================================= Modal Untuk Insert Data Tutup ==========================================--->


<!-- Action untuk menambah data Buka -->
<?php 
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
$nama_software	= $_POST['nama_software'];
$pengembang		= $_POST['pengembang'];
date_default_timezone_set('Asia/Jakarta');
$tgl_input			= date("Y-m-d H:i:s");
$pic_input			= $_SESSION['userid'];

if(isset($nama_software) && isset($pengembang) && isset($tgl_input) && isset($pic_input))
    $res1 = $mysqli->query("insert into t_software_history values('','$nama_software','$pengembang','$tgl_input','$pic_input')");
	$res2 = $mysqli->query("insert into t_software values('','$nama_software','$pengembang')");	
if ($res1 && $res2) 
	{
	echo '<script language="javascript">alert("Data Berhasil Di Tambah")</script>';
	echo '<script language="javascript">window.location = "software.php"</script>';
}
else
	{
}
	echo '<script language="javascript">alert("Data Gagal Di Tambah")</script>';
	echo '<script language="javascript">window.location = "software.php"</script>';
}
mysqli_close;
?> 
<!-- Action untuk menambah data Tutup -->



<!-- Funtion untuk Update data Buka -->
<script type="text/javascript">
function updatedata(str){
	var id_software = str;
	var nama_software = $('#nama_software'+str).val();
	var pengembang = $('#pengembang'+str).val();
    
	var datas = "id_software="+id_software+
			   "&nama_software="+nama_software+
			   "&pengembang="+pengembang;
    
$.ajax({
       type: "POST",
       url: "software_up.php",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg );
	   window.location.reload(true);
   }).fail(function() {
       alert( "error" );
	   window.location.reload(true);
   });
}
 </script>
<!-- Funtion untuk Update data Tutup -->



<!-- Funtion untuk Validasi data Buka --> 
<script type="text/javascript">
function validasi_input(form){
 if (form.Status.value =="0"){
    alert("Anda belum memilih Status!");
    return (false);
 }
return (true);
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#validasi_input(form)').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_software: {
                group: '.col-sm-5',
                validators: {
                    notEmpty: {
                        message: 'Nama Software tidak boleh kosong'
                    }
                }
            },
            pengembang: {
                group: '.col-sm-5',
                validators: {
                    notEmpty: {
                        message: 'Pengembang tidak boleh kosong'
                    }
                }
            },
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
<!-- Funtion untuk Validasi data Tutup -->
