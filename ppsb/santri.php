<?php
switch($_GET['act'])

{
	default:	
	echo "
	<td> <center>&nbsp;<font size=4><B>INPUT DATA SANTRI</B></font><p>&nbsp;
	<p><form action=./master.php?menu=santri&act=input method=POST enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
	<table width=80%>

	<tr><td>NISN <td> 
	<input type=text name='nisn' size=10 required/>

	<tr><td>Nama Santri <td> 
	<input type=text name='nama_santri' size=40 required>

	<tr><td>No Peserta <td> 
	<input type=text name='no_peserta' size=10 required/>

	<tr><td>Jenis Kelamin <td> 
	<select name=jk>
	<option value=Pilih Jenis Kelamin>Pilih Jenis Kelamin
	<option value=Laki-laki>Laki-laki
	<option value=Perempuan>Perempuan

	<tr><td>Ujian <td> 
	<select name=ujian>
	<option value=Pilih Ujian>Pilih Ujian
	<option value=Tsanawiyah>Tsanawiyah
	<option value=Aliyah>Aliyah

	<tr><td>Nama Orangtua/Wali <td> 
	<input type=text name='nama_ortu' size=40 required>

	<tr><td><td colspan=4><input type=submit value=Tambah>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form><br>";

	if ($_GET['proses']=='gagal')
	{
		echo "<center><blink>Maaf Data Sudah Ada</blink>";
	}

	echo "<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th height=30>No
	<th><center>NISN
	<th><center>Nama Santri
	<th><center>No Peserta
	<th><center>Jenis Kelamin
	<th><center>Ujian
	<th><center>Nama Orangtua/Wali

	<th><center>Ubah
	<th><center>Hapus";
	$no=0;
	$tampil = mysql_query("SELECT * FROM santri");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;

		echo "<tr>
		<td><center>$no</center>
		<td><center>$r[nisn]
		<td><center>$r[nama_santri]
		<td><center>$r[no_peserta]
		<td><center>$r[jk]
		<td><center>$r[ujian]
		<td><center>$r[nama_ortu]

		<td><a href=?menu=santri&act=ubah&nisn=$r[nisn]><center><img src=../icons/report.gif border=0 height=15>
		<td><a href=\"./master.php?menu=santri&act=batal&nisn=$r[nisn]\"onClick=\"return confirm('Apakah (&nbsp;&nbsp;$r[nama_santri]&nbsp;&nbsp;) Di Hapus?')\"><center><img ../src=../icons/delete.png border=0 height=15>		
		";

	}
	echo "</table><br><br>";
	break;



	case "ubah":
	$edit = mysql_query("SELECT * FROM santri WHERE nisn like '$_GET[nisn]'");
	$r    = mysql_fetch_array($edit);

	echo "<br><center>	 
	<td><center>&nbsp;<B><font size=4>UBAH DATA SANTRI</font></B><p>
	</form><form action=./master.php?menu=santri&act=ubah method=POST enctype='multipart/form-data'>
	<input type=hidden name=nisn value=$r[nisn]>			
	<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<tr><td>NISN <td> 
	<input type=text name='nisn' size=10 value='$r[nisn]' readonly=true required/>

	<tr><td>Nama Santri <td> 
	<input type=text name='nama_santri' size=40 value='$r[nama_santri]' required/>

	<tr><td>No Peserta <td> 
	<input type=text name='no_peserta' size=10 value='$r[no_peserta]' required/>

	<tr><td>Jenis Kelamin <td> 
	<select name=jk>
	<option value=$r[jk] selected>$r[jk]
	<option value=Pilih Jenis Kelamin>Pilih Jenis Kelamin
	<option value=Laki-laki>Laki-laki
	<option value=Perempuan>Perempuan

	<tr><td>Ujian <td> 
	<select name=ujian>
	<option value=$r[ujian] selected>$r[ujian]
	<option value=Pilih Ujian>Pilih Ujian
	<option value=Tsanawiyah>Tsanawiyah
	<option value=Aliyah>Aliyah

	<tr><td>Nama Orangtua/Wali <td> 
	<input type=text name='nama_ortu' size=40 value='$r[nama_ortu]' required/>


	<tr><td><td colspan=4><input type=submit value=Ubah>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<th height=30>No
	<th><center>NISN
	<th><center>Nama Santri
	<th><center>No Peserta
	<th><center>Jenis Kelamin
	<th><center>Ujian
	<th><center>Nama Orangtua/Wali

	<th><center>Ubah
	<th><center>Hapus";
	$no=0;
	$tampil = mysql_query("SELECT * FROM santri");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		// $sld_kredit=number_format($r[sld_kredit]);
		// $cicilan=number_format($r[cicilan]);
		echo "<tr>
		<td><center>$no</center>
		<td><center>$r[nisn]
		<td><center>$r[nama_santri]
		<td><center>$r[no_peserta]
		<td><center>$r[jk]
		<td><center>$r[ujian]
		<td><center>$r[nama_ortu]

		<td><a href=?menu=santri&act=ubah&nisn=$r[nisn]><center><img src=../icons/report.gif border=0 height=15> 
		<td><a href=\"./master.php?menu=santri&act=batal&nisn=$r[nisn]\"onClick=\"return confirm('Apakah (&nbsp;&nbsp;$r[nama_santri]&nbsp;&nbsp;) Di Hapus?')\"><center><img src=../icons/delete.png border=0 height=15>
		";

	}
	echo "</table><br><br>";
	break;


}
?>
</table></table></div></div>