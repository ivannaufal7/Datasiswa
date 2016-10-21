<?php
	include "db/koneksi.php";
	
	@$id = $_GET['id_kelas'];
	if(!empty($id)){
		$sql = "DELETE FROM t_kelas where id_kelas = '$id'";
		if($mysql->query($sql)){
			//$success = "Data Berhasil diubah";
			echo 1;
		}else{
			//$error = "Error".$mysql->error;
			echo 0;
		}
		
		//header("Location: index.php");
	}