<!doctype html>
<html>
    <head>
        <title>yuniza pertemuan10</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px"> <?php echo $button ?>Update Data mahasiswa</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Npm <?php echo form_error('npm') ?></label>
            <input type="text" class="form-control" name="npm" id="npm" placeholder="Npm" value="<?php echo $npm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
      </div>
      <div class="form-group row">
            <label class="col-md-2">Jenis Kelamin</label>
                <div class="col-md-10">
                    <div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="Laki-laki">
  <label class="form-check-label" for="exampleRadios2">
  Laki-laki
                </div>
                <div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="Perempuan">
  <label class="form-check-label" for="exampleRadios2">
  Perempuan
                </div>
      </div>
        </div>
	    <div class="form-group">
            <label for="varchar">Prodi <?php echo form_error('prodi') ?></label>
            <select class="form-control" id="exampleFormControlSelect1" name="prodi">
      <option>Teknik Informatika</option>
      <option>Teknik Sipil</option>
            
             />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mhs') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>