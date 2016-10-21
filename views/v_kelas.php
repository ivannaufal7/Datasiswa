<!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Siswa</title>
	<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
	
	<!---Toastr Plugins-->
	<link href="<?php echo base_url()?>/media/plugins/toastr/toastr.min.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url()?>/media/plugins/toastr/toastr.min.js"></script>
 </head>
 <body>
 <nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">SMK Negeri 4 Bandung</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="datakelas.php">Data Kelas</a></li>
				<li><a href="index.php">Data Siswa</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
 <div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center">Ini adalah halaman utama data kelas</h1>
			<?php
				if(!empty($success)){
					?>
				<div class="col-lg-12">
					<div class="alert alert-success"><?php echo $success?></div>
			<?php
			}
			?>
			<?php
				if(!empty($error)){?>
				<div class="col-lg-12">
					<div class="alert alert-danger"><?php echo $error?></div>
			<?php
			}
			?>
			<?php 
				$level = $_SESSION['level'];
				if($level != 0){
				?>
			<div class="row">
				<div class="col-lg-12">
					<a href="tambahkelas.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
					<a href="logout.php" class="btn btn-danger pull-right"> Logout</a>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
				<tr>
					<td>Nama Kelas</td>
					<td>Jurusan</td>
					<td>Action</td>
				</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_object($data)){?>
						<tr>
							<td><?php echo $row->nama_kelas?></td>
							<td><?php echo $row->jurusan?></td>
							<td><a href="editkelas.php?id_kelas=<?php echo $row->id_kelas?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="deletekelas.php?id_kelas=<?php echo $row->id_kelas?>" class="btn btn-danger btnDelete"><i class="glyphicon glyphicon-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php
				}else if($level == 0){
			?>
				<div class="row">
				<div class="col-lg-12">
					<a href="logout.php" class="btn btn-danger pull-right"> Logout</a>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
				<tr>
					<td>Nama Kelas</td>
					<td>Jurusan</td>
				</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_object($data)){?>
						<tr>
							<td><?php echo $row->nama_kelas?></td>
							<td><?php echo $row->jurusan?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php
				}
			?>
			</div>
		</div>
		<div class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"></h4>
				</div>
				
				<div class="modal-body">
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btnYa">Ya</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function(){
			$(".btnDelete").on("click", function(e){
				e.preventDefault();
				var nama = $(this).parent().parent().children()[1];
				var id_kelas = $(this).parent().parent().children()[0];
				var tr = $(this).parent().parent();
				nama = $(nama).html();
				id_kelas = $(id_kelas).html();
				
				$(".modal").modal('show');
				$(".modal-title").html('Konfirmasi');
				$(".modal-body").html('Anda yakin ingin menghapus data : <br>ID Kelas : <b>'+ id_kelas +'</b><br> Nama Kelas: <b>'+nama+'</b>');
				
				var href = $(this).attr('href');
				$('.btnYa').off();
				$('.btnYa').on('click', function(e){
					$.ajax({
						'url'  : href,
						'type' : 'POST',
						'success' : function(result){
							if(result == 1){
								$(".modal").modal('hide');
								tr.fadeOut();
								
								toastr.success('Data Berhasil Dihapus', 'Informasi');
							}else if(result == 0){
								$(".modal").modal('hide');
								toastr.error('Data Gagal Dihapus', 'ERROR !');
							}
						}
					});
					
				});
			});			
		});
	</script>
 </body>
 </html>