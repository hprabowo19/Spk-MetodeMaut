<?php
switch($_GET['act'])

{
	default:	
	echo "
	<td> <center>&nbsp;<font size=4><B>INPUT DATA KRITERIA</B></font><p>&nbsp;
	<p><form action=./master.php?menu=kriteria&act=input method=POST enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
	<table width=80%>

	<tr><td>Kode Kriteria<td> 
	<input type=text name='kode_kriteria' size=10>
	<span id='pesan'></span>

	<tr><td>Nama Kriteria<td> 
	<input type=text name='nama_kriteria' size=40>
	<span id='pesan'></span>

	<tr><td>Bobot(%)<td> 
	<input type=text name='bobot' size=10>
	<span id='pesan'></span>";
	$dt=100;
	$qry = mysql_query("SELECT SUM(bobot) AS total FROM kriteria");
    $row = mysql_fetch_assoc($qry);
    $aa=$row['total'];
	if($aa<$dt){
			echo"
	<tr><td><td colspan=4><input type=submit value=Tambah>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form><br>";
				}
	else if($aa>$dt)
				{
			echo"<tr><td><td colspan=4>
			Anda Tidak Bisa Menambah Kriteria Karena Bobot Melebihi Batas
			</td></tr></table></form><br>";
				}
	else if($aa==$dt)
				{
			echo"<tr><td><td colspan=4>
			Anda Tidak Bisa Menambah Kriteria Silahkan Edit Bobot Sesuai Dengan Kebutuhan
			</td></tr></table></form><br>";
				}
	echo "<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th width=5% height=30>No
	<th width=15% ><center>Kode Kriteria
	<th ><center >Nama Kriteria
	<th width=15% >Bobot

	<th width=5%><center>Ubah
	<th width=5%><center>Hapus
	";

	$no=0;
	$tampil = mysql_query("SELECT * FROM kriteria");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		echo "<tr class='td' bgcolor='#FFF'>
		<td><center>$no</center>
		<td><center>$r[kode_kriteria]
		<td><center>$r[nama_kriteria]
		<td><center>$r[bobot] %

		<td><a href=?menu=kriteria&act=ubah&kode_kriteria=$r[kode_kriteria]><center><img src=../icons/report.gif border=0 height=15> 
		<td><a href=\"./master.php?menu=kriteria&act=batal&kode_kriteria=$r[kode_kriteria]\"onClick=\"return confirm('Apakah (&nbsp;&nbsp;$r[nama_kriteria]&nbsp;&nbsp;) Di Hapus??')\"><center><img src=../icons/delete.png border=0 height=15>		
		";
	}
	echo "</table><br>";
	break;  


	case "ubah":
	$edit = mysql_query("SELECT * FROM kriteria WHERE kriteria.kode_kriteria like '$_GET[kode_kriteria]'");
	$r    = mysql_fetch_array($edit);
	echo "  
	<td> <center>&nbsp;<B><font size=4>UBAH DATA KRITERIA</font></B><p>
	</form><form action=./master.php?menu=kriteria&act=ubah method=POST enctype='multipart/form-data'>
	<input type=hidden name=kode_kriteria value=$r[kode_kriteria]>
	<table width=80%>

	<tr><td>Kode Kriteria<td> 
	<input type=text name='kode_kriteria' size=10 value='$r[kode_kriteria]' readonly=true>
	<span id='pesan'></span>

	<tr><td>Nama kriteria<td> 
	<input type=text name='nama_kriteria' size=40 value='$r[nama_kriteria]'>
	<span id='pesan'></span>

	<tr><td>Bobot(%)<td>
	<input type=text name='bobot' size=10 value='$r[bobot]'>
	<span id='pesan'></span>";
	$dt=100;
	$qry = mysql_query("SELECT SUM(bobot) AS total FROM kriteria");
    $row = mysql_fetch_assoc($qry);
    $aa=$row['total'];
	if($aa<$dt){
			echo"
	<tr><td><td colspan=4><input type=submit value=Ubah>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form><br>";
				}
	else if($aa>$dt)
				{
			echo"<tr><td><td colspan=4><input type=submit value=Ubah>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
			</table></form><br>
			<tr><td><td colspan=4>
			Anda Tidak Bisa Menambah Kriteria Karena Bobot Melebihi Batas
			</td></tr></table></form><br>";
				}
	else if($aa==$dt)
				{
			echo"<tr><td><td colspan=4>
			Anda Tidak Bisa Menambah Kriteria Silahkan Edit Bobot Sesuai Dengan Kebutuhan
			</td></tr></table></form><br>";
				}  		 

	echo "<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th width=5% height=30>No
	<th width=15% ><center>Kode Kriteria
	<th ><center >Nama Kriteria
	<th width=15% >Bobot

	<th width=5%><center>Ubah
	<th width=5%><center>Hapus

	";
	$p      = new Paging;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$no=0;
	$tampil = mysql_query("SELECT * FROM kriteria");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		echo "<tr class='td' bgcolor='#FFF'>
		<td><center>$no</center>
		<td><center>$r[kode_kriteria]
		<td><center>$r[nama_kriteria]
		<td><center>$r[bobot] %

		<td><a href=?menu=kriteria&act=ubah&kode_kriteria=$r[kode_kriteria]><center><img src=../icons/report.gif border=0 height=15> 
		<td><center><a href=\"./master.php?menu=kriteria&act=batal&kode_kriteria=$r[kode_kriteria]\"onClick=\"return confirm('Apakah (&nbsp;&nbsp;$r[nama_kriteria]&nbsp;&nbsp;) Di Hapus??')\"><img src=../icons/delete.png border=0 height=15>
		";
	}
	break;

}
?>
</table></table></div></div> 