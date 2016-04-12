<?php
//menampilkan session
include "../session/admin.php";
//koneksi ke database
include '../config/config.php';

//action untuk menghapus data dari database
if(isset($_GET['d'])):
     $stmt = $mysqli->prepare("DELETE FROM t_user WHERE userid=?");
     $stmt->bind_param('s', $id);

     $id = $_GET['d'];

     if($stmt->execute()):
          echo "<script>location.href='user.php'</script>";
     else:
          echo "<script>alert('".$stmt->error."')</script>";
     endif;
endif;
?>
