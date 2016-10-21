<!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Siswa</title>
	<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center">Ini adalah halaman utama data siswa</h1>
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
				</div>
			<div class="row">
				<div class="col-lg-3">
					<a href="datakelas.php" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
				</div>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo $url?>">
				<div class="form-group">
						<input type="hidden" name="id_kelas" class="form-control" value="<?php echo @$result->id_kelas?>"/>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Kelas</label>
					<div class="col-sm-5">
						<input type="text" name="nama_kelas" class="form-control" value="<?php echo @$result->nama_kelas?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Jurusan</label>
					<div class="col-sm-5">
						<input type="text" name="jurusan" class="form-control" value="<?php echo @$result->jurusan?>"/>
					</div>
				</div>
				<div class="col-sm-3" style="margin-left: 16%;">
				<?php 
				if($form == "add"){
				?>
					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				<?php 
				}else{
					?>
					<button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Ubah</button>
				<?php
				}
				?>
				</div>
				</div>
			</form>
			</div>
		</div>
 </body>
 </html>