<?php
//untuk menampilkan paling awal-----------------------------------------
session_start();
//koneksi ke database---------------------------------------------------
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("kontrollicense"); //sesuaikan dengan nama database anda

/*--======================================================================================--*/

$userid = $_POST['userid'];
$psw = md5 ($_POST['psw']); //password dengan md5
$op = $_GET['op'];

/*--======================================================================================--*/ 

if($op=="in"){
	//Mengambil data userid dan password dari database------------------
    $cek = mysql_query("SELECT * FROM t_user WHERE userid='$userid' AND password='$psw'");
	
    if(mysql_num_rows($cek)==1){       		//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['userid'] = $c['userid'];
        $_SESSION['level'] = $c['level'];
        if($c['level']=="admin"){          	//jika level admin akan diarahkan ke folder admin
            header("location:lisensi/index.php");
        }else if($c['level']=="user"){    	//jika level user akan diarahkan ke folder user
            header("location:lisensi/index.php");
        }
    }else{
         
		 echo "<script language='JavaScript'>
			alert('Userid atau Password tidak sesuai. Silahkan Di ulang kembali');
			document.location='index.php';
		</script>";
		 
    }
}else if($op=="out"){						//jika keluar session diarahkan ke index awal

    unset($_SESSION['userid']);
    unset($_SESSION['level']);
    header("location:index.php");
}
?>
