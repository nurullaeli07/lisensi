<?php
//menampilkan session
include "../session/admin.php";
//koneksi ke database
include '../config/config.php';

if(isset($_GET['d'])):
	//action untuk menghapus data dari database
    $stmt = $mysqli->prepare("DELETE FROM t_license WHERE id_license=?");
    $stmt->bind_param('s', $id);

    $id = $_GET['d'];

    if($stmt->execute()):
        echo "<script language='javascript'>alert('Data Berhasil Di Hapus')</script>";
		echo "<script>location.href='../lisensi/lisensi.php'</script>";
    else:
        echo "<script>alert('".$stmt->error."')</script>";
    endif;
endif;
?>
