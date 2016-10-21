<?php
	include "db/koneksi.php";
	cekLogin();
	// Membuat query SQL mengambil data siswa
	$sql = "SELECT * FROM t_kelas ORDER BY nama_kelas";
	
	// Lakukan query, hasil query masukan kedalam variabel $data
	$data = $mysql->query($sql) or die($mysql->error);
	
	include "views/v_kelas.php";
?>