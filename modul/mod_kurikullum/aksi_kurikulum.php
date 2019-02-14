<?php 
session_start(); 
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "Silahkan Login Dahulu";
}
else{
	include "../../config/connection.php";
	include "../../config/library.php";

	$module = $_GET['module']; 
	$act 	= $_GET['act'];

	if ($module=='kurikulum' AND $act=='input') {
		$save = "INSERT rb_kurikulum SET nama_kurikulum  	='$_POST[nama_kurikulum]', 
										 status_kurikulum	='$_POST[status]'";
		mysqli_query($conn,$save);
		if ($save) {
			echo "<script>document.location='../../media.php?module=kurikulum';</script>";
		}
		else{
			echo "Gagal";
		}
		
	}
	elseif ($module=='kurikulum' AND $act=='update') {
		$edit	= "UPDATE rb_kurikulum SET nama_kurikulum  	='$_POST[nama_kurikulum]', 
										 status_kurikulum	='$_POST[status]'
							WHERE kode_kurikulum ='$_POST[id]'";
		mysqli_query($conn,$edit);
		header("location:../../media.php?module=".$module);
	}

}