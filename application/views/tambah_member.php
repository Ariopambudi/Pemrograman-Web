<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/kustom.css'; ?>">
		<link href="<?php echo base_url(). 'assets/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
</head>
<body>
	<br><br><br>
<?php echo form_open("member/tambah", array('enctype'=>'multipart/form-data')); ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	 <div class="form-group">
	 	<?php echo validation_errors(); ?>
	 		 	<label for="kategori">Username</label>
	 	<input type="username" id="kategori" name="username" class="form-control" placeholder="Masukkan username">
	 	<label for="deskripsi">Password</label>
	 	<input type="password" id="kategori" name="password" class="form-control" placeholder="Masukkan">

	 </div>
	 <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
	 </form></div>

 
<?php echo form_close(); ?>
</body>
</html>
