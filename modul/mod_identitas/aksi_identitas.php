<?php 
session_start();
if (empty($_SESSION['username']) AND $_SESSION['passuser']) {
	echo 'Anda Harus login dahulu';
}
else{
	include "../../config/connection.php";

	// $module = $_GET['module'];

	if (isset($_POST['update'])) {
		$update = mysqli_query($conn,"UPDATE rb_identitas_sekolah SET nama_sekolah 	  = '$_POST[nama_sekolah]', 
			npsn 		 	= '$_POST[npsn]',
			nss 			= '$_POST[nss]',
			alamat_sekolah	= '$_POST[alamat_sekolah]',
			kode_pos		= '$_POST[kode_pos]',
			no_telpon		= '$_POST[no_telpon]',
			kecamatan		= '$_POST[kecamatan]',
			kelurahan		= '$_POST[kelurahan]',
			kabupaten_kota	= '$_POST[kabupaten_kota]', 
			provinsi		= '$_POST[provinsi]',
			website			= '$_POST[website]',
			email 			= '$_POST[email]'
			WHERE id_identitas_sekolah = '$_POST[id]'");
		echo "
		<script>
		 window.alert('Success'); 
		 document.location='../../media.php?module=identitas';
		</script>"; 
		
	}
}