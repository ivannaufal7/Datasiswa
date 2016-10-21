<?php 
	include 'db/koneksi.php';

	$id_kelas = $_GET['id_kelas'];
	if(!empty($id_kelas)){
		$sql = "SELECT * FROM t_kelas WHERE id_kelas = '$id_kelas'";
		$query = $mysql->query($sql);
		$result = mysqli_fetch_object($query); 

	}

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id_kelas = $_POST['id_kelas'];
		$nama_kelas = $_POST['nama_kelas'];
		$jurusan = $_POST['jurusan'];

		$sql = "UPDATE t_kelas SET nama_kelas= '$nama_kelas' WHERE id_kelas = '$id_kelas'";

		if ($mysql -> query($sql)){
			$success = "Data berhasil diubah";
		}else{
			$error = "Error. " . $mysql->error;
		}
		header('location:datakelas.php');
	}

	$form = "edit";
	$url  = "editkelas.php";

	include 'views/v_form_kelas.php';
 ?>