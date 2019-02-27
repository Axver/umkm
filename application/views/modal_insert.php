<div class="modal fade" id="modalinsert" tabindex="-1" role="dialog" aria-labelledby="modalinsert" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan UMKM</h5><br/>
        <div class="alert alert-warning" role="alert">
        <small>Pastikan data SIUP telah di Inputkan sebelumnya</small>
</div>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='<?php echo base_url('index.php/insertumkm/inputumkm') ?>' method='POST'>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama UMKM</label>
            <input name='nama_umkm' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama UMKM">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
          <label for="no_siup">NO SIUP</label>
            <input class="form-control" type="text" name="no_siup" id="">
          </div>
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Jenis UMKM</label>
            </div>
            <select name='jenis_umkm'['nama_jenis']; ?></option>

            
            <?php

foreach ($jenis_umkm as $ju) {
  ?>
   <option value="<?php echo $ju['id_jenis']?>">
       <?php echo $ju['nama_jenis']; ?>
   </option>


   <?php }?>

            
            </select>
          </div>
          <div class="form-group">
           
          </div>
          <input type="text" name="lat" id="" placeholder='Latitude'>
          <input type="text" name="lon" id="" placeholder='Longitude'>
          <br/><small>Latitude dan Longitude bisa didapatkan dengan menambahkan marker di peta</small><br/>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>