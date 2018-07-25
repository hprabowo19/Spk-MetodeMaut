<?php
//MENENTUKAN NILAI MAXSIMUM
$min=0;
$kosong=0;
mysql_query("UPDATE penilaian set min='$kosong',
max='$kosong',
bobot='$kosong',
bobot1='$kosong1',
nilai1='$kosong'");
mysql_query("DELETE FROM hasil_maut");
$kriteria=mysql_query("SELECT * FROM kriteria");
while($r=mysql_fetch_array($kriteria))
{
$kode_kriteria=$r[kode_kriteria];
$cari=
mysql_query("SELECT * FROM penilaian where kode_kriteria='$kode_kriteria' order by nilai desc");
$r1=mysql_fetch_array($cari);
$id_nilai=$r1[id_nilai];
$max=1;
$nilai=$r1[nilai]; 
mysql_query("UPDATE penilaian set nilai1='$max' where nilai='$nilai' and kode_kriteria='$kode_kriteria'");	
mysql_query("UPDATE penilaian set max='$nilai' where kode_kriteria='$kode_kriteria'");
}
$kriteria=mysql_query("SELECT * FROM kriteria");
while($r=mysql_fetch_array($kriteria))
{	
$kode_kriteria=$r[kode_kriteria];
$cari=mysql_query("SELECT * FROM penilaian where kode_kriteria='$kode_kriteria' order by nilai asc");
$r1=mysql_fetch_array($cari);
$id_nilai=$r1[id_nilai];
$nilai=$r1[nilai];
$cari2=
mysql_query("SELECT * FROM penilaian where kode_kriteria='$kode_kriteria' and nilai='$nilai'");
while($r3=mysql_fetch_array($cari2))
{
$id_nilai=$r3[id_nilai];
$min=2;
$tanda=1;
$nilai=$r3[nilai];
mysql_query("update penilaian set nilai1='$min' where nilai='$nilai' and kode_kriteria='$kode_kriteria'");
mysql_query("update penilaian set min='$nilai' where kode_kriteria='$kode_kriteria'");
}
}


//MENGHITUNG NILAI
$kriteria=mysql_query("SELECT * FROM kriteria");
while($r=mysql_fetch_array($kriteria))
{
$kode_kriteria=$r[kode_kriteria];
$cari=mysql_query("SELECT * FROM penilaian where kode_kriteria='$kode_kriteria' order by kode_kriteria asc");
while($r1=mysql_fetch_array($cari))
{
if ($r1[nilai1]==0)
{
$nilai2=($r1[nilai]-$r1[min])/($r1[max]-$r1[min]);
$id_nilai=$r1[id_nilai];
mysql_query("update penilaian set nilai1='$nilai2' where id_nilai='$id_nilai'");
}
}
}


//NILAI BURUK UPDATE JADI=0;
$cari=mysql_query("SELECT * FROM penilaian where nilai1=2");
while($r1=mysql_fetch_array($cari))
{
if ($r1[nilai1]==2)
{
$id_nilai=$r1[id_nilai];
$nilai2=0;
mysql_query("update penilaian set nilai1='$nilai2' where id_nilai='$id_nilai'");
}
}


//Menghitung Utility Dengan Fungsi Additive Utility
$tampil=mysql_query("SELECT * FROM santri order by nama_santri");
while($r=mysql_fetch_array($tampil))
{
$nisn=$r[nisn];
$nisn1=$r[nisn];
$total=0;
$cari=mysql_query("SELECT * FROM penilaian where nisn='$nisn' order by kode_kriteria asc");
while($r2=mysql_fetch_array($cari))
{
$kode_kriteria=$r2[kode_kriteria];
$kriteria=mysql_query("SELECT * FROM kriteria where kode_kriteria='$kode_kriteria'");
$r3=mysql_fetch_array($kriteria);
$bobot1=$r3[bobot];
$kd_materi=$r3[kd_materi];
$bobot=$r3[bobot];
$total=($bobot1*$r2[nilai1])+$total;
$nisn1="";
}
$total1=$total*$bobot;
mysql_query("update santri set score='$total1' where nisn='$nisn'");
}
echo "<center><b>DAFTAR HASIL PENILAIAN</b> 
<table border='0' width='90%' cellpadding='0' cellspacing='0'>
<table class='table' width='90%'>
<tr class='th'>
<tr> ";
echo"</table><table border='0' width='90%' cellpadding='0' cellspacing='0'>
<table class='table' width='90%'>
<tr class='th'>
<th width='3%'>NO</th>
<th width='20%'>Nama Santri</th>
";
$tampil1=mysql_query("SELECT * FROM kriteria order by kode_kriteria");
while($r1=mysql_fetch_array($tampil1))
{
$kode_kriteria=$r1[kode_kriteria];
echo "<th><b><center>$r1[nama_kriteria]";
$jum_materi=$jum_materi+1;
}
echo "<td><center>Jum.Nilai";
$no=0;
$tampil=mysql_query("SELECT * FROM penilaian join santri on	penilaian.nisn=santri.nisn group by penilaian.nisn order by santri.nama_santri");
while($r=mysql_fetch_array($tampil))
{
$no=$no+1;
$nisn=$r[nisn];
echo "<tr class='td' bgcolor='#FFF'>
<td>$no
<td><center>$r[nama_santri]";
$jum_nilai=0;
$tampil2=mysql_query("SELECT * FROM penilaian join kriteria on penilaian.kode_kriteria=kriteria.kode_kriteria where nisn='$nisn'  order by kriteria.kode_kriteria");
while($r2=mysql_fetch_array($tampil2))
{
$kode_kriteria=$r2[kode_kriteria];
$nisn1=$r2[nisn];
$jum_nilai=$jum_nilai+$r2[nilai];
echo "<td><center>$r2[nilai]";
}
$nil_rata=$jum_nilai/$jum_materi;
$rnilai=number_format($nil_rata,2, '.', '');
echo "<td><center>$rnilai";
}
echo "<tr class='td' bgcolor='#FFF'><td bgcolor=#CCCCCC><td bgcolor=#CCCCCC><center>Bobot";
$tampil=mysql_query("SELECT * FROM kriteria order by kode_kriteria");
while($r=mysql_fetch_array($tampil))
{
echo "<td bgcolor=#CCCCCC><center>$r[bobot] %";
}
echo "<td bgcolor=#CCCCCC>";


//PENCARIAN 
echo "</table><br><br><center><b></b> 
<table border='0' width='90%' cellpadding='0' cellspacing='0'>
<table class='table' width='90%'>
<tr class='th'>
<tr> ";
echo"</table><table border='0' width='90%' cellpadding='0' cellspacing='0'>
<table class='table' width='90%'>
<tr class='th'>
<th width='3%'>NO</th>
<th width='20%'>Nama Santri</th>
";
$tampil1=mysql_query("SELECT * FROM kriteria order by kode_kriteria");
while($r1=mysql_fetch_array($tampil1))
{
$kode_kriteria=$r1[kode_kriteria];
echo "<th><b><center>$r1[nama_kriteria]  ";
$jum_materi=$jum_materi+1;
}
$no=0;
$tampil=mysql_query("SELECT * FROM penilaian join santri on	penilaian.nisn=santri.nisn group by penilaian.nisn order by santri.nama_santri");
while($r=mysql_fetch_array($tampil))
{
$no=$no+1;
$nisn=$r[nisn];
$kd_materi=$r[kd_materi];
echo "<tr class='td' bgcolor='#FFF'>
<td>$no
<td><center>$r[nama_santri]";
$jum_nilai=0;
$tampil2=mysql_query("SELECT * FROM penilaian join kriteria on penilaian.kode_kriteria=kriteria.kode_kriteria where nisn='$nisn'  order by kriteria.kode_kriteria");
while($r2=mysql_fetch_array($tampil2))
{
$kd_materi=$r2[kd_materi];
$id_nilai=$r2[id_nilai];
$bobot1=$r2[bobot];
$bobot=1;
$kode_kriteria=$r2[kode_kriteria];
$nisn1=$r2[nisn];
$jum_nilai=$jum_nilai+$r2[nilai];
echo "<td><center> $r2[nilai1]";
}
}


//PERKALIAN
echo "</table><br><br><center><b></b> 
<table border='0' width='90%' cellpadding='0' cellspacing='0'>
<table class='table' width='90%'>
<tr class='th'>
<tr> ";
echo"</table><table border='0' width='90%' cellpadding='0' cellspacing='0'>
<table class='table' width='90%'>
<tr class='th'>
<th width='3%'>NO</th>
<th width='20%'>Nama Santri</th>
";
$tampil1=mysql_query("SELECT * FROM kriteria order by kode_kriteria");
while($r1=mysql_fetch_array($tampil1))
{
$kode_kriteria=$r1[kode_kriteria];
echo "<th><b><center>$r1[nama_kriteria]  ";
}
echo "<td><center>Nilai";
$no=0;
$tampil=mysql_query("SELECT * FROM penilaian join santri on	penilaian.nisn=santri.nisn group by penilaian.nisn order by santri.nama_santri");
while($r=mysql_fetch_array($tampil))
{
$no=$no+1;
$nisn=$r[nisn];
$kd_materi=$r[kd_materi];
echo "<tr class='td' bgcolor='#FFF'>
<td>$no
<td><center>$r[nama_santri]";
$jum_nilai=0;
$tot=0;
$tot1=0;
$tampil2=mysql_query("SELECT * FROM penilaian join kriteria on penilaian.kode_kriteria=kriteria.kode_kriteria where nisn='$nisn'  order by kriteria.kode_kriteria");
while($r2=mysql_fetch_array($tampil2))
{
$id_nilai=$r2[id_nilai];
$bobot1=$r2[bobot];
$bobot=$r2[bobot];
$kode_kriteria=$r2[kode_kriteria];
$nisn1=$r2[nisn];
$jum_nilai=$jum_nilai+$r2[nilai];
$tot=$r2[nilai1]*$bobot;
$tot1=$tot1+$tot;
echo "<td><center> $r2[nilai1] x $bobot";
}
echo "<td><center> $tot1";
mysql_query("insert into hasil_maut(nisn,nilai) values('$nisn','$tot1')");
}
echo "</table><br><center><b>HASIL PERANGKINGAN</b> 
<table border='0' width='70%' cellpadding='0' cellspacing='0'>
<table class='table' width='70%'>
<tr class='th'>
<th width='3%'>NO</th>
<th width='15%'>NISN</th>
<th width='30%'>Nama Santri</th>
<th width='15%'>No Peserta</th>
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
<td><center>$r[nisn]
<td><center>$r[nama_santri]
<td><center>$r[no_peserta]
<td><center>$r[nilai]";
}
?>
</table> </table></div></div>