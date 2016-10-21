<?php
	include "db/koneksi.php";
	
	$nis = $_GET['nis'];
	if(!empty($nis)){
		$sql = "DELETE FROM t_siswa where nis = '$nis'";
		if($mysql->query($sql)){
			//$success = "Data Berhasil diubah";
			flash('success',"Data Berhasil dihapus");
		}else{
			//$error = "Error".$mysql->error;
			flash('error',"Error: ".$mysql->error);
		}
		
		header("Location: index.php");
	}else{
	header("Location: index.php");
	}