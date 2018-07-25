<?php
{
	echo" </table><br><center><b>HASIL SELEKSI SANTRI</b>
	<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>
	<th height=30>No
	<th><center>Nama Santri
	<th><center>No Peserta
	<th><center>JK
	<th><center>Nama Orangtua/Wali
	<th width='40%'><center>Kelulusan
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
	break;
}
?>