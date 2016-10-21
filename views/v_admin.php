<!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Admin</title>
	<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
	
	<!---Toastr Plugins-->
	<link href="<?php echo base_url()?>/media/plugins/toastr/toastr.min.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url()?>/media/plugins/toastr/toastr.min.js"></script>
 </head>
 <body>
 <div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center">Ini adalah halaman utama data admin</h1>
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
			<div class="row">
				<div class="col-lg-12">
					<a href="tambah.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
					<a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> Lihat Data Siswa</a>
					<a href="logout.php" class="btn btn-danger pull-right"> Logout</a>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
				<tr>
					<td></td>
					<td>Id Login</td>
					<td>Username</td>
					<td>Password</td>
					<td>Level</td>
					<td>Action</td>
				</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_object($data)){?>
						<tr>
							<td></td>
							<td><?php echo $row->id_login?></td>
							<td><?php echo $row->username?></td>
							<td><?php echo $row->password?></td>
							<td><?php echo $row->level?></td>
							<td><a href="edit.php?id_login=<?php echo $row->id_login?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="delete.php?id_login=<?php echo $row->id_login?>" class="btn btn-danger btnDelete"><i class="glyphicon glyphicon-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
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
				var username = $(this).parent().parent().children()[2];
				var id_login = $(this).parent().parent().children()[1];
				var tr = $(this).parent().parent();
				username = $(username).html();
				id_login = $(id_login).html();
				
				$(".modal").modal('show');
				$(".modal-title").html('Konfirmasi');
				$(".modal-body").html('Anda yakin ingin menghapus data : <br>ID Login : <b>'+ id_login +'</b><br> Username : <b>'+username+'</b>');
				
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