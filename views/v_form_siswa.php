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
					<a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
				</div>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo $url?>" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-2 control-label">NIS</label>
					<div class="col-sm-5">
						<input type="text" name="nis" class="form-control" value="<?php echo @$result->nis?>" <?php echo $form == 'edit' ? 'readonly' : ''?>/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Lengkap</label>
					<div class="col-sm-5">
						<input type="text" name="nm" class="form-control" value="<?php echo @$result->nama_lengkap?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Jenis Kelamin</label>
					<div class="col-sm-5">
						<input type="radio" name="jk" value="laki-laki" <?php echo @$result->jenis_kelamin == "Laki-laki" ? "checked" : ''?>> Laki - Laki<br>
						<input type="radio" name="jk" value="perempuan" <?php echo @$result->jenis_kelamin == "Perempuan" ? "checked" : ''?>> Perempuan
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-5">
						<textarea class="form-control" rows="8" name="alamat" value="<?php echo @$result->alamat?>"><?php echo @$result->alamat?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">No. Telp</label>
					<div class="col-sm-5">
						<input type="text" name="notel" class="form-control" value="<?php echo @$result->no_telp?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Kelas</label>
					<div class="col-sm-5">
						<select name="id_kelas" class="form-control">
							<option value="">[ Pilih Kelas ]</option>
							<?php while($row = mysqli_fetch_object($datakelas)){?>
							<option value="<?php echo $row->id_kelas?>" <?php echo @$result->id_kelas == $row->id_kelas ? 'selected' : ''?> >
								<?php echo $row->nama_kelas?>
							</option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-5">
						<?php
							if($form == "edit"){
						?>
						<img src="<?php echo base_url();?>/media/images/<?php echo $result->file?>" width="200px" height="200px"/>
						<input type="hidden" name="photo" value="<?php echo @$result->file?>"/>
						<?php
							}
						?>
						<input type="file" name="photo"/>
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