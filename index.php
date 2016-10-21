<?php
	include "db/koneksi.php";
	
	$success = flash("success");
	$error = flash("Error");
	cekLogin();
	// Membuat query SQL mengambil data siswa
	$sql = "SELECT * FROM t_siswa
			INNER JOIN t_kelas ON t_siswa.id_kelas = t_kelas.id_kelas ORDER BY nis";
	
	// Lakukan query, hasil query masukan kedalam variabel $data
	$data = $mysql->query($sql) or die($mysql->error);
	
	// Tampilkan views dengan nama v_index.php dari folder views
	include "views/v_index.php";
?>