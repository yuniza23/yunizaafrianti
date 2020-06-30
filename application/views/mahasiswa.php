<div class="container">
	<div class="alert alert-info">
		<h4>Data Mahasiswa</h4>
	</div>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah data
</button>
<table class="table">
	<tr>
		<td>No</td>
		<td>NPM</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td>Program Studi</td>
		<td>Action</td>
	</tr>
	<?php 
		$no=1;
		foreach ($mahasiswa as $mhs): 
	?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $mhs->npm ?></td>
		<td><?php echo $mhs->nama ?></td>
		<td><?php echo $mhs->jk ?></td>
		<td><?php echo $mhs->prodi ?></td>
		<td>
			<a href="<?php echo base_url().'index.php/mahasiswa/edit/' ?><?php echo $mhs->id ?>"><button class="btn btn-md btn-primary">Edit</button></a>
			<a href="<?php echo base_url().'index.php/mahasiswa/delete/' ?><?php echo $mhs->id ?>"><button class="btn btn-md btn-danger">Hapus</button></a>

		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>


<!-- Button trigger modal -->
<form method="post" action="<?php echo base_url().'index.php/mahasiswa/add'; ?>">
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
        	<label class="col-md-2">NPM</label>
        		<div class="col-md-10">
        			<input type="text" name="npm" class="form-control"
        			placeholder="NIM">
        		</div>
      </div>
      <div class="form-group row">
        	<label class="col-md-2">Nama</label>
        		<div class="col-md-10">
        			<input type="text" name="nama" class="form-control"
        			placeholder="">

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
      <div class="form-group row">
      	<label class="col-md-2">Program studi</label>
      	<div class="col-md-10">
      		<select class="form-control" id="exampleFormControlSelect1" name="prodi">
      <option>Teknik Informatika</option>
      <option>Teknik Sipil</option>
  
    </select>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>