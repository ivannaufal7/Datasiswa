 <?php
	include 'db/koneksi.php';
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nm = $_POST['nama_kelas'];
		$jurusan = $_POST['jurusan'];
		
		$sql = "INSERT INTO t_kelas(nama_kelas,jurusan) values('$nm', '$jurusan')";
		
		if($mysql->query($sql)){
			$success = "Data Berhasil ditambahkan";
		}else{
			$error = "Error".$mysql->error;
		}
	}
	
	$form = "add";
	$url = "tambahkelas.php";
	include 'views/v_form_kelas.php';
 ?>