<?php 
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
		echo "Silahkan Login Dahulu";
}
else{
	include "../../config/connection.php";
	include "../../config/library.php";

	$module = $_GET['module'];
	$act	= $_GET['act'];

	if ($module=='kelas' AND $act=='input') {
		
	}
}