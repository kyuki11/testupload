<?php
session_start();
include "config.php";
?>
<?php
$id_nilai    =$_POST['id_nilai'];
$id_siswa    =$_POST['id_siswa'];
$id_mapel    =$_POST['kd_mapel'];
$id_guru 	 =$_POST['id_guru'];
$semester    =$_POST['semester'];
$kb          =$_POST['kb']; 
$nh          =$_POST['nh'];
$nh2         =$_POST['nh2'];
$nh3         =$_POST['nh3'];
$nh4         =$_POST['nh4'];
$uts         =$_POST['uts'];
$uas         =$_POST['uas'];
$n_peng      =$_POST['n_peng'];
$predikat    =$_POST['predikat'];
$deskrip     =$_POST['deskrip'];
$np          =$_POST['np'];
$np2         =$_POST['np2'];
$np3         =$_POST['np3'];
$np4         =$_POST['np4'];
$n_trampil   =$_POST['nketram'];
$pred    	 =$_POST['pred'];
$deskripsi   =$_POST['deskripsi'];
$raport 	 =$_POST['n_raport'];

$simpan="INSERT INTO `nilai`(`id_nilai`, `id_siswa`, `kd_mapel`, `id_guru`, `semester`, `kb`, `nh`, `nh2`, `nh3`, `nh4`, `uts`, `uas`, `n_peng`, `predikat`, `deskrip`, `np`, `np2`, `np3`, `np4`, `nketram`, `pred`, `deskripsi`, `n_raport`) VALUES ('$id_nilai','$id_siswa','$id_mapel','$id_guru','$semester','$kb','$nh','$nh2','$nh3','$nh4','$uts','$uas','$n_peng','$predikat','$deskrip','$np','$np2','$np3','$np4','$n_trampil','$pred','$deskripsi','$raport')";
mysqli_query($GLOBALS["___mysqli_ston"], $simpan) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
header('location:bg_nilai.php');
?>