<?php
include "config/koneksi.php";
$tgl=date( 'Y');
$tgl2=date( 'd-M-Y');
?>
<style type="text/css">
<!--
.style1 {
font-size: 24px;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<body onLoad="javascript:print()">

<?php
{
echo" </table><br><center><b>PENGUMUMAN KELULUSAN TES SELEKSI SANTRI BARU </b>
</table><br><center><b>PONDOK PESANTREN MODERN AL IHSAN BALEENDAH </b> 
</table><br><center><b>TAHUN PELAJARAN 2017-2018 </b> 
<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>
<th height=30>No
<th><center>Nama Santri
<th><center>No Peserta
<th><center>JK
<th><center>Nama Orangtua/Wali
<th><center>Kelulusan
";

$no=0;
$tampil = mysql_query("SELECT * FROM santri");
while($r=mysql_fetch_array($tampil))
{
$no=$no+1;
echo "<tr>
<td><center>$no</center>
<td><center>$r[nama_santri]
<td><center>$r[no_peserta]
<td><center>$r[jk]
<td><center>$r[nama_ortu]
<td><center>$r[status]
";
}

echo "</table><br><br>";
echo "<table align='right'>";
$tgl = date('d M Y');
echo "<tr><td>Bandung, $tgl</td></tr>";
echo "<tr><td>Mengetahui Ketua PPSB,</td></tr>";
echo "<tr><td><em>&nbsp;</em></td></tr>";
echo "<tr><td><em>&nbsp;</em></td></tr>";
echo "<tr><td><em>&nbsp;</em></td></tr>";
echo "<tr><td>(Aef Saefuddin, Lc)</td></tr>";
}
?>