<?php
  session_start();
  session_destroy();
  echo "<script>window.alert('Success Exit From System');
				window.location='index.php'</script>";
	die();
?>