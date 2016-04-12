<?php
//menampilkan session
include "../session/user.php";
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
                <h3 class="page-header"><i class="fa fa-building"></i><strong> Data Pengembang</strong></h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> 
						<a href="../config/index.php" title="Kembali ke Beranda"> Beranda</a> &raquo; Data Pengembang
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

					<p>
					<a href="../pengembang/pengembang_add.php" title="Tambah Data Pengembang" class="btn btn-primary btn-md">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a><br/>
					</p>
					
<!---=================================================================================================================--->					
					<div class="col-lg-10">
					<table id="table" class="display table table-bordered table-striped table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Pengembang Software</th>
							<?php
							if ($_SESSION['level'] == "admin"){
							?>
							<th>Opsi</th>
							<?php
							}
							else if ($_SESSION['level'] == "user"){	
							}
							?>
						</tr>
					</thead>
					<tbody>
					<?php
						//menampilkan data departement dari database
						$res = $mysqli->query("SELECT * FROM t_pengembang");
						$no = 1;
						while ($row = $res->fetch_assoc())
						{
					?>
					   
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['pengembang'] ?></td>
							<?php
							if ($_SESSION['level'] == "admin"){
							?>
							<td>
								<a href="../pengembang/pengembang_update.php?id=<?php echo $row['id'] ?>" title="Edit Data Pengembang" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Edit</a>
								<a href="../pengembang/pengembang_delete.php?id=<?php echo $row['id'] ?>" title="Hapus Data Pengembang" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Hapus</a>
							</td>
							<?php
							}
							else if ($_SESSION['level'] == "user"){	
							}
							?>
						</tr>
						<!--- Penomoran --->
						<?php
							$no++;
						}
						?>
					</tbody>
					</table>
					</div>
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

