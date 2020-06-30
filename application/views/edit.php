<?php foreach($biodatayuniza as $bdy){ ?>
<div class="container">
  <form method="post" action="<?php echo base_url().'index.php/biodatayuniza/update'; ?>">
<!-- Modal -->

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
              <input type="hidden" name="id" value="<?php echo $bdy->id?>"
              class="form-">
              <input type="text" name="npm" value="<?php echo $bdy->npm?>" class="form-control"
              placeholder="NIM">
            </div>
      </div>
      <div class="form-group row">
          <label class="col-md-2">Nama</label>
            <div class="col-md-10">
              <input type="text" name="nama" value="<?php echo $bdy->nama?>"class="form-control"
              placeholder="">

           </div>
      </div>
      <div class="form-group row">
          <label class="col-md-2">Alamat</label>
            <div class="col-md-10">
              <input type="text" name="alamat" value="<?php echo $bdy->alamat?>" class="form-control"
              placeholder="">

            </div>
      </div>
      <div class="form-group row">
          <label class="col-md-2">Semester</label>
            <div class="col-md-10">
              <input type="text" name="semester" value="<?php echo $bdy->semester?>" class="form-control"
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
</form>
</div>
<?php }?>