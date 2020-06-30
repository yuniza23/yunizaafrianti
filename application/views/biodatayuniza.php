<div class="container">
	<div class="alert alert-info">
		<h4>BIODATA YUNIZA</h4>
	</div>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah data
</button>
<table class="table">
	<tr>
		<td>No</td>
		<td>NPM</td>
		<td>Nama</td>
		<td>Alamat</td>
		<td>Semester</td>
		<td>Jurusan</td>
		<td>Action</td>
	</tr>
	<?php 
		$no=1;
		foreach ($biodatayuniza as $bdy): 
	?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $bdy->npm ?></td>
		<td><?php echo $bdy->nama ?></td>
		<td><?php echo $bdy->alamat ?></td>
		<td><?php echo $bdy->semester ?></td>
		<td><?php echo $bdy->jurusan ?></td>
		
		<td>
			<a href="<?php echo base_url().'index.php/biodatayuniza/edit/' ?><?php echo $bdy->id ?>"><button class="btn btn-md btn-primary">Edit</button></a>
			<a href="<?php echo base_url().'index.php/biodatayuniza/delete/' ?><?php echo $bdy->id ?>"><button class="btn btn-md btn-danger">Hapus</button></a>

		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<!-- Button trigger modal -->
<form method="post" action="<?php echo base_url().'index.php/biodatayuniza/add'; ?>">
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data biodata </h5>
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
        	<label class="col-md-2">Alamat</label>
        		<div class="col-md-10">
        			<input type="text" name="alamat" class="form-control"
        			placeholder="">

        		</div>
      </div>
      <div class="form-group row">
        	<label class="col-md-2">Semester</label>
        		<div class="col-md-10">
        			<input type="text" name="semester" class="form-control"
        			placeholder="">

        		</div>
      </div>
      <div class="form-group row">
      	<label class="col-md-2">Jurusan</label>
      	<div class="col-md-10">
      		<select class="form-control" id="exampleFormControlSelect1" name="jurusan">
      <option>Teknik Informatika</option>
      <option>Teknik Sipil</option>

   

        		</div>
      </div>
      
    </select>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>