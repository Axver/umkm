<div class="modal fade" id="modalinsert" tabindex="-1" role="dialog" aria-labelledby="modalinsert" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='#' method='POST'>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama UMKM</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama UMKM">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Pemilik</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Pemilik">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Jenis UMKM</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
            <?php 
            
            foreach ($jenis_umkm as $ju) {
            ?>
              <option value="3"><?php echo $ju['nama_jenis']; ?></option>

            
            <?php } ?>
            
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Input Foto</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
          <input type="text" name="lat" id="" placeholder='Latitude'>
          <input type="text" name="lat" id="" placeholder='Longitude'>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>