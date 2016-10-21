 <?php
	include "db/koneksi.php";
	sudahLogin();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM t_login WHERE username= '$username'
		AND password = SHA1('$password') AND level = '1'";
		
		$data = $mysql->query($sql) or die($mysql->error);
		if($data->num_rows != 0){
			$row = mysqli_fetch_object($data);
			$_SESSION['username'] = $row -> username;
			$_SESSION['level'] = $row -> level;
			header('location:index.php');
			
		}else{
			$error = "Username atau Password Salah";
		}
	}	
	include "views/v_login.php";
 ?>