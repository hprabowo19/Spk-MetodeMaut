<?php
switch($_GET['act'])

{
	default:	
	$bobot=0;
	$tampil=mysql_query("SELECT * FROM santri");
	while($r=mysql_fetch_array($tampil))
	{
		$nisn=$r['nisn'];
		$tampil2=mysql_query("SELECT * FROM kriteria");
		while($r2=mysql_fetch_array($tampil2))
		{
			$kode_kriteria=$r2['kode_kriteria'];
			$cari=mysql_query("SELECT * FROM penilaian where kode_kriteria='$kode_kriteria' and nisn='$nisn' and nisn='$nisn'");
			$r3=mysql_fetch_array($cari);
			mysql_query("INSERT INTO penilaian(nisn,kode_kriteria,nilai)
				values('$nisn','$kode_kriteria','$bobot')");
		}
	}

	echo " <div id=kiri>
	<table width=100% STYLE=BORDER-COLLAPSE:COLLAPSE; border=0>
	<table class=table width=100%>

	<tr>
	<th width=5%><center>No	
	<th width=20%><center>NISN</th>
	<th witdh=30%><center>Nama Santri
	<th witdh=30%><center>No Peserta
	<th witdh=5%><center>Isi Nilai
	";

	$no=0;
	$tampil2=mysql_query("SELECT * FROM santri");
	while($r2=mysql_fetch_array($tampil2))
	{
		$no=$no+1;
		echo "<tr class='td' bgcolor='#FFF'><td>$no
		<td><center>$r2[nisn]
		<td><center>$r2[nama_santri]
		<td><center>$r2[no_peserta]

		<td><center><a href=?menu=nilai&act=isi&nisn=$r2[nisn]><img src=../icons/report.gif border=0 height=15></a>
		";		
	}
	$tampil=mysql_query("SELECT * FROM santri where nisn like '$_GET[nisn]'");
	$r=mysql_fetch_array($tampil);

	echo "</table>
	</div> <div id=kanan>
	<td><center>&nbsp;<b><font size=4>Update Nilai Santri</font>

	<p><br>Santri Yang Dinilai :$r[nama_santri]</b>
	<table width=100% STYLE=BORDER-COLLAPSE:COLLAPSE; border=0>
	<table class=table width=100%>

	<tr>
	<th witdh=20%><center>Nama Kriteria
	<th witdh=40%><center>Nilai
	";

	$no=0;
	$tampil = mysql_query("SELECT * FROM penilaian join kriteria 
		on penilaian.kode_kriteria=kriteria.kode_kriteria
		where nisn='$_GET[nisn]' order by id_nilai");
	while($r=mysql_fetch_array($tampil))
	{
		$brs=$brs+1;
		$kode_kriteria=$r['kode_kriteria'];
		$kode_bobot=$r['kode_bobot'];

		echo "</form><form action=master.php?menu=nilai&act=isi method=POST>
		<input type=hidden name=id_nilai value=$r[id_nilai]>
		<input type=hidden name=nisn value=$_GET[nisn]>
		</tr>
		<tr class='td' bgcolor='#FFF'>
		<td width=75%><center>$brs.$r[nama_kriteria]

		<form method=GET action=$_SERVER[PHP_SELF]>
		<td><select name='kode_bobot' onChange='this.form.submit()'>
		<option value=>-</option>";

		$tampil22=mysql_query("SELECT * FROM bobot_nilai where kode_kriteria='$kode_kriteria'");
		while($r22=mysql_fetch_array($tampil22))
		{
			if ($r22[kode_bobot]==$r[kode_bobot])
			{
				echo "<option value=$r22[kode_bobot] selected>$r22[nama_bobot]";
			}
		else
		{
			echo "<option value=$r22[kode_bobot]>$r22[nama_bobot]";
		}
	}
	echo "</select>";
}
echo "</table>
</div><br><br><br><br>";
break;
}
?>
</table></div></div> 