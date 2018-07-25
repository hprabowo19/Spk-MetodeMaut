<?php
switch($_GET['act'])

{
	default:
	$edit = mysql_query("SELECT * FROM santri WHERE nisn like '$_GET[nisn]'");
	$r    = mysql_fetch_array($edit);

	echo "<br><center>	 
	<td><center>&nbsp;<B><font size=4>UBAH DATA SANTRI</font></B><p>
	</form><form action=./master.php?menu=datasantri&act=ubah method=POST enctype='multipart/form-data'>
	<input type=hidden name=nisn value=$r[nisn]>			
	<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>

	<tr><td>Nama Santri <td> 
	<input type=text name='nama_santri' size=40 value='$r[nama_santri]' readonly=true required/>

	<tr><td>Pembiayaan <td> 
	<select name=biaya>
	<option value=$r[biaya] selected>$r[biaya]
	<option value=Pilih Pembiayaan>Pilih Pembiayaan
	<option value=Orangtua>Orangtua
	<option value=Wali>Wali

	<tr><td>Penghasilan <td> 
	<select name=hasil>
	<option value=$r[hasil] selected>$r[hasil]
	<option value=Pilih Penghasilan>Pilih Penghasilan
	<option value=Lebih dari 5juta>Lebih dari 5juta
	<option value=2juta sampai 5juta>2juta sampai 5juta
	<option value=Kurang dari 2juta>Kurang dari 2juta

	<tr><td>Pembayaran <td> 
	<select name=bayar>
	<option value=$r[bayar] selected>$r[bayar]
	<option value=Pilih Pembayaran>Pilih Pembayaran
	<option value=Lunas>Lunas
	<option value=50% dari Total>50% dari Total
	<option value=25% dari Total>25% dari Total

	<tr><td>Nilai Akhir <td> 
	<input type=text name='nilai_akhir' size=10 value='$r[nilai_akhir]' required/>

	<tr><td><td colspan=4><input type=submit value=Ubah>
	<input type=button value=Batal onclick=self.history.back()></td></tr>

	<table width=80% STYLE=BORDER-COLLAPSE:COLLAPSE; border=1 bgcolor=#fff>
	<th height=30>No
	<th><center>Pembiayaan
	<th><center>Penghasilan
	<th><center>Pembayaran
	<th><center>Nilai Akhir

	<th><center>Ubah
	<th><center>Hapus";
	$no=0;
	$tampil = mysql_query("SELECT * FROM santri");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		echo "<tr>
		<td><center>$no</center>
		<td><center>$r[biaya]
		<td><center>$r[hasil]
		<td><center>$r[bayar]
		<td><center>$r[nilai_akhir]

		<td><a href=?menu=datasantri&act=ubah&nisn=$r[nisn]><center><img src=../icons/report.gif border=0 height=15> 
		<td><a href=\"./master.php?menu=datasantri&act=batal&nisn=$r[nisn]\"onClick=\"return confirm('Apakah (&nbsp;&nbsp;$r[nama_santri]&nbsp;&nbsp;) Di Hapus?')\"><center><img src=../icons/delete.png border=0 height=15>
		";

	}
	echo "</table><br><br>";
	break;
}
?>


<!-- <?php
	echo "</table><br><b>HASIL NILAI AKHIR</b> 
	<table border='0' width='40%' cellpadding='0' cellspacing='0'>
	<table class='table' width='40%'>

	<tr class='th'>
	<th width='3%'>NO</th>
	<th width='20%'>Nama Santri</th>
	<th width='15%'>Nilai Akhir</th>
	";

	$no=0;
	$tampil=mysql_query("SELECT * FROM hasil_maut join santri on hasil_maut.nisn=santri.nisn
		order by nilai desc");
	while($r=mysql_fetch_array($tampil))
	{
		$no=$no+1;
		$nisn=$r[nisn];
		$kd_materi=$r[kd_materi];
		$bobot=$r3[bobot];
		echo "<tr class='td' bgcolor='#FFF'>
		<td>$no
		<td><center>$r[nama_santri]
		<td><center>$r[nilai]";
	}
?> -->
</table></table></div></div>