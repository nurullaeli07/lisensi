<?php
//menampilkan session
include "../session/admin.php";
//koneksi ke database
include '../config/config.php';

if(isset($_GET['d'])):
     $stmt = $mysqli->prepare("DELETE FROM t_penggunaan_lisensi WHERE id=?");
     $stmt->bind_param('s', $id);

     $id = $_GET['d'];

     if($stmt->execute()):
          echo "<script>location.href='pc.php'</script>";
     else:
          echo "<script>alert('".$stmt->error."')</script>";
     endif;
endif;
?>
