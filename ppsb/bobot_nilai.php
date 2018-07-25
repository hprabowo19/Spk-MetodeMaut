 
<?php
switch($_GET['act'])

{
	default:
	echo "  
	<td> <center>&nbsp;<B><font size=4>DATA KRITERIA</font></B><p>
	</table></form><br>
	<table width=90% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th height=30>No
	<th><center>Kode Kriteria
	<th><center>Nama Kriteria
	<th><center>Isi Bobot
	";

	$no=0;
	$tampil = mysql_query("SELECT * FROM kriteria");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		echo "<tr>
		<td><center>$no</center>
		<td><center>$r[kode_kriteria]
		<td><center>$r[nama_kriteria]

		<td><a href=?menu=bobot_nilai&act=isi1&kode_kriteria=$r[kode_kriteria]><center><img src=../icons/report.gif border=0 height=15> 
		";
	}
	echo "</table><br><br><br><br><br>";


	break;  
	case "isi1":
	$edit = mysql_query("SELECT * FROM kriteria 
		WHERE kriteria.kode_kriteria like '$_GET[kode_kriteria]'");
	$r    = mysql_fetch_array($edit);
	echo "  
	<td> <center>&nbsp;<B><font size=4>ISI NILAI BOBOT</font></B><p>
	</form><form action=./master.php?menu=bobot_nilai&act=input method=POST enctype='multipart/form-data'>
	<input type=hidden name=kode_kriteria value=$r[kode_kriteria]>
	<table width=60%>

	<tr><td>Nama Kriteria <td>$r[nama_kriteria]
	<tr><td>Nama Bobot <td><input type=text name='nama_bobot' size=40 value=$r[nama_bobot]> 
	<tr><td>Nilai Bobot <td><input type=text name='nilai_bobot' value=$r[nilai_bobot]>

	<tr><td><td colspan=4><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form><br>
	<table width=60% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th height=30>No
	<th><center>Nama Bobot
	<th><center>Nilai Bobot
	<th><center>Ubah
	<th><center>Hapus

	";
	$p      = new Paging;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$no=0;
	$tampil = mysql_query("SELECT * FROM bobot_nilai where kode_kriteria='$_GET[kode_kriteria]'");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		echo "<tr>
		<td><center>$no</center>
		<td><center>$r[nama_bobot]
		<td><center>$r[nilai_bobot]

		<td><a href=?menu=bobot_nilai&act=ubah&kode_kriteria=$r[kode_kriteria]&kode_bobot=$r[kode_bobot]><center><img src=../icons/report.gif border=0 height=15> 
		<td><center><a href=\"./master.php?menu=bobot_nilai&act=batal&kode_kriteria=$r[kode_kriteria]&kode_bobot=$r[kode_bobot]\"onClick=\"return confirm('Apakah Di Hapus??')\"><img src=../icons/delete.png border=0 height=15>
		";
	}
	echo "</table>";
	

	break;
	case "ubah":
	$edit = mysql_query("SELECT * FROM bobot_nilai join kriteria  
		on kriteria.kode_kriteria=bobot_nilai.kode_kriteria WHERE kode_bobot='$_GET[kode_bobot]'");
	$r    = mysql_fetch_array($edit);

	echo "  
	<td> <center>&nbsp;<B><font size=4>UBAH DATA BOBOT NILAI</font></B><p>
	</form><form action=./master.php?menu=bobot_nilai&act=ubah method=POST enctype='multipart/form-data'>
	<input type=hidden name=kode_kriteria value=$r[kode_kriteria]>
	<input type=hidden name=kode_bobot value=$r[kode_bobot]>
	<table width=60%>

	<tr><td>Kode Kriteria <td>$r[nama_kriteria]
	<tr><td>Nama Bobot <td><input type=text name='nama_bobot' size=30 value='$r[nama_bobot]'> 
	<tr><td>Nilai Bobot <td><input type=text name=nilai_bobot value='$r[nilai_bobot]' size=4>

	<tr><td><td colspan=4><input type=submit value=Ubah>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form><br>
	<table width=60% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th height=30>No
	<th><center>Nama Bobot
	<th><center>Nilai Bobot
	<th><center>Ubah
	<th><center>Hapus

	";
	$p      = new Paging;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$no=0;
	$tampil = mysql_query("SELECT * FROM bobot_nilai where kode_kriteria='$_GET[kode_kriteria]'");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		echo "<tr>
		<td><center>$no</center>
		<td>$r[nama_bobot]
		<td><center>$r[nilai_bobot]

		<td><a href=?menu=bobot_nilai&act=ubah&kode_kriteria=$r[kode_kriteria]&kode_bobot=$r[kode_bobot]><center><img src=../icons/report.gif border=0 height=15> 
		<td><center><a href=\"./master.php?menu=bobot_nilai&act=batal&kode_kriteria=$r[kode_kriteria]&kode_bobot=$r[kode_bobot]\"onClick=\"return confirm('Apakah  Di Hapus??')\"><img ../src=../icons/delete.png border=0 height=15>
		";
	}
	echo "</table>";
	break;


}
?>
</table></table></div></div> 