<?php
session_start();
include "config/koneksi.php";
include "config/library.php";

$ip=$_SERVER['REMOTE_ADDR'];
$id_user=$_SESSION[id_user];
$menu=$_GET[menu];
$act=$_GET[act];

// INPUT DATA USERS
if ($menu=='user' AND $act=='input')
{
  $cari = mysql_query("SELECT * FROM users WHERE username='$_POST[username]'");
  $r    = mysql_fetch_array($cari);
if (!empty($r[nisn]))
  {
  $menu="user&proses=tolak";
  header('location:index.php?menu='.$menu);
  }
else
  {
  mysql_query("INSERT INTO user(username,nama_santri,password) 
    VALUES('$_POST[username]',
   '$_POST[nama_santri]','$_POST[password]')");
  header('location:index.php?menu='.$menu);
  }
}
// UPDATE DATA USERS
elseif ($menu=='user' AND $act=='ubah')
  {
  mysql_query("UPDATE user  SET 
    username ='$_POST[username]',
    nama ='$_POST[nama]',
    password	='$_POST[password]' 
    WHERE username ='$_POST[username]'");
  header('location:index.php?menu='.$menu);
  }
// HAPUS USERS
elseif ($menu=='user' AND $act=='batal')
  {
  mysql_query("DELETE FROM user WHERE user_logi='$_GET[username]'");
  header('location:index.php?menu='.$menu);
  }



//INPUT  SANTRI
else if ($menu=='santri' AND $act=='input')
{
  $cari = mysql_query("SELECT * FROM santri WHERE nisn='$_POST[nisn]'");
  $r    = mysql_fetch_array($cari);
if (!empty($r[nisn]))
  {
  $menu="santri&act=isi&proses=tolak";
  header('location:index.php?menu='.$menu);
  }
else
  { 
  mysql_query("INSERT INTO santri(nisn,nama_santri,no_peserta,jk,ujian,nama_ortu) 
    VALUES('$_POST[nisn]','$_POST[nama_santri]','$_POST[no_peserta]','$_POST[jk]','$_POST[ujian]',
    '$_POST[nama_ortu]')");  
  header('location:index.php?menu='.$menu);
  }
}
// UPDATE SANTRI
elseif ($menu=='santri' AND $act=='ubah')
  {
  mysql_query("UPDATE santri SET nama_santri ='$_POST[nama_santri]',
    no_peserta ='$_POST[no_peserta]',
    jk ='$_POST[jk]',
    ujian ='$_POST[ujian]',
    nama_ortu ='$_POST[nama_ortu]'
    WHERE nisn  ='$_POST[nisn]'");
  header('location:index.php?menu='.$menu);
  }
// HAPUS SANTRI
elseif ($menu=='santri' AND $act=='batal')
  {
  mysql_query("DELETE FROM santri WHERE nisn like '$_GET[nisn]'");
  header('location:index.php?menu='.$menu);
  }



//INPUT KRITERIA
else if ($menu=='kriteria' AND $act=='input')
{
  $cari = mysql_query("SELECT * FROM kriteria WHERE kode_kriteria='$_POST[kode_kriteria]'");
  $r    = mysql_fetch_array($cari);
if (!empty($r[kode_kriteria]))
  {
  $menu="kriteria&act=isi&proses=tolak";
  header('location:index.php?menu='.$menu);
  }
else
  { 
  mysql_query("INSERT INTO kriteria(kode_kriteria,nama_kriteria,bobot) 
    VALUES('$_POST[kode_kriteria]','$_POST[nama_kriteria]','$_POST[bobot]')");
  $menu="kriteria&act=isi";  
  header('location:index.php?menu='.$menu);
  }
}
// UPDATE KRITERIA
elseif ($menu=='kriteria' AND $act=='ubah')
  {
  mysql_query("UPDATE kriteria SET nama_kriteria='$_POST[nama_kriteria]',
    bobot  ='$_POST[bobot]'
    WHERE kode_kriteria='$_POST[kode_kriteria]'");
  $menu="kriteria&act=isi";
  header('location:index.php?menu='.$menu);
  }
// HAPUS KRITERIA
elseif ($menu=='kriteria' AND $act=='batal')
  {
  mysql_query("DELETE FROM kriteria WHERE kode_kriteria='$_GET[kode_kriteria]'");
  $menu="kriteria&act=isi";
  header('location:index.php?menu='.$menu);
  }


  
//INPUT BOBOT NILAI
else if ($menu=='bobot_nilai' AND $act=='input')
  {
  mysql_query("INSERT INTO bobot_nilai(nama_bobot,nilai_bobot,kode_kriteria) 
    VALUES('$_POST[nama_bobot]','$_POST[nilai_bobot]','$_POST[kode_kriteria]')");
  $menu="bobot_nilai&act=isi1&kode_kriteria=$_POST[kode_kriteria]";
  header('location:index.php?menu='.$menu);
  }
 // UPDATE BOBOT NILAI
elseif ($menu=='bobot_nilai' AND $act=='ubah')
  {
  mysql_query("UPDATE bobot_nilai SET nilai_bobot='$_POST[nilai_bobot]',
    nama_bobot='$_POST[nama_bobot]'
    WHERE kode_bobot='$_POST[kode_bobot]'");
  $menu="bobot_nilai&act=isi1&kode_kriteria=$_POST[kode_kriteria]";
  header('location:index.php?menu='.$menu);
  }
 // HAPUS BOBOT NILAI
elseif ($menu=='bobot_nilai' AND $act=='batal')
  {
  mysql_query("DELETE FROM bobot_nilai WHERE kode_bobot='$_GET[kode_bobot]'");
  $menu="bobot_nilai&act=isi1&kode_kriteria=$_GET[kode_kriteria]";
  header('location:index.php?menu='.$menu);
  }



// UPDATE NILAI KRITERIA
elseif ($menu=='nilai' AND $act=='isi')
  {
  $edit = mysql_query("SELECT * FROM bobot_nilai WHERE kode_bobot='$_POST[kode_bobot]'");
  $r    = mysql_fetch_array($edit);
  $nilai=$r[nilai_bobot];
  mysql_query("UPDATE penilaian SET  kode_bobot='$_POST[kode_bobot]',
    nilai ='$nilai'
    WHERE id_nilai='$_POST[id_nilai]'");
  $menu="nilai&act=isi&nisn=$_POST[nisn]";
  header('location:index.php?menu='.$menu);
  }

// UPDATE DATA SANTRI
// elseif ($menu=='datasantri' AND $act=='ubah')
//   {
//   mysql_query("UPDATE santri SET biaya ='$_POST[biaya]',
//   hasil ='$_POST[hasil]',
//   bayar ='$_POST[bayar]',
//   nilai_akhir ='$_POST[nilai_akhir]'
//   WHERE nisn  ='$_POST[nisn]'");
//   header('location:index.php?menu='.$menu);
//   }

elseif ($menu=='datasantri' AND $act=='ubah')
  {
  
  $biaya=$_POST[biaya] ;
  $hasil=$_POST[hasil] ;
  $bayar=$_POST[bayar] ;
  $nilai_akhir=$_POST[nilai_akhir] ;

  if ($hasil == 'Lebih dari 5juta' )
  {
  $has = '30' ;
  }
  else if ($hasil == '2juta sampai 5juta' )
  {
  $has = '20' ;
  }
  else if ($hasil == 'Kurang dari 2juta' )
  {
  $has = '10' ;
  }

   if ($bayar == 'Lunas' )
  {
  $bay = '30' ;
  }
  else if ($bayar == '50% dari total' )
  {
  $bay = '20' ;
  }
  else if ($bayar == '25% dari total' )
  {
  $bay = '10' ;
  }

  $nilai=(($has+$bay+$nilai_akhir)*60)/100;

  if ($nilai >= 70 )
  {
  $ck = 'LULUS' ;
  }
  else if ($nilai >= 50 )
  {
  $ck = 'DI TANGGUHKAN' ;
  }
  else
  {
  $ck = 'TIDAK LULUS' ;
  }

  mysql_query("UPDATE santri SET biaya='$_POST[biaya]', hasil='$_POST[hasil]', bayar='$_POST[bayar]', nilai_akhir='$_POST[nilai_akhir]', status='$ck' WHERE nisn='$_POST[nisn]'");
  header('location:index.php?menu='.$menu);
  }
 
  // HAPUS DATA SANTRI
elseif ($menu=='datasantri' AND $act=='batal')
  {
  mysql_query("DELETE FROM santri WHERE nisn like '$_GET[nisn]'");
  header('location:index.php?menu='.$menu);
  }


// UPDATE HASIL SANTRI
elseif ($menu=='hasil' AND $act=='ubah')
  {
  mysql_query("UPDATE santri SET biaya ='$_POST[biaya]',
    hasil ='$_POST[hasil]',
    bayar ='$_POST[bayar]',
    nilai_akhir ='$_POST[nilai_akhir]',
    status ='$_POST[status]'
    WHERE nisn  ='$_POST[nisn]'");
  header('location:index.php?menu='.$menu);
  }
?>
