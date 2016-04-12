<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KONTROL LISENSI</title>

    <link href="../assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/dist/css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="../assets/plugins/validator/css/bootstrapValidator.css" rel="stylesheet" type="text/css" >
	<link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/plugins/chosen/chosen.css" rel="stylesheet">
	<link href="../assets/plugins/fileinput/fileinput.css" rel="stylesheet">
	<link href="../assets/plugins/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
	
	<style>
	#shortcut {
	text-align:center;
	}
	#shortcut a {
		background:#FFF;
		display:inline-block;
		border:1px solid #999;
		height:120px;
		width:120px;
		text-align:center;
		color:#444;
		text-decoration:none;
		padding:15px;
		margin:0px 5px;
		box-shadow:3px 3px 5px #CCC;
	}
		#shortcut a:hover {
			box-shadow:0px 0px 10px #555;
		}
	</style>
</head>
<body>

    <div id="wrapper">

        <!-- Open of Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
		
            <!-- Open of Navigation Header -->
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-key fa-fw"></i> <strong>KONTROL LISENSI</strong></a>
            </div>
            <!--  /.End of navbar-header -->

            <!--  Open of navbar-header -->
			<ul class="nav navbar-top-links navbar-right"> 
				<li class="dropdown">
				<?php
				if ($_SESSION['level'] == "admin"){
				?>
					<a><blink><strong>Anda masuk sebagai ADMIN</strong></blink></a>
                <?php
				}
				else if ($_SESSION['level'] == "user"){	
				?>
					<a><blink><strong>Anda masuk sebagai USER</strong></blink></a>
				<?php
				}
				?>
				</li>
				<!--  Open of Date -->
				<li class="dropdown"><a><span id="dates"><span id="the-day">Hari, 00 Bulan 0000</span></a></li>
				<!--  /.End of Date -->
				
				<!--  Open of Time -->
				<li class="dropdown"><a><strong><span id="the-time"> 00:00:00 </span> WIB</strong></span></a></li>
				<!--  /.End of Time -->
				
				<!--  Open of Modal -->
                <li class="dropdown"><a data-toggle="modal" data-target="#myModal" href="#" title="Tentang Kami"><i class="fa fa-info-circle"></i></a></li>
                <li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
				<!--  /.End of Modal -->
				
				<!--  Open of User -->
				<li class="dropdown">
					<?php
					//konkesi ke database
					include '../config/koneksi.php';
					//action untuk menampilkan data user dari database
					$aksi = "select * from t_user where userid = '".$_SESSION['userid']."'";
					$hasil = mysql_query($aksi);
					$data = mysql_fetch_array ($hasil);
					?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $data['nama_lengkap'];?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
					<?php
					if ($_SESSION['level'] == "admin"){
						// tampilkan menu untuk Admin
						echo "<li><a href='../log.php?op=out'><i class='fa fa-turn-off fa-fw'></i> Keluar</a></li>";
					}
					else if ($_SESSION['level'] == "user"){	
						// tampilkan menu untuk User
						echo "<li><a href='../user/user_changepassword2.php'><i class='fa fa-gear fa-fw'></i> Ganti Password</a></li>";
						echo "<li class='divider'></li>";
						echo "<li><a href='../log.php?op=out'><i class='fa fa-sign-out fa-fw'></i> Keluar</a></li>";	
						
					} 
					?>
                    </ul>
				</li>
				<!--  /.End of User -->
			</ul>
            <!--  /.End of navbar-header -->
			<!--  Open of Sidebar -->
            <?php
			include "menu.php";
			?>
            <!--  /.End of Sidebar -->
        </nav>
		<!-- modal input -->
		<div id="modalpesan" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Pesan Notification</h4>
					</div>
					<div class="modal-body">
						<?php 
						$periksa=mysql_query("select * from t_license where jumlah <=0");
						while($q=mysql_fetch_array($periksa)){	
							if($q['jumlah'] <=0){	
								?>	
								<script>
									$(document).ready(function(){
										$('#pesan_sedia').css("color","red");
										$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
									});
								</script>
								<?php
								echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  Lisensi dengan ID : <a style='color:red'>". $q['id_license']."</a> - <a>". $q['software']."</a> <b>KOSONG !</b></div>";	
							}
						}
					?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
					</div>
					
				</div>
			</div>
		</div>
		<br>