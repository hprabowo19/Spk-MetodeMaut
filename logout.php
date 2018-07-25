<?php
  session_start();
  session_destroy();
  echo '<script language="javascript">alert("Anda berhasil Logout!"); document.location="index.php";</script>';

  // echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b> <a href=index.php>Home</a>";

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:
?>
