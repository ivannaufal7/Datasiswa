<?php
	include "db/koneksi.php";
	
	$sql = "SELECT * FROM t_login";
	$data = $mysql->query($sql);
	
	include "views/v_admin.php";
?>