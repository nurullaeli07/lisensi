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
                <h3 class="page-header"><i class="fa fa-users"></i> <strong>Daftar User</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> <a href="../config/index.php" title="Kembali ke Beranda">Beranda</a> &raquo; Daftar User 
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.Page Heading Tutup -->

<!---=================================================================================================================--->

            	<div class="row"> 
            		<div class="col-lg-12">
            			<div class="panel panel-default">
           					<div class="panel-body">
<!---=================================================================================================================--->					
							<a href="../laporan/pdf_user.php" class="btn btn-default btn-md"><i class="fa fa-file-pdf-o fa-fw"></i></a>
							<a href="../laporan/excel_user.php" class="btn btn-default btn-md"><i class="fa fa-file-excel-o fa-fw"></i></a>
							<br><br>
<!---=================================================================================================================--->
							<table class="display table table-bordered table-striped table-hover" cellspacing="0" width="80%">
								<thead>
									<tr>
										<th>Nama Lengkap</th>
										<th>Userid</th>
										<th>Hak Akses</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php
									$res = $mysqli->query("SELECT * FROM t_user");
									while ($row = $res->fetch_assoc()):
								?>
				   
									<tr>
										<td><?php echo $row['nama_lengkap']; ?></td>
										<td><?php echo $row['userid'] ?></td>
										<td>
											<a href="user_detaillevel.php?level=<?php echo $row['level'];?>">
											<span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $row['level'] ?>
										</td>
										<td  align="center">
											<a href="user_update.php?id=<?php echo $row['userid'] ?>" title="Update User" class="btn btn-default btn-sm">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
											<a href="user_changepassword.php?userid=<?php echo $row['userid'] ?>" title="Ganti Password" class="btn btn-default btn-sm">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
										</td>
									</tr>
									<?php
										endwhile;
									?>
								</tbody>
							</table>

							
			<!---=================================================================================================================--->							
							
							</div>
						</div>
					</div>
				</div> 
						
<!---=================================================================================================================--->
        
	</div>
</div>
<!-- /#page-wrapper -->
        

		<!---=================================================================================================================--->       	
<?php
include '../config/footer.php';
?>