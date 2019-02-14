<?php 
// date_timezone_set('Asia/Jakarta');
	$conn = mysqli_connect("localhost","root","","db_myproject");

	// $val = new Rizalvalidasi;

	function anti_injection($data){
		global $conn; 
		$filter = mysqli_real_escape_string($conn,stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}

	function average($arr){
		if (!is_array($arr)) return false;
		return array_sum($arr)/count($arr);
	}

		
	function cek_session_admin(){
		$level = $_SESSION[level];
		if ($level != 'superuser' AND $level != 'kepala'){
			echo "<script>document.location='media.php';</script>";
		}
	}

	function cek_session_guru(){
		$level = $_SESSION[level];
		if ($level != 'guru' AND $level != 'superuser' AND $level != 'kepala'){
			echo "<script>document.location='media.php';</script>";
		}
	}

	function cek_session_siswa(){
		$level = $_SESSION[level];
		if ($level == ''){
			echo "<script>document.location='media.php';</script>";
		}
	}
