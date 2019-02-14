<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "Silahkan Login Dahulu";
}
else{
	include "../../config/connection.php";
	include "../../config/library.php";

	$module = $_GET['module'];
	$act	= $_GET['act'];

	if ($module=='tahunakademik' AND $act=='input') {
		$simpan = "INSERT rb_tahun_akademik SET  id_tahun_akademik = '$_POST[id_tahun_akademik]', 
												 nama_tahun		   = '$_POST[nama_tahun]',
												 keterangan		   = '$_POST[keterangan]',
												 aktif			   = '$_POST[status]'";
		mysqli_query($conn, $simpan);
		header("location:../../media.php?module=".$module);
	}
	elseif($module=='tahunakademik' AND $act=='update'){
		$update = "UPDATE rb_tahun_akademik SET  id_tahun_akademik = '$_POST[id_tahun_akademik]',
												 nama_tahun		   = '$_POST[nama_tahun]',
												 keterangan		   = '$_POST[keterangan]',
												 aktif			   = '$_POST[status]'
									WHERE 	id_tahun_akademik = '$_POST[id]'";
		mysqli_query($conn, $update);
		header("location:../../media.php?module=".$module);

	}
}