<?php
if (ereg("rupiah.php", $PHP_SELF))
{
header("location:index.php");
die;
}
function rupiah($rp)
{
$rupiah ="";
$p = strlen ($rp);
while($p > 3)
{
$rupiah = ".".substr($rp,-3).$rupiah;
$A = strlen($rp) - 3;
$rp = substr($rp,0,$A);
$p = strlen($rp);
}

$rupiah="".$rp.$rupiah;
return $rupiah;
}

function rupiah1($rp)
{
$rupiah1 ="";
$p = strlen ($rp);
while($p > 3)
{
$rupiah1 = ".".substr($rp).$rupiah;
$A = strlen($rp) ;
$rp = substr($rp,0,$A);
$p = strlen($rp);
}

$rupiah1="".$rp.$rupiah1;
return $rupiah1;
}
?>