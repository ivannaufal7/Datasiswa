<?php
	include "db/koneksi.php";
	$nis = $_GET['nis'];
	
	if(!empty($nis)){
		$sql = "SELECT * FROM t_siswa where nis='$nis'";
		$query = $mysql->query($sql);
		$result = mysqli_fetch_object($query);
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nis = $_POST['nis'];
		$nm = $_POST['nm'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$notel = $_POST['notel'];
		$kelas = $_POST['id_kelas'];
		$foto = $_FILES['photo'];
		$file = $_POST['photo'];
		
		if(!empty($foto) AND $foto['error'] == 0){
			$path = './media/images/';
			$upload = move_uploaded_file($foto['tmp_name'], $path.$foto['name']);
			if(!$upload){
				flash('error',"Upload File gagal");
				header('location: index.php');
			}
			$file = $foto['name'];
		}
		
		$sql = "UPDATE t_siswa SET nama_lengkap='$nm',
				jenis_kelamin = '$jk',
				alamat = '$alamat',
				no_telp = '$notel',
				id_kelas = '$kelas',
				file = '$file'
				where nis = '$nis'";
		$result = $mysql->query($sql);
		if($result){
			flash('success', 'Data Berhasil Diubah');
		}else{		
			flash('error', 'Error : '.$mysql->error);
		}
		
		header("location: index.php");
	}
	$sql = "select * from t_kelas ORDER BY nama_kelas";
	$datakelas = $mysql->query($sql) or die($mysql->error);
	
	$form = "edit";
	$url = "edit.php";
	include "views/v_form_siswa.php";
?>