<?php
include "config/koneksi.php";
session_start();

$pass     =$_POST[password];
$login=mysql_query("SELECT * FROM users WHERE username like '$_POST[username]' AND password like '$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($ketemu > 0){
  session_start(); 
  $_SESSION[username]     = $r[username];
  $_SESSION[password]     = $r[password];
  $_SESSION[nama]         = $r[nama];
  
   header('location:index.php?menu=');
}
else
{
   header('location:index.php?menu=gagal');
}
?>
