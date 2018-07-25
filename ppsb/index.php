<?php
session_start();
error_reporting(E_ALL ^E_NOTICE ^E_DEPRECATED); 
ini_set('display_errors',0); 
$username=$_SESSION[username];

include('akses.php');
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/library.php";
include "../config/class_paging.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Seleksi Santri MAUT</title>
<link rel="shortcut icon" href="../images/ponpes.png">
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="../script.js"></script>
</head>

<body>
<div id="art-main">
<div class="cleared reset-box"></div>
<div class="art-header">
<div class="art-header-position">
<div class="art-header-wrapper">
<div class="cleared reset-box"></div>
<div class="art-header-inner">
<div class="art-headerobject"></div>
<div class="art-logo">

<h1 class="art-logo-text">SELEKSI SANTRI BARU PPM AL-IHSAN BALEENDAH</a></h1>
<h2>PPSB Area</h2>
<p><a href="index.php">Home</a> / <a href="../logout.php">Logout</a></p>
<p>Selamat datang di PPSB Area, Anda Login sebagai PPSB</p>
<h2 class="art-logo-text"></h2>
</div>
</div>
</div>
</div>
</div>

<div class="cleared reset-box"></div>
<div class="art-bar art-nav">
<div class="art-nav-outer">
<div class="art-nav-wrapper">
<div class="art-nav-inner">
<ul class="art-hmenu">

<li><a href="index.php" class="active">Home</a></li>
<li><a href="index.php?menu=santri" class="active">Santri</a></li>
<li><a href="index.php?menu=kriteria" class="active">Kriteria</a></li>
<li><a href="index.php?menu=bobot_nilai" class="active">Nilai Bobot</a></li>
<li><a href="index.php?menu=nilai" class="active">Nilai</a> </li>
<li><a href="index.php?menu=proses" class="active">Proses</a></li>
</ul>
</div>
</div>
</div>
</div>

<div class="cleared reset-box"></div>
<div class="art-box art-sheet">
<div class="art-box-body art-sheet-body">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<div class="art-box art-post">
<div class="art-box-body art-post-body">
<div class="art-post-inner art-article">

<?php
if (empty($_GET['menu']))
{
include "../home.php";
}
if ($_GET['menu']=='santri')
{
include "santri.php";
}
if ($_GET['menu']=='kriteria')
{
include "kriteria.php";
}
if ($_GET['menu']=='bobot_nilai')
{
include "bobot_nilai.php";
}
if ($_GET['menu']=='nilai')
{
include "nilai.php";
}
if ($_GET['menu']=='proses')
{
include "maut.php";
}
?>

</div></div></div>
<div class="cleared"></div>
</div>
</div> 
<div class="cleared"></div>
<div class="art-footer">
<div class="art-footer-body">
<div class="art-footer-text">
<p>© 2017 All Rights Reserved By PPM Al-Ihsan</p>
</div>
<div class="cleared"></div>
</div>
</div>
<div class="cleared"></div>
</div>
</div>
</div>

</body>
</html>