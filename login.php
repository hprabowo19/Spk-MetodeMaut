<?php
include('config/koneksi.php');
if(isset($_POST['login'])){
	$user = mysql_real_escape_string(htmlentities($_POST['username']));
	$pass = mysql_real_escape_string(htmlentities(md5($_POST['password'])));
 
	$sql = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
		echo 'User tidak ditemukan';
	}else{
		$row = mysql_fetch_assoc($sql);
		if($row['akses'] == 'ppsb'){
			$_SESSION['ppsb']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login PPSB!"); document.location="ppsb/index.php";</script>';
		}else{
			$_SESSION['tu']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Tata Usaha!"); document.location="tu/index.php";</script>';
		}
	}
}
?>