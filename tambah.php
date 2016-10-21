 <?php
	include 'db/koneksi.php';
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nis = $_POST['nis'];
		$nm = $_POST['nm'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$notel = $_POST['notel'];
		$kelas = $_POST['id_kelas'];
		$foto = $_FILES['photo'];
		if(!empty($foto) AND $foto['error'] == 0){
			$path = './media/images/';
			$upload = move_uploaded_file($foto['tmp_name'], $path.$foto['name']);
			if(!$upload){
				flash('error',"Upload File gagal");
				header('location: index.php');
			}
			$file = $foto['name'];
		}
		
		$sql = "INSERT INTO t_siswa(nis, nama_lengkap, jenis_kelamin, alamat, no_telp, id_kelas, file) 
		values('$nis', '$nm', '$jk', '$alamat', '$notel', '$kelas', '$file')";
		
		if($mysql->query($sql)){
			$success = "Data Berhasil ditambahkan";
		}else{
			$error = "Error".$mysql->error;
		}
	}
	//Ambil data kelas
	$sql = "select * from t_kelas ORDER BY nama_kelas";
	$datakelas = $mysql->query($sql) or die($mysql->error);
	
	$form = "add";
	$url = "tambah.php";
	include 'views/v_form_siswa.php';
 ?>